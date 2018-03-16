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
 * Check if username is valid
 * @param string $input
 * @return bool
 */
function check_username($input)
{
    if (!empty($input) && strlen($input) > 3 && strlen($input) < 20) {
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
    if (!empty($input) && strlen($input) > 8 && strlen($input) < 20) {
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