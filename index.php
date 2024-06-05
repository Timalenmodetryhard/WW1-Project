<?php
require_once 'vendor/autoload.php';
session_start();

require __DIR__ . '/app/view/header.php';

define('BASE_PATH', realpath(__DIR__));

require BASE_PATH . '/core/router.php';

Router::route();
?>