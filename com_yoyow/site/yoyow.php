<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Yoyow
 * @author     Pablo <pablojuarez@notwebdesign.com>
 * @copyright  2018 Pablo
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Yoyow', JPATH_COMPONENT);
JLoader::register('YoyowController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = JControllerLegacy::getInstance('Yoyow');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
