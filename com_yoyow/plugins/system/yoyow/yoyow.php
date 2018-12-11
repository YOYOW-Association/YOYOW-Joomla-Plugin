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
 * Joomla System plugin
 *
 * @since  1.5
 */
class PlgSystemYoyow extends JPlugin
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
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;

	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
		$helper             = JModuleHelper::getModule('mod_yoyow');
		$this->yoyow_params = json_decode($helper->params);
	}

	public function onAfterRoute()
	{
		$user = JFactory::getUser();

		$app        = JFactory::getApplication();
		$menu       = $app->getMenu();
		$menuActive = $menu->getActive();

		if ($menuActive != null && $menuActive->access != null && $menuActive->access != 1)
		{
			if (!$user->get('guest'))
			{
				$uri      = JUri::getInstance();
				$redirect = JUri::base() . 'index.php?option=com_yoyow&view=loginyoyow';
				if ($uri->toString() !== $redirect)
				{
					$isRequired = $this->yoyow_params->requiredyoyowsignup;

					if (!$this->app->isClient('administrator') && $this->app->input->get('option') != 'com_users' && $isRequired)
					{
						//let us instance model
						JModelLegacy::addIncludePath(JPATH_SITE . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_yoyow' . DIRECTORY_SEPARATOR . 'models');
						// check if that uses exist in our db (IDyoyow)
						$yoyowModel = JModelLegacy::getInstance('YoyowAssociations', 'YoyowModel');

						if ($yoyowModel->exist() == false)
						{
							header('Location: ' . JUri::base() . 'index.php?option=com_yoyow&view=loginyoyow');
							die;
						}
						return true;

					}
				}

				return true;
			}
		}
        return false;
	}
}
