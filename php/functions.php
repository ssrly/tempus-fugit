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
 * @param string $mail
 * @param string $id
 */
function login(string $mail, string $id)
{
    $_SESSION['mail'] = $mail;
    $_SESSION['user_id'] = $id;
}

/**
 *
 */
function logout()
{
    unset($_SESSION['mail']);
    unset($_SESSION['user_id']);
}