<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Usec</title>
	<link rel="icon" type="image/png" href="images/favicon.ico" />
	
	<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />

	<? if ($config->is_admin()) : ?>
	<link href="css/jqueryui.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>

	<script type="text/javascript">
		var url_accueil = '<?php echo Page::page_url($config->site->defaultpage) ?>';
		$(function() {
			$( "#main" ).sortable();
			$( "#main" ).disableSelection();
		});
	</script>
	<script type="text/javascript" src="js/script.js"></script>
	
	<script type="text/javascript" src="js/nicEdit.js"></script>
	<script type="text/javascript" src="js/init_nicedit.js"></script>
	<? endif ?>

</head>
<body>
	<? if ($config->is_admin())
		require_once 'adminpanel.html';
	?>
	<div id="wrapper">
		<!-- start header -->
		<div id="header">
			<div id="logo">
				<h1><a href="#"><img src="images/logo_124_220.PNG" alt="logo"/></a></h1>
			</div>
		</div>
		<!--div id="separateur">
			<div id="blanc">
			</div>
			<div id="noir">
			</div>
		</div-->
		<div id="menu">
			<ul id="main" class="label">
				<?php foreach ($config->menu->rubrique as $rubrique)
					echo '<li><a href="' . Page::page_url($rubrique->filename) . '" class="rubrique">' . $rubrique->name . '</a></li>';
				?>
			</ul>
			<? if ($config->is_admin()) : ?>
			<ul id="menu_admin" class="label">
				<li><a href="javascript:;" onClick="askAddPage()" >Add</a></li>
				<li><a href="javascript:;" onClick="saveMenu();" >Save menu</a></li>
			</ul>
			<? endif ?>
			<!--ul id="contact">
				<li><a href="#"><img
				src="images/bouton_enveloppe.png"
				alt="enveloppe"/></a></li>
			</ul-->
		</div>
		<!-- end header -->
		<!-- start page -->
		<div id="page">
			<div id="sidebar1" class="sidebar">
				<ul>
					<li>
						<h2>Sidebar1</h2>
						<ul>
							<hr/>
							<li><a href="plaquettes/plaquette_usec.pdf">Télécharger notre plaquette</a></li>
							<hr/>
							<li><a href="plan_site.php?last=<? echo $_SERVER['REQUEST_URI'] ?>">Plan du site</a></li>
							<hr/>
						</ul>
					</li>
				</ul>
			</div>
			<!-- start content -->
			<div id="result_ajax"></div>
			<div id="content">
					<?php
						if ($page->state == Page::STATE_OK)
							require $page->filepath;
						else if($page->state == Page::STATE_404)
							require $config->basedir . '404.html';
						else
							echo 'Une erreur inconnue est survenue';
					?>
			</div><!-- end content -->
			<div style="clear: both;">&nbsp;</div>
			<div id="footer-wrapper">
				<div id="footer">
					<p class="copyright">&copy;&nbsp;&nbsp;2009 All Rights Reserved &nbsp;&bull;&nbsp; Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
				</div>
			</div>
		</div><!-- end page -->
	</div>
	<pre><span id="debug"></span></pre>

</body>






</html>
