<?php

require_once '../settings.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    session_unset();
    session_destroy();
    redirect('index.php');
}