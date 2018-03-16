<?php

// Start session
require_once 'session_start.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && array_key_exists('submit', $_POST)) {
    session_unset();
    session_destroy();
    redirect(BASE_URL . "/index.php");
}