<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_assistance
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::register('AssistanceHelperRoute', JPATH_COMPONENT . '/helpers/route.php');
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');

$controller = JControllerLegacy::getInstance('Assistance');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
