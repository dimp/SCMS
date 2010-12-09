<?php
/*  This file is part of SCMS.

    SCMS is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    SCMS is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with SCMS.  If not, see <http://www.gnu.org/licenses/>.
*/
$sver = array('main' => '0.1', 'state' => 'alpha', 'subv' => '1', 'release' => 'r11');
?>
<?php 
	include "config.php";
	include("verify.php");
	//session_start();
	$user = $_SESSION['username'];
?>
<html>
<head>
<title>SCms Admin Panel</title>



<style type="text/css">

div.floating-menu {
	position:fixed;
	background:#ccccff;
	color:#5ABB00;
	border:1px solid #ccccff;
	width:170px;
	z-index:100;
}

div.floating-menu a, div.floating-menu h3 {
	display:block;
	margin:0 0.5em;
}

div.main { 
	position:relative;
	text-align: center; 
	width: 70%; 
	//height: 500px;
    background:#F1F1F1;
	color:#000000;
	margin: 0 auto; 
}
body {
	background:#FFFFFF;
	color:#111D51;
	font-family:Georgia, serif;
}

a:link {color:#323894;}
a:visited {color:#323894;}
a:hover {color:#323894;}
a:active {color:#323894;}

#pcm{display:none;}
ul.pureCssMenu ul{display:none}
ul.pureCssMenu li:hover>ul{display:block}
ul.pureCssMenu ul{position: absolute;left:-1px;top:98%;}
ul.pureCssMenu ul ul{position: absolute;left:98%;top:-2px;}
ul.pureCssMenu,ul.pureCssMenu ul {
	margin:0px;
	list-style:none;
	padding:0px 2px 2px 0px;
	background-color:#333333;
	background-repeat:repeat;
	border-color:#cccccc #111111 #111111 #cccccc;
	border-width:1px;
	border-style:solid;
}
ul.pureCssMenu table {border-collapse:collapse}ul.pureCssMenu {
	display:block;
	zoom:1;
	float: left;
}
ul.pureCssMenu ul{
	width:114.45px;
}
ul.pureCssMenu li{
	display:block;
	margin:2px 0px 0px 2px;
	font-size:0px;
}
ul.pureCssMenu a:active, ul.pureCssMenu a:focus {
outline-style:none;
}
ul.pureCssMenu a, ul.pureCssMenu li.dis a:hover, ul.pureCssMenu li.sep a:hover {
	display:block;
	vertical-align:middle;
	background-color:#333333;
	border-width:1px;
	border-color:#333333;
	border-style:solid;
	text-align:left;
	text-decoration:none;
	padding:2px 5px 2px 10px;
	_padding-left:0;
	font:normal 12px Trebuchet MS,Tahoma;
	color: #FFFFFF;
	text-decoration:none;
	cursor:default;
}
ul.pureCssMenu span{
	overflow:hidden;
}
ul.pureCssMenu li {
	float:left;
}
ul.pureCssMenu ul li {
	float:none;
}
ul.pureCssMenu ul a {
	text-align:left;
	white-space:nowrap;
}
ul.pureCssMenu li.sep{
	text-align:left;
	padding:0px;
	line-height:0;
	height:100%;
}
ul.pureCssMenu li.sep span{
	float:none;	padding-right:0;
	width:3px;
	height:100%;
	display:inline-block;
	background-color:#cccccc #111111 #111111 #cccccc;	background-image:none;}
ul.pureCssMenu ul li.sep span{
	width:100%;
	height:3px;
}
ul.pureCssMenu li:hover{
	position:relative;
}
ul.pureCssMenu li:hover>a{
	background-color:#377D9F;
	border-color:#377D9F;
	border-style:solid;
	font:normal 12px Trebuchet MS, Tahoma;
	color: #4CF5EA;
	text-decoration:none;
}
ul.pureCssMenu li a:hover{
	position:relative;
	background-color:#377D9F;
	border-color:#377D9F;
	border-style:solid;
	font:normal 12px Trebuchet MS, Tahoma;
	color: #4CF5EA;
	text-decoration:none;
}
ul.pureCssMenu li.dis a {
	color: #666 !important;
}
ul.pureCssMenu img {border: none;float:left;_float:none;margin-right:2px;width:16px;
height:16px;
}
ul.pureCssMenu ul img {width:16px;
height:16px;
}
ul.pureCssMenu img.over{display:none}
ul.pureCssMenu li.dis a:hover img.over{display:none !important}
ul.pureCssMenu li.dis a:hover img.def {display:inline !important}
ul.pureCssMenu li:hover > a img.def  {display:none}
ul.pureCssMenu li:hover > a img.over {display:inline}
ul.pureCssMenu a:hover img.over,ul.pureCssMenu a:hover ul img.def,ul.pureCssMenu a:hover a:hover ul img.def,ul.pureCssMenu a:hover a:hover img.over,ul.pureCssMenu a:hover a:hover a:hover img.over{display:inline}
ul.pureCssMenu a:hover img.def,ul.pureCssMenu a:hover ul img.over,ul.pureCssMenu a:hover a:hover ul img.over,ul.pureCssMenu a:hover a:hover img.def,ul.pureCssMenu a:hover a:hover a:hover img.def{display:none}
ul.pureCssMenu a:hover ul,ul.pureCssMenu a:hover a:hover ul{display:block}
ul.pureCssMenu a:hover ul ul{display:none}
ul.pureCssMenu span{
	display:block;
	background-image:url(./images/arr_white.gif);
	background-position:right center;
	background-repeat: no-repeat;
   padding-right:12px;}
ul.pureCssMenu li:hover>a>span{	background-image:url(./images/arrv_white.gif);
}
ul.pureCssMenu a:hover span{	_background-image:url(./images/arrv_white.gif)}
ul.pureCssMenu ul span,ul.pureCssMenu a:hover table span{background-image:url(./images/arr_white.gif)}


</style>
</head>

<body>


<div class="main">
<ul class="pureCssMenu pureCssMenum">
	<li class="pureCssMenui"><a class="pureCssMenui" href="?"><span>Home</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class="pureCssMenum">
		<li class="pureCssMenui"><a class="pureCssMenui" href="?" title="Open admin area homepage">Admin Area</a></li>
		<li class="pureCssMenui"><a class="pureCssMenui" href="../" title="Open website homepage">Website</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>

	<li class="pureCssMenui"><a class="pureCssMenui" href="#"><span>Settings</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class="pureCssMenum">
		<li class="pureCssMenui"><a class="pureCssMenui" href="#" title="Edit the sidebar">Sidebar*</a></li>
		<li class="pureCssMenui"><a class="pureCssMenui" href="#" title="Edit the footer">Footer*</a></li>
		<li class="pureCssMenui"><a class="pureCssMenui" href="#" title="Edit overall site settings">Configuration*</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class="pureCssMenui"><a class="pureCssMenui" href="#" title="Edit pages, posts and links"><span>Manage</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class="pureCssMenum">
		<li class="pureCssMenui"><a class="pureCssMenui" href="#" title="Posts"><span>Posts</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class="pureCssMenum">
			<li class="pureCssMenui"><a class="pureCssMenui" href="?module=news&add" title="Add a new post">Add Post</a></li>
			<li class="pureCssMenui"><a class="pureCssMenui" href="?module=news&list" title="Edit and Delete your posts">List Posts</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class="pureCssMenui"><a class="pureCssMenui" href="#" title="Manage your static pages"><span>Static Pages</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class="pureCssMenum">
			<li class="pureCssMenui"><a class="pureCssMenui" href="?module=pages&add" title="Add a new static page">Add Page</a></li>
			<li class="pureCssMenui"><a class="pureCssMenui" href="?module=pages&list" title="Edit and Delete your pages">List Pages</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class="pureCssMenui"><a class="pureCssMenui" href="#" title="Edit and Delete your links"><span>Links</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class="pureCssMenum">
			<li class="pureCssMenui"><a class="pureCssMenui" href="?module=links&add" title="Add new link">Add Link</a></li>
			<li class="pureCssMenui"><a class="pureCssMenui" href="?module=links&list" title="Edit and Delete your links">List Links</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class="pureCssMenui"><a class="pureCssMenui" href="?module=socialsite&info" title="Send your posts to other">SocialSite</a></li>
	<li class="pureCssMenui"><a class="pureCssMenui" href="#" title="Information about SCMS"><span>SCMS</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class="pureCssMenum">
		<li class="pureCssMenui"><a class="pureCssMenui" href="?module=about" title="Information about this copy of SCMS">About</a></li>
		<li class="pureCssMenui"><a class="pureCssMenui" href="#" title="Check for newer versions of SCMS">Version Check*</a></li>
		<li class="pureCssMenui"><a class="pureCssMenui" href="#" title="SCMS License">License*</a></li>
		<li class="pureCssMenui"><a class="pureCssMenui" href="#" title="These links open in a new window."><span>External Sites</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class="pureCssMenum">
			<li class="pureCssMenui"><a class="pureCssMenui" href="http://dimp.tk/scms" target="_blank" title="Go to SCMS homepage">SCMS Homepage</a></li>
			<li class="pureCssMenui"><a class="pureCssMenui" href="http://dimp.tk" target="_blank" title="SCMS developer homepage">Developer's Site</a></li>
			<li class="pureCssMenui"><a class="pureCssMenui" href="http://dimp.tk/scstats" title="Another php script by SCMS developer">ScStats.tk</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class="pureCssMenui"><a class="pureCssMenui" href="?logout" title="Log out of Admin Area">Logout</a></li>
	<li class="pureCssMenui"><a class="pureCssMenui">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li><li class="pureCssMenui"><a class="pureCssMenui"><i><small>* Not available yet</small></i></a></li>
</ul>

<br><br><br>
<table align=center width="60%" border=1>

		<center><?php include "check.php";?></center>

</table>
<br><br></div>
</body>
</html>
<?php
	include "../inc/dbclose.php";
?>
