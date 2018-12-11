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

/**
 * Helper for mod_yoyow
 *
 * @package     com_yoyow
 * @subpackage  mod_yoyow
 * @since       1.6
 */
class ModYoyowHelper
{

	public static function userExist(){
		JModelLegacy::addIncludePath(JPATH_SITE . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_yoyow' . DIRECTORY_SEPARATOR . 'models');
		// check if that uses exist in our db (IDyoyow)
		$yoyowModel = JModelLegacy::getInstance('YoyowAssociations', 'YoyowModel');

		return $yoyowModel->exist();
	}
}
