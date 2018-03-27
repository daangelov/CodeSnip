<?php

// Define main constants
if ($_SERVER['SERVER_ADDR'] == '::1') { // Localhost
    define('ROOT', "C:/xampp/htdocs/CodeSnip/");
    define('BASE_URL', "http://localhost/CodeSnip/");
    define("DB_HOST", "localhost");
    define("DB_NAME", "code_snip");
    define("DB_USER", "root");
    define("DB_PASS", "");
}

// Start db connection
require_once ROOT . 'include/config/db_connect.php';

// Start sessions
require_once ROOT . 'include/config/session_start.php';

// Include constants
require_once ROOT . 'include/config/constants.php';

// Include functions
require_once ROOT . 'include/config/functions.php';
