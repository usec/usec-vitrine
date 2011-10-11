<?php
/**
 * Sauvegarde du menu
 * Cette page reçoit en post un tableau associatif rubrique_name => position
 */

try
{
	require_once '../config.php';
	if (!$config->is_admin())
	{
		echo '403';
		exit();
	}

	$page = new Page($_POST['filename']);

	$menu = array();
	foreach ($config->menu->rubrique as $rubrique)
	{
		if ((String)$rubrique->filename != $page->filename)
			$menu[] = Config::rubrique_xml_2_array($rubrique);
	}


	// Suppression de l'ancien menu
	// la manip est assez casse couille
	$config->delete('menu');
	$config->addMenu($menu);
	
	$config->save();

	//supression de la page
	$page->remove();

	echo "La supression à fonctionnée";
}
catch (Exception $ex)
{
	var_dump($ex);
}
