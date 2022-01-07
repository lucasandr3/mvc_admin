<?php
namespace Support;

use Symfony\Component\HttpFoundation\Request;

$request = new Request(
    $_GET,
    $_POST,
    [],
    $_COOKIE,
    $_FILES,
    $_SERVER
);

$request = Request::createFromGlobals();
