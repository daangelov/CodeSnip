<?php

require_once 'system.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && array_key_exists('submit', $_POST)) {

    require_once 'db_connect.php';

    $first_name = trim(pg_escape_string($dbconn, $_POST['first_name']));
    $last_name = trim(pg_escape_string($dbconn, $_POST['last_name']));
    $email = trim(pg_escape_string($dbconn, $_POST['email']));
    $username = trim(pg_escape_string($dbconn, $_POST['uid']));
    $password = trim(pg_escape_string($dbconn, $_POST['pwd']));

    // Verification
    // Check if empty, short or long string is provided
    if(!valid_input($first_name) || !valid_input($last_name) || !valid_input($username)) {
        echo_json("status", "invalid_fields");
    }
    // Check if the email is correct
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo_json("status", "invalid_email");
    }
    // Check if password is more than 8 symbols
    if(!valid_password($password)) {
        echo_json("status", "invalid_password");
    }
    // Check if username exists in the database
    if(exists_in_db($dbconn, "users", "username", $username, $res)) {
        echo_json("status", "taken_username");
    }
    // Check if email exists in the database
    if(exists_in_db($dbconn, "users", "email", $email, $res)) {
        echo_json("status", "taken_email");
    }
    // Hash the password
    $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    insert_name_in_db($dbconn, $first_name, $last_name, $email, $username, $hashed_pwd);

    echo_json("status", "signup_success");

} else {
    echo_json("status", "error");
}