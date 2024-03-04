<?php

session_start();

$request = $_SERVER['REQUEST_URI'];

if (!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = 'false';
}

if (strpos($request, '/api') === 0) {
    require_once __DIR__ . '/api/index.php';
    exit();
}

function req_unauthorized()
{
    require_once __DIR__ . '/pages/errors/401.php';
    exit();
}

function req_notfound()
{
    require_once __DIR__ . '/pages/errors/404.php';
    exit();
}

switch ($request){
    case '/':
        $redirect = '/pages/home.php';
        break;
    case '/home':
        $redirect = '/pages/home.php';
        break;
    case '/pages/chat':
        if ($_SESSION['logged'] == 'true') {
            $redirect = '/pages/chat.php';
            break;
        }
        req_unauthorized();
    case '/pages/logout':
        if ($_SESSION['logged'] == 'true') {
            $redirect = '/pages/logout.php';
            break;
        }
        req_unauthorized();
        break;
    case '/pages/login':
        if ($_SESSION['logged'] == 'false') {
            $redirect = '/pages/login.php';
            break;
        }
        req_unauthorized();
    case '/pages/register':
        if ($_SESSION['logged'] == 'false') {
            $redirect = '/pages/register.php';
            break;
        }
        req_unauthorized();
    default:
        req_notfound();
}

$_SESSION['site'] = $redirect;

require_once __DIR__ . '/pages/cores/header.php';
require_once __DIR__ . $redirect;
require_once __DIR__ . '/pages/cores/footer.php';

?>