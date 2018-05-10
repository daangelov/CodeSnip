<?php

/**
 * Check if user is logged
 * @return bool
 */
function is_logged()
{
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
        return true;
    }
    return false;
}

/**
 * Check if user is admin
 * @return bool
 */
function is_admin()
{
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == USER_TYPE_ADMIN) {
        return true;
    }
    return false;
}

/**
 * Check if name is valid
 * @param string $input
 * @return bool
 */
function check_name($input)
{
    if (!empty($input) && strlen($input) > 2 && strlen($input) < 21) {
        return true;
    }
    return false;
}

function check_email($input)
{
    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

/**
 * Check if username is valid
 * @param string $input
 * @return bool
 */
function check_username($input)
{
    if (!empty($input) && strlen($input) > 2 && strlen($input) < 21) {
        return true;
    }
    return false;
}

/**
 * Check if password is valid
 * @param string $input
 * @return bool
 */
function check_password($input)
{
    if (!empty($input) && strlen($input) > 7 && strlen($input) < 21) {
        return true;
    }
    return false;
}

/**
 * Redirect to url
 * @param string $url
 * @param mixed $args
 */
function redirect($url, $args = false)
{
    if ($args) {
        header("Location: " . BASE_URL . $url . '?' . $args);
    } else {
        header("Location: " . BASE_URL . $url);
    }
    exit();
}

/**
 * Automatically load js file with the same name as the page name currently on
 * @param string $filename
 * @return bool|string
 */
function auto_load_js($filename) {
    // Get all files with .js extension in js/custom
    $files = glob("js/custom/*.js");

    // Loop through all directories in js/custom
    foreach (glob("js/custom/*", GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
        // Merge all files with .js extension
        $files = array_merge($files, glob($dir . "/*.js"));
    }

    // Get the file name of the current page
    $page_name = pathinfo($filename);
    // Js file with the same name
    $js_name = $page_name['filename'] . '.js';

    // Loop through the js files to find if such name exists in the directory
    foreach ($files as $file) {
        if ($js_name == basename($file)) {
            // Return the script tag
            return '<script src="' . BASE_URL . $file . '"></script>';
        }
    }
    // If not found return false
    return false;
}

/*
/**
 * Error handler for sql errors
 * @param array $response

function handle_sql_error($error_message, &$response) {
    //error_log($error_message);

    $response['st'] = 0;
    $response['msg'] = 'Моля презаредете страницата';
    echo json_encode($response);
    exit();
}*/