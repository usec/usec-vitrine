<?php
/**
 * Sauvegarde du menu
 * Cette page reçoit en post un tableau associatif rubrique_name => position
 */

try
{
	require_once '../config.php';

	$order = $_POST['order'];
	//var_dump($order);

	$menu = array();
	foreach ($config->menu->rubrique as $rubrique)
	{
		$menu[$order[(String)$rubrique->name]] = Config::rubrique_xml_2_array($rubrique);
	}
	ksort($menu);


	// Suppression de l'ancien menu
	// la manip est assez casse couille
	$config->delete('menu');
	$config->addMenu($menu);
	
	$config->save();

	echo "La sauvegarde à fonctionnéé";
}
catch (Exception $ex)
{
	var_dump($ex);
}


