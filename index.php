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
$starttime = explode(' ', microtime());
$starttime = $starttime[1] + $starttime[0];

include("inc/vars.php");
include("inc/dbcon.php");
include("inc/functions.php");
include("tpl/$theme/head.tpl");


if ($_GET){
	if (isset($_GET['pid'])) {
		$pid = $_GET['pid'];
		$forbchar = array("\"", "'", "\\", "/");
		$pid = str_replace($forbchar, "", $pid);
		singlepost($theme, $pid,  $link);
	}
	else if (isset($_GET['aid'])) {
		$author = $_GET['aid'];
		$forbchar = array("\"", "'", "\\", "/");
		$author = str_replace($forbchar, "", $author);
		authorpost($theme, $author, $link);
	}
	else if (isset($_GET['rid'])) {
		$status = $_SERVER['REDIRECT_STATUS']; 
		errorshow($theme, $status);
	}
	else if (isset($_GET['page'])) {
		postlist($theme, $link, $_GET['page'], $limit);		
		//echo $pid . "hey";
	}
	else if (isset($_GET['sid'])) {
		$sid = $_GET['sid'];
		$forbchar = array("\"", "'", "\\", "/");
		$sid = str_replace($forbchar, "", $sid);
		showstatic($theme, $sid, $link);
	}
	else {
		errorshow($theme, '404');
	}
}
else {
	postlist($theme, $link, '0', $limit);
}



include("tpl/$theme/sidebar.tpl");
include("tpl/$theme/foot.tpl");
include("inc/dbclose.php");

$mtime = explode(' ', microtime());
$totaltime = $mtime[0] + $mtime[1] - $starttime;
printf('<small>Page generated in %.3f seconds.</small>', $totaltime);
?>
