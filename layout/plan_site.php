<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Usec - plan du site</title>
</head>
<body>

<a href="<? echo $last_url ?>">Retourner à la page précédente</a>

<ul>

<? foreach($pages as $filename)
{
	$pathinfo = pathinfo($filename);
	$page = new Page($pathinfo['filename']);
	echo '<li><a href="' . $page->url . '">' . ucwords(strtolower(str_replace('_',' ',$page->filename))) . '</a>'.PHP_EOL;
}?>

</ul>

</body>
</html>

