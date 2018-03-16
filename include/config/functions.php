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
function check_email($input) {
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