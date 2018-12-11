<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Yoyow
 * @author     Pablo <pablojuarez@notwebdesign.com>
 * @copyright  2018 Pablo
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_yoyow'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Yoyow', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('YoyowHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'yoyow.php');

$controller = JControllerLegacy::getInstance('Yoyow');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
