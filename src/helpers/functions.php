<?php

use Maker\Router\Router;

/**
 * Encrypt given text
 * @return string
 */
function encrypt($text) 
{
    return openssl_encrypt($text, "AES-128-ECB", ENC_PASSWORD);
}

/**
 * Decrypt given text
 * @return string
 */
function decrypt($text) 
{
    return openssl_decrypt($text, "AES-128-ECB", ENC_PASSWORD);
}

/**
 * Checks whether REQUEST METHOD is POST or not
 * @return bool
 */
function onlyPostRequestMethod(): bool 
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        return true;
    }
    return false;
}

/**
 * Checks if there are any empty fields
 */
function emptyFields($data)
{
    $errors = [];

    foreach ($data as $key => $value) {
        if (isset($value)) {
            if (empty($value)) {
                $errors[$key] = "This field is required!";
            } 
        }
    }
    $_SESSION['errors'] = $errors;
}

/**
 * Checks if given url is valid link
 * @param string $url
 * @return bool
 */
function isValidLinkUrl(string $url): bool
{
    $url = filter_var($url, FILTER_SANITIZE_URL);
    return filter_var($url, FILTER_VALIDATE_URL);
}

/**
 * Validate if given input is valid number
 * @param int|string $number
 * @return bool
 */
function validPhoneNumber(string $number)
{
    if (is_numeric($number) && strlen($number) == 9) {
        return true;
    }
    return false;
}
