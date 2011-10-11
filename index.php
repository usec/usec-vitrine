<?php

require_once 'config.php';

$page = new Page($config->site->defaultpage);
header('Location: ' . $page->url);


