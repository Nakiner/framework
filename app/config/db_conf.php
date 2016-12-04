<?php
$config = Dbconnect::instance();
$config->set(array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'name' => 'shit'
));
$config->connect();
unset($config);