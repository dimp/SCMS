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

//Fetching Site config
	include("dbcon.php");
		$qry = mysql_query("SELECT * FROM settings");	
	while($row = mysql_fetch_array($qry)) {
		$apid = $row['id'];
		//echo $pid."\n";
		if ($apid == "sitename") {
			$sitename=$row['value'];
		}
		else if ($apid == "sitetitle") {
			$sitetitle=$row['value'];
		}
		else if ($apid == "theme") {
			$theme=$row['value'];
		}
		else if ($apid == "postsperpage") {
			$limit=$row['value'];
		}
	}
	//$sitename = getvalue('sitename');
	//$sitetitle=getvalue('sitetitle');
	//$theme=getvalue('theme');
	$footer=getvalue('footer');
	$charset=getvalue('charset');
	// Checking if the user wants to use SEO friendly links
	// such as http://site.com/content/postid
	// or http://site.com/?pid=postid
	$fancylinks=getvalue('fancylinks');
	$postsnumber=getvalue('lastposts');
	if ($fancylinks == '1') {
		$authorfancy=getvalue('authorurl');
		$postfancy=getvalue('posturl');
		$staticfancy=getvalue('pagesurl');
		$pagefancy=getvalue('contentpageurl');
		$link = array('author' => $authorfancy, 'post' => $postfancy, 'pages' => $pagefancy, 'static' => $staticfancy);
	}
	else {
		$link = array('author' => '?auid=', 'post' => '?pid=', 'pages' => '?page=', 'static' => '?sid=');
	}
	include("inc/dbclose.php");
	
	
function getvalue($wtg) {
	$qry = mysql_query("SELECT * FROM settings WHERE id='$wtg' LIMIT 1");
	$row = mysql_fetch_array($qry);
	$value = $row['value'];
	return $value;
}
?>
