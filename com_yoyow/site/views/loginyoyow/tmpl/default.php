<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 8/10/18
 * Time: 13:17
 */

defined('_JEXEC') or die('Restricted access');

$yoyowMod = JModuleHelper::getModule('mod_yoyow');

echo JModuleHelper::renderModule($yoyowMod);