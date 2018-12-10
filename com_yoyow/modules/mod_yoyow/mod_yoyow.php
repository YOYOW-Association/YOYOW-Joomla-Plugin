<?php

/**
 * @version     CVS: 1.0.0
 * @package     com_yoyow
 * @subpackage  mod_yoyow
 * @author      Pablo <pablojuarez@notwebdesign.com>
 * @copyright   2018 Pablo
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;


JText::script('MOD_YOYOW_MIDDLE_WARE_ERROR');
JText::script('MOD_YOYOW_MIDDLE_NO_API_URL');
JText::script('MOD_YOYOW_MIDDLE_NO_LOGED_IN_OR_SIGNED_IN');

// Include the syndicate functions only once
JLoader::register('ModYoyowHelper', dirname(__FILE__) . '/helper.php');

$doc = JFactory::getDocument();

/* */
$doc->addStyleSheet(JURI::base() . '/media/com_yoyow/css/style.css');

/* */
$doc->addScript(JURI::base() . '/media/com_yoyow/js/form.js');

$userYoyow = ModYoyowHelper::userExist();

$helper = JModuleHelper::getModule('mod_yoyow');
$yoyow_params = json_decode($helper->params);



require JModuleHelper::getLayoutPath('mod_yoyow', $params->get('content_type', 'blank'));
