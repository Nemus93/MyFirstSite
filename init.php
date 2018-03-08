<?php
session_start();

$GLOBALS['config'] = array(
	'DB' => array(
		'host' => 'localhost',
		'user' => 'root',
		'password' => '',
		'db_name' => 'website'
	),
	'status' => true,
	'app_dir' => 'C:/wamp64/www/it/phpvezbe/assigment/',
	'session' => array()
);

spl_autoload_register(function($className){
	require_once "classes/{$className}.class.php";
});
