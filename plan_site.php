<?php

require_once 'config.php';

function ScanDirectory($Directory)
{
	$arr = array();
	$MyDirectory = opendir($Directory) or die('Erreur');
	while($Entry = @readdir($MyDirectory)) {
		if (is_file($Directory.'/'.$Entry))
		{
			$arr[] = $Entry;
		}
	}
	closedir($MyDirectory);

	return $arr;
}

$pages = ScanDirectory('pages');
asort($pages);

$last_url = $_GET['last'];


require_once 'layout/plan_site.php';
