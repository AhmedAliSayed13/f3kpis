<?php
require 'vendor/autoload.php';
$f3 = \Base::instance();

// Config
//$f3->config('setup.cfg');
$f3->config('config.ini');
$f3->config('routes.ini');


//$f3->route('GET /about','WebpageController->display');


$f3->run();
?>
