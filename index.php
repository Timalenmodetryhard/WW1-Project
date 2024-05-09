<?php
include 'app/models/header.php';

define('BASE_PATH', realpath(__DIR__));

require BASE_PATH . '/core/router.php';

include __DIR__ . "app/models/footer.php"

Router::route();
?>