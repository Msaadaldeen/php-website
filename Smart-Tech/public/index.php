<?php

session_start();

//session_destroy();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../app/helpers.php';
require_once '../vendor/autoload.php';

$app = new App\App;
