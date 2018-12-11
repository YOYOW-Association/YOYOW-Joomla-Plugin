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

jimport('joomla.application.component.controllerform');

/**
 * Joomlauser_yoyowuser controller class.
 *
 * @since  1.6
 */
class YoyowControllerJoomlauser_yoyowuser extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'joomlausers_yoyowusers';
		parent::__construct();
	}
}
