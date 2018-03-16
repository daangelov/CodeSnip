<?php

require_once ROOT . 'include/classes/session.php';

// Create new object Session
$session = new Session();

session_set_save_handler(
    array($session, 'open'),
    array($session, 'close'),
    array($session, 'read'),
    array($session, 'write'),
    array($session, 'destroy'),
    array($session, 'gc')
);

session_start();