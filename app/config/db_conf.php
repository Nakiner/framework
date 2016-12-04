<?php
$config = Dbconnect::instance();
$config->set(array(
    'host' => 'ovl.io',
    'user' => 'fw',
    'pass' => 'frameworking',
    'name' => 'framework'
));
$config->connect();
unset($config);