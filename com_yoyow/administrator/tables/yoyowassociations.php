<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 9/10/18
 * Time: 11:10
 */
defined('_JEXEC') or die;

/**
 * Combuilder Table class
 *
 * @package		Joomla.Administrator
 * @subpackage	com_combuilder
 * @since		1.5
 */
class YoyowTableYoyowAssociations extends JTable
{
    public function __construct(&$db)
    {
        parent::__construct('#__yoyow_associations', 'id', $db);
    }

    public function bind($data, $ignore = array())
    {

        return parent::bind($data, $ignore);
    }

    public function check()
    {
    }

    public function delete($pk = null)
    {
        //Use parent to delete the item
        return parent::delete($pk);
    }
}