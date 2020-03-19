<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger("logger");

$logger->pushHandler(new StreamHandler(__DIR__.'/my_app.log', Logger::DEBUG));
