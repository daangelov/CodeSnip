<?php

// Define ROOT
define('ROOT', dirname(__DIR__) . '/');

// Define database settings
$settings = parse_ini_file(ROOT . 'include/config/config.ini', true);
define("DB_HOST", $settings['db']['host']);
define("DB_NAME", $settings['db']['name']);
define("DB_USER", $settings['db']['user']);
define("DB_PASS", $settings['db']['pass']);

// Define BASE URL
define('BASE_URL', "http://" . $_SERVER['HTTP_HOST'] . '/' . $settings['app']['basedir'] . '/');

// Include constants
require_once ROOT . 'include/config/constants.php';

// Start db connection
require_once ROOT . 'include/config/db_connect.php';

// Start sessions
require_once ROOT . 'include/config/session_start.php';

// Include functions
require_once ROOT . 'include/config/functions.php';