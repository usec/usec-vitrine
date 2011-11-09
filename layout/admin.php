<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Usec - admin</title>
</head>
<body>
	<a href="<?php echo $last_url ?>">Retourner au site</a>
	<form method="post" action="<?php echo $config->site->baseurl . 'admin.php' ?>">
		<input name="login" id="login" />
		<input name="password" id="password" type="password" />
		<input type="submit" name="submit"/>
	</form>
</body>
</html>
