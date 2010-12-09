<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 3.0 License

Name       : Substantial   
Description: A two-column, fixed-width design for 1024x768 screen resolutions.
Version    : 1.0
Released   : 20100522

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="content-type" content="text/html; charset=<?php echo $charset; ?>" />
<title><?php echo $sitename . " - " . $sitetitle ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="<?php echo mainURL(); ?>tpl/substantial/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="header">
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="<?php echo mainURL(); ?>" class="first">Home</a></li>
			<?php links2get('menubar'); ?>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="search">
		<form method="get" action="">
			<fieldset>
				<input type="text" name="s" id="search-text" size="15" />
			</fieldset>
		</form>
	</div>
	<!-- end #search -->
</div>
<!-- end #header -->
<!-- end #header-wrapper -->
<div id="logo">
	<h1><a href="<?php echo mainURL(); ?>"><?php echo $sitename ?></a></h1>
	<p><em> <?php echo $sitetitle ?></em></p>
</div>
<hr />
<!-- end #logo -->
<div id="page">
	<div id="content">
		<div id="content-bgtop">
			<div id="content-bgbtm">
