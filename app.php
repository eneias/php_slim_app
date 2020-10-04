<?php
/**
 * Created by PhpStorm.
 * Eneias Silva
 * eneias@eneias.com
 * +55 48 9 9997-1197
 */

require 'vendor/autoload.php';
require 'lib/Db.php';

if ($_SERVER['SERVER_NAME'] == 'localhost')
    require 'config_dev.php';
else
    require 'config_prod.php';

session_start();

Db::connect_on_db($dbname, $user, $password, $host);

$app = new \Slim\Slim();

include 'routes.php';
require 'routes_privates.php';

return $app;