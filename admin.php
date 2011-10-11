<?php

require_once 'config.php';

if (isset($_POST['submit']))
{
	$login = md5($_POST['login']);
	$password = md5($_POST['password']);
	if ($login === (String)$config->admin->login and $password === (String)$config->admin->password)
	{
		$_SESSION['admin'] = true;
		header('Location: ' . $config->site->baseurl);
		exit();
	}
}


if (isset($_GET['last']))
	$last_url = $_GET['last'];
else
	$last_url = $config->site->baseurl;

if (isset($_GET['logout']))
{
	$_SESSION['admin'] = false;
	header('Location: ' . $last_url);
	exit();
}


require_once 'layout/admin.php';
