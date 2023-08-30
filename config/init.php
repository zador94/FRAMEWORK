<?php

define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/core');
define("CONFIG", ROOT . '/config');
define("PATH", 'http://framework');
define("DEBUG", true);
define("LOGS", ROOT . '/tmp/logs');

require_once ROOT . '/vendor/autoload.php';