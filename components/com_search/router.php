<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Routing class from com_search
 *
 * @package     Joomla.Site
 * @subpackage  com_search
 * @since       3.3
 */
class SearchRouter implements JComponentRouter
{
	/**
	 * Build the route for the com_search component
	 *
	 * @param   array  &$query  An array of URL arguments
	 *
	 * @return  array  The URL arguments to use to assemble the subsequent URL.
	 *
	 * @since   3.3
	 */
	public function build(&$query)
	{
		$segments = array();

		if (isset($query['view']))
		{
			unset($query['view']);
		}

		return $segments;
	}

	/**
	 * Parse the segments of a URL.
	 *
	 * @param   array  &$segments  The segments of the URL to parse.
	 *
	 * @return  array  The URL attributes to be used by the application.
	 *
	 * @since   3.3
	 */
	public function parse(&$segments)
	{
		$vars = array();

		$searchword	= array_shift($segments);
		$vars['searchword'] = $searchword;
		$vars['view'] = 'search';

		return $vars;
	}
}

/**
 * Search router functions
 *
 * These functions are proxys for the new router interface
 * for old SEF extensions.
 *
 * @deprecated  4.0  Use Class based routers instead
 */
function SearchBuildRoute(&$query)
{
	$router = new SearchRouter;

	return $router->build($query);
}

function SearchParseRoute($segments)
{
	$router = new SearchRouter;

	return $router->parse($segments);
}
