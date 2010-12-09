<?php
include("config.php");
//include("../inc/dbcon.php");
@$upass = $_POST['pass'];
@$uname = $_POST['uname'];
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="<?php echo $srvname; ?> internet station stats page">
<meta name="keywords" content="Shoutcast, Radio, Internet, Web, Community">
<meta name="author" content="Shoutcast Server Stats/DimitrisP">
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body bgcolor=E6F2F5 link=0000CC alink=black vlink=black>
  <!--[if lt IE 7]>
  <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>
    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>
    <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>
      <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>
      <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
        <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>You are using an outdated browser</div>
        <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>For a better experience using this site, please upgrade to a modern web browser.</div>
      </div>
      <div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>
      <div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>
      <div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>
      <div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>
    </div>
  </div>
  <![endif]-->
<table width="300" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
<tr><td>
<center>SCms Admin Login</center>
</td></tr>
</table>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
<tr>
<form name="form1" method="post" action="processlogin.php" >
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="white">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="uname" type="text" id="uname"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="pass" type="password" id="pass"></td>
</tr>
<tr>
<td> </td>
<td> </td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<center><a href="http://scstats.tk/cms">SCms</a> admin panel was tested & works with: <a href="http://www.getfirefox.com/">Firefox</a>, <a href="http://www.google.com/chrome">Google Chrome</a> & <a href="http://www.opera.com/">Opera</a></center>
</body>
</html>
<?php
	include "../inc/dbclose.php";
?>
