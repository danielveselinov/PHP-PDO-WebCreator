<?php

use Maker\Company\Company;

if (!onlyPostRequestMethod()) {
    header("Location: ".PATH."404");
    die();
}

$data = $_POST;

# Error handling
emptyFields($data);

if (!validPhoneNumber($data["tel_number"])) {
    $_SESSION['errors']['invalid_tel_number'] = "Invalid number format";
}

if (!isValidLinkUrl($data["cover_image"])) {
    $_SESSION['errors']['invalid_cover_image'] = "Invalid image URL";
}

if (!isValidLinkUrl($data["image_url"])) {
    $_SESSION['errors']['invalid_image_url'] = "Invalid image URL";
}

if (!isValidLinkUrl($data["image_url1"])) {
    $_SESSION['errors']['invalid_image_url1'] = "Invalid image URL";
}

if (!isValidLinkUrl($data["image_url2"])) {
    $_SESSION['errors']['invalid_image_url2'] = "Invalid image URL";
}

if (!isValidLinkUrl($data["linkedin"])) {
    $_SESSION['errors']['linkedin_brokenUrl'] = "Invalid URL";
}

if (!isValidLinkUrl($data["facebook"])) {
    $_SESSION['errors']['facebook_brokenUrl'] = "Invalid URL";
}

if (!isValidLinkUrl($data["twitter"])) {
    $_SESSION['errors']['twitter_brokenUrl'] = "Invalid URL";
}

if (!isValidLinkUrl($data["github"])) {
    $_SESSION['errors']['github_brokenUrl'] = "Invalid URL";
}

if (!isset($_POST['type_switcher'])) {
    $_SESSION['errors']["type_switcher"] = "Please select type";
}

if (count($_SESSION['errors']) > 0) {
    $_SESSION['oldInfo'] = $data;
    header("Location: ".PATH."create");
    die();
}

# Creating object with inserted data
$company = new Company($data);

# Saving into database
$company->insert();

# Reset arrays
$_POST = [];
$data = [];
$_SESSION = [];