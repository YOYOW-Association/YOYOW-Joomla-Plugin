<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 8/10/18
 * Time: 15:27
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.controller');
jimport('joomla.application.component.helper');


/**
 * Joomlauser_yoyowuser controller class.
 *
 * @since  1.6
 */
class YoyowControllerApiYoyow extends JControllerForm
{
    private $yoyow_params;


    private $user;

    /**
     * Constructor
     *
     * @throws Exception
     */
    public function __construct()
    {
        require_once dirname(__FILE__) . '/../../../modules/mod_yoyow/helper.php';
        $helper = JModuleHelper::getModule('mod_yoyow');
        $this->yoyow_params = json_decode($helper->params);
        $this->user = JFactory::getUser();

        if ($this->yoyow_params->apiurl == null) {
            print_r(json_encode(['error' => 'MOD_YOYOW_MIDDLE_NO_API_URL']));
            exit;
        }
        parent::__construct();
    }

    /**
     * @param int $formatJson of data received from the middleware
     *
     * Redirect user to the yoyow's platform to login with their information.
     */
    public function getSign($formatJson = 0)
    {
        if ($this->userExist()) {

            $apiUrl = $this->yoyow_params->apiurl . '/auth/sign';
            if (isset($_REQUEST['isqr'])) {
                $apiUrl .= 'QR?state={\'id\'=' . $this->user->get('id') . '}';
            }

            $response = $this->curlCall($apiUrl);
            if (!$response) {
                print_r(json_encode(['error' => 'MOD_YOYOW_MIDDLE_WARE_ERROR']));
                exit;
            }
            if (isset($_REQUEST['isqr'])) {
                print_r($response);
                exit;
            }
            $response = json_decode($response, true);

            $uri = JUri::getInstance();
            $response['data']['redirect'] = JUri::base() . '/index.php?option=com_yoyow&task=ApiYoyow.authorizeService';

            if (!$formatJson)
                $response = json_encode($response);

            print_r($response);
            exit;
        }
        print_r(json_encode(['error' => 'MOD_YOYOW_MIDDLE_NO_LOGED_IN_OR_SIGNED_IN']));
        exit;
    }

    /**
     * Validate yoyow information gived by yoyow's platform.
     */

    function authorizeService()
    {
        error_log(print_r($_REQUEST, TRUE));
        if ($this->userExist()) {
            $response = $_REQUEST;
            $apiUrl = $this->yoyow_params->apiurl . '/auth/verify?' . http_build_query($response);

            $response = $this->curlCall($apiUrl);
            $response = json_decode($response, true);
            if ($response['data']['verify']) {
                $yoyowModel = $this->getModel(
                    'YoyowAssociations',
                    'YoyowModel',
                    [
                        'joomla_user_id' => $this->user->get('id'),
                        'yoyow_id' => $response['data']['name']
                    ]
                );
                if ($yoyowModel->save()) {
                    $redirect = $this->yoyow_params->redirecturl;
                    if ($redirect == null) {
                        $redirect = JUri::base();
                    }
                    header('Location: ' . $redirect);
                    exit;
                }
            }
            $codeError = $this->controlError($response['code']);
            if($codeError !== 1){
                $application = JFactory::getApplication();
                $application->enqueueMessage(JText::_($codeError), 'error');
            }
        }
        return true;
    }

    /**
     * @param $apiUrl Call url (GET).
     * @return mixed Curl call response
     */
    function curlCall($apiUrl)
    {
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array(
            $curl,
            [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $apiUrl,
            ]
        );
        // Send the request & save response to $resp
        $response = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);

        return $response;
    }

    function userExist()
    {
        if ($this->user->get('id') !== 0) {
            return true;
        }
        return false;
    }

    function deleteUser()
    {
        $this->getModel('YoyowAssociations', 'YoyowModel')->deleteUser($this->user->id);
    }

    function controlError($code)
    {
        $codeArray = [
            1001,
            1002,
            1003,
            1004,
            1005,
            1006,
            1007,
            2000,
            2001,
            2002,
            2003,
            2004,
            2005,
            3001,
        ];
        if (in_array($code, $codeArray)) {
            return 'COM_YOYOW_ERROR_' . $code;
        }
        return 1;
    }
}

//update_platform 287616095 null 10000 YOYO null "{\"login\":\"http://88.22.218.4/yoyow/index.php?option=com_yoyow&task=ApiYoyow.authorizeService\", \"description\": \"JensenTech test\", \"image\": \"http://88.22.218.4/yoyow/media/com_yoyow/css/images/yoyow.png\", \"urlscheme\":\"http://88.22.218.4/yoyow/\"}"
