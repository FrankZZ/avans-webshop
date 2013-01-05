<?php

class Session
{
	
	function start()
	{
		session_start();
	}
	
	function __set($key, $value)
	{
		$_SESSION[$key] = $value;
	}
	
	function __get($key)
	{
		if (isset($_SESSION) && isset($_SESSION[$key]))
		{
			return $_SESSION[$key];
		}
		
		return NULL;
	}
}


?>