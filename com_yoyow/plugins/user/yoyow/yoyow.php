<?php

/**
 * @package     Joomla.Plugin
 * @subpackage  User.content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_yoyow/router.php';

/**
 * Joomla User plugin
 *
 * @since  1.5
 */
class PlgUserYoyow extends JPlugin
{

    /**
     * Application object
     *
     * @var    JApplicationCms
     * @since  3.2
     */
    protected $app;

    /**
     * Database object
     *
     * @var    JDatabaseDriver
     * @since  3.2
     */
    protected $db;

    private $yoyow_params;

    /**
     * @param object $subject
     * @param array  $config
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        $this->loadLanguage('com_yoyow', JPATH_ROOT);
	    $helper = JModuleHelper::getModule('mod_yoyow');
	    $this->yoyow_params = json_decode($helper->params);

    }
    /**
     * This method should handle any login logic and report back to the subject
     *
     * @param   array  $user     Holds the user data
     * @param   array  $options  Array holding options (remember, autoregister, group)
     *
     * @return  void
     *
     * @since   1.5
     */
    public function onUserAfterLogin($user, $options = array())
    {
        $isRequired = $this->yoyow_params->requiredyoyowsignup;

        if(!$this->app->isClient('administrator') && $isRequired) {
	        //let us instance model
            JModelLegacy::addIncludePath(JPATH_SITE . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_yoyow' . DIRECTORY_SEPARATOR . 'models');
			// check if that uses exist in our db (IDyoyow)
            $yoyowModel = JModelLegacy::getInstance('YoyowAssociations', 'YoyowModel');

            if($yoyowModel->exist()){
                return true;
            }
            header('Location: '. JUri::base() . 'index.php?option=com_yoyow&view=loginyoyow');
            die;
        }
    }

}
