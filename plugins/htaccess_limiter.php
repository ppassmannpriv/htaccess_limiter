<?php

/**
 * Limit access to Site - extremely primitive.
 *
 * @author Pieter Passmann
 * @link http://scriptkid.de
 * @license http://opensource.org/licenses/MIT
 */
class Htaccess_limiter {

	public function before_render(&$twig_vars, &$twig, &$template)
	{
		if($_SERVER['REMOTE_USER'] !== 'graphodata'){
			$this->checkCredentials($_SERVER['REMOTE_USER']);
		}
	}

	public function checkCredentials($user)
	{
		if($user == 'USER_NAME')
		{
			if($_SERVER['REQUEST_URI'] !== '/stuff/stuff/')
			{
				$this->kickOut();
			}
		}
	}

	public function kickOut()
	{
		header('Location: http://www.graphodata.de/');
	}

}

?>
