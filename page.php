<?php

/*
echo '<pre>';
print_r($_SERVER);
echo '</pre>';
echo '<pre>';
print_r($_GET);
echo '</pre>';
exit();//*/
require_once 'config.php';
$page = new Page($_GET['p']);
require_once 'layout/layout.php';
