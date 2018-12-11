<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 8/10/18
 * Time: 14:51
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class YoyowModelYoyowAssociations extends JModelItem
{
    /**
     * @var string $yoyow_id
     */
    protected $yoyow_id;

    /**
     * @var integer $joomla_user_id
     */
    protected $joomla_user_id;

    public function __construct($data)
    {
        if($data!=null) {
            $this->yoyow_id = $data['yoyow_id'];
            $this->joomla_user_id = $data['joomla_user_id'];
        }
        parent::__construct();
    }


    /**
     * @return string
     */
    public function getYoyowId(): string
    {
        return $this->yoyow_id;
    }

    /**
     * @param string $yoyow_id
     */
    public function setYoyowId(string $yoyow_id)
    {
        $this->yoyow_id = $yoyow_id;
    }

    /**
     * @return int
     */
    public function getJoomlaUserId(): int
    {
        return $this->joomla_user_id;
    }

    /**
     * @param int $joomla_user_id
     */
    public function setJoomlaUserId(int $joomla_user_id)
    {
        $this->joomla_user_id = $joomla_user_id;
    }

    /**
     * Returns a reference to the a Table object, always creating it.
     *
     * @param   string $type The table type to instantiate
     * @param   string $prefix A prefix for the table class name. Optional.
     * @param   array $config Configuration array for model. Optional.
     *
     * @return    JTable    A database object
     *
     * @since    1.6
     */
    public function getTable($type = 'YoyowAssociations', $prefix = 'YoyowTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function save()
    {
        $data =
            [
                'idyoyow' => $this->getYoyowId(),
                'idjoomlauser' => $this->getJoomlaUserId()
            ];
        if(!$this->exist()) {
            $table = $this->getTable();
            $table->bind($data);

            return $table->store($data);
        }
        return true;
    }

    public function exist()
    {
        $user = JFactory::getUser();
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('*');
        $query->from($db->quoteName('#__yoyow_associations'));
        $query->where($db->quoteName('idjoomlauser') . '=' . $user->get("id"));

        $db->setQuery($query);

        $results = $db->loadAssoc();
        if(!$results){
            return false;
        }
        $this->yoyow_id = $results['idyoyow'];
        $this->joomla_user_id = $results['idjoomlauser'];
        return $this;
    }

    public function deleteUser($userId){
	    $db = JFactory::getDbo();

	    $query = $db->getQuery(true);

		// delete all custom keys for user 1001.
	    $conditions = array(
		    $db->quoteName('idjoomlauser') . ' = '.$userId,
	    );

	    $query->delete($db->quoteName('#__yoyow_associations'));
	    $query->where($conditions);

	    $db->setQuery($query);

	    return $db->execute();
    }

}