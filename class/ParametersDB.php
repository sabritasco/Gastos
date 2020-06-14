<?php
require_once 'mensajes.php';
define("DB_HOST", "127.0.0.1");
define("DB_NAME", "GASTOS");
define ("DB_USER","Gastos");
define("DB_PASSWORD", "DQy4HguJ%hdPWyZ7E");
function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
