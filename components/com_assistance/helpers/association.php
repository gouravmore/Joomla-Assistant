<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_assistance
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::register('AssistanceHelper', JPATH_ADMINISTRATOR . '/components/com_assistance/helpers/assistance.php');
JLoader::register('AssistanceHelperRoute', JPATH_SITE . '/components/com_assistance/helpers/route.php');
JLoader::register('CategoryHelperAssociation', JPATH_ADMINISTRATOR . '/components/com_categories/helpers/association.php');

/**
 * Assistance Component Association Helper
 *
 * @since  3.0
 */
abstract class AssistanceHelperAssociation extends CategoryHelperAssociation
{
	/**
	 * Method to get the associations for a given item
	 *
	 * @param   integer  $id    Id of the item
	 * @param   string   $view  Name of the view
	 *
	 * @return  array   Array of associations for the item
	 *
	 * @since  3.0
	 */
	public static function getAssociations($id = 0, $view = null)
	{
		$jinput = JFactory::getApplication()->input;
		$view   = $view === null ? $jinput->get('view') : $view;
		$id     = empty($id) ? $jinput->getInt('id') : $id;

		if ($view === 'newsfeed')
		{
			if ($id)
			{
				$associations = JLanguageAssociations::getAssociations('com_assistance', '#__assistance', 'com_assistance.item', $id);

				$return = array();

				foreach ($associations as $tag => $item)
				{
					$return[$tag] = AssistanceHelperRoute::getNewsfeedRoute($item->id, (int) $item->catid, $item->language);
				}

				return $return;
			}
		}

		if ($view === 'category' || $view === 'categories')
		{
			return self::getCategoryAssociations($id, 'com_assistance');
		}

		return array();
	}
}
