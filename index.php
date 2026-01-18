<?php

declare(strict_types=1);

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch($path) {
    case "/":
        echo "This is the homepage";
        break;
    case "/about":
        echo "This is the about page";
        break;
    case "/contact":
        echo "This is the contact page";
        break;
    default:
        echo "Page not found";
}