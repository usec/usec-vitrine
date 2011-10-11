<?php

try
{
	require_once '../config.php';
	if (!$config->is_admin())
	{
		echo '403';
		exit();
	}
	
	$page = new Page($_POST['filename']);
	$page->save(stripslashes($_POST['content']));
	echo "Sauvegarde réussie";
		
}
catch (Exception $ex)
{
	var_dump($ex);
}
