<?php


try
{
	require_once '../config.php';
	if (!$config->is_admin())
	{
		echo '403';
		exit();
	}
	var_dump($_POST);
	$page = new Page($_POST['filename']);
	// création du fichier
	$page->save("<h1>" . $_POST['rubrique'] . "</h1>");
	// ajout de la page dans le menu
	if ($_POST['show'] == 'true')
	{
		$config->addRubrique($page->filename, $_POST['rubrique']);
		$config->save();
	}
	
	echo "Ajout réussi";	
}
catch (Exception $ex)
{
	var_dump($ex);
}
