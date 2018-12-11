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
JHtml::_('jquery.framework');
$uri = JUri::getInstance();

if ($userYoyow && $userYoyow->getJoomlaUserId() == JFactory::getUser()->get('id')) {
    echo '<div class="alert alert-success"><span>
  		' . JText::_('MOD_YOYOW_ALREADY_REGISTERED') . '</span> 
  		<button id="deleteYoyowAccount" class="btn btn-danger buttonYoyow">' . JText::_('MOD_YOYOW_LOGOUT') . '</button><br>
  		<b>' . JText::_('MOD_YOYOW_YOYOW_ID') . ' ' . $userYoyow->getYoyowId() . '</b>
	</div>';
} else {
    echo '
<div id="yoyowButtonContent">
    <button class="btn btn-primary" id="button-connect-yoyow">
    <img src="' . JUri::base() . '/media/com_yoyow/css/images/yoyow.png" id="imageYoyowLogin">' . JText::_("MOD_YOYOW_VERIFICATE_ACCOUNT") . '
    </button>';

//    if ($yoyow_params->enableqr) {
//
//        echo '
//    <button class="btn btn-inverse" id="button-connect-yoyow-qr">
//    <img src="' . JUri::base() . '/media/com_yoyow/css/images/yoyow.png" id="imageYoyowLogin">' . JText::_("MOD_YOYOW_VERIFICATE_ACCOUNT_QR") . '
//    </button>
//
//    <img id="imageQR" />
//</div>
//';
//    }
}