<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_assistance
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Content Component Category Tree
 *
 * @since  1.6
 */
class AssistanceCategories extends JCategories
{
	/**
	 * Constructor
	 *
	 * @param   array  $options  options
	 */
	public function __construct($options = array())
	{
		$options['table'] = '#__assistance';
		$options['extension'] = 'com_assistance';
		$options['statefield'] = 'published';
		parent::__construct($options);
	}
}
