<?php

/**
 * @param string $dbDate
 * @param string $format
 * @return string
 */
function formatDate(string $dbDate, string $format = '%d.%m.%Y %H:%M'): string
{
    return !empty($dbDate) ? utf8_encode(strftime($format, strtotime($dbDate))) : 'no record';
}

/**
 * @param string $userInput
 * @param string $encoding
 * @return string
 */
function convertString(string $userInput, string $encoding = 'UTF-8'): string
{
    return htmlspecialchars(strip_tags(trim($userInput)), ENT_QUOTES | ENT_HTML5, $encoding);
}

/**
 * @param string $url
 */
function redirect(string $url = '/')
{
    $root = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '/php/'));
    header('Location: ' . $root . $url);
    exit;
}

/**
 * @param string $id
 * @param bool $isAdmin
 */
function login(string $id, bool $isAdmin)
{
    $_SESSION['is_admin'] = $isAdmin;
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $id;
}

/**
 * @return bool
 */
function isLoggedIn(): bool
{
    return $_SESSION['logged_in'] ?? false;
}

/**
 * @return bool
 */
function isAdmin(): bool
{
    return $_SESSION['is_admin'] ?? false;
}

/** unsets SESSION vars */
function logout()
{
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_id']);
}