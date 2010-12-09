<?php
if(preg_match("/check.php/", $_SERVER['PHP_SELF']) == 1 ) {
	include('panel.php');
	die('');
}

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
include("functions.php");
if (isset($_GET['module'])) {
	$module = $_GET['module'];

	///////////////////////////////////
	// Post manipulation begins here //
	///////////////////////////////////
	if ($module == "news") { 
		if (isset($_GET['add'])) {
			if (isset($_POST['sub'])) {
				$result = mysql_query("SELECT id FROM authors WHERE username = '$user' limit 1");
				while($row = mysql_fetch_array($result)) {
					$usrid = $row['id'];
				}
				$titlep = htmlentities($_POST['title'], ENT_QUOTES);
				$contentp = htmlentities($_POST['content'], ENT_QUOTES);
				$added = mysql_query("INSERT INTO posts (title, content, author) VALUES ('$titlep', '$contentp', '$usrid')");
				if (!$added) {
					echo('An error occured while submiting your post: ' . mysql_error());
				}
				else echo("Post submitted! ");
			}
			else {
				postnew($user);
			}
		}
		else if (isset($_GET['edit'])) {
			if (isset($_POST['sub'])) {
				$titlep = htmlentities($_POST['title'], ENT_QUOTES);
				$contentp = htmlentities($_POST['content'], ENT_QUOTES);
				$result = mysql_query("UPDATE posts SET `title`='$titlep', `content`='$contentp' WHERE id='$_POST[postid]' ");
				if (!$result) {
					echo('An error occured while updating your post: ' . mysql_error());
				}
				else echo("Post updated successfully");
			}
			else {
				postedit($_GET['id']);
			}
		}
		else if (isset($_GET['del'])) {
			$postid = $_GET['id'];
			postdel($postid);
		}
		else if (isset($_GET['list'])) {
			postlist($user);
		}
		else {
			echo "Sorry, something went wrong. Maybe you mistyped the url?";
		}
	}
	/////////////////////////////////
	// Post manipulation ends here //
	/////////////////////////////////
	
	
	///////////////////////////////////
	// Page manipulation begins here //
	///////////////////////////////////
	else if ($module == "pages") { 
		if (isset($_GET['add'])) {
			if (isset($_POST['sub'])) {
				$result = mysql_query("SELECT id FROM authors WHERE username = '$user' limit 1");
				while($row = mysql_fetch_array($result)) {
					$usrid = $row['id'];
				}
				$titlep = htmlentities($_POST['title'], ENT_QUOTES);
				$contentp = htmlentities($_POST['content'], ENT_QUOTES);
				$added = mysql_query("INSERT INTO pages (title, content, author) VALUES ('$titlep', '$contentp', '$usrid')");
				if (!$added) {
					echo('An error occured while submiting your post: ' . mysql_error());
				}
				else echo("Post submitted! ");
			}
			else {
				pagenew($user);
			}
		}
		else if (isset($_GET['edit'])) {
			if (isset($_POST['sub'])) {
				$titlep = htmlentities($_POST['title'], ENT_QUOTES);
				$contentp = htmlentities($_POST['content'], ENT_QUOTES);
				$result = mysql_query("UPDATE pages SET `title`='$titlep', `content`='$contentp' WHERE id='$_POST[postid]' ");
				if (!$result) {
					echo('An error occured while updating your post: ' . mysql_error());
				}
				else echo("Post updated successfully");
			}
			else {
				pageedit($_GET['id']);
			}
		}
		else if (isset($_GET['del'])) {
			$postid = $_GET['id'];
			pagedel($postid);
		}
		else if (isset($_GET['list'])) {
			pagelist($user);
		}
		else {
			echo "Sorry, something went wrong. Maybe you mistyped the url?";
		}
	}
	/////////////////////////////////
	// Page manipulation ends here //
	/////////////////////////////////
	
	
	///////////////////////////////////////
	// Settings manipulation starts here //
	///////////////////////////////////////
	else if ($module == "config") { 
	
	
	}
	/////////////////////////////////////
	// Settings manipulation ends here //
	/////////////////////////////////////
	
	else if ($module == "about") {
		about($sver);
	}
	
	////////////////////////////////////
	// Links manipulation begins here //
	////////////////////////////////////
	
	else if ($module == "links") {
		if (isset($_GET['add'])) {
			if (isset($_POST['sub'])) {
				$result = mysql_query("SELECT id FROM authors WHERE username = '$user' limit 1");
				while($row = mysql_fetch_array($result)) {
					$usrid = $row['id'];
				}
				$titlel = htmlentities($_POST['title'], ENT_QUOTES);
				$linkurl = htmlentities($_POST['content']);
				$typel = htmlentities($_POST['type']);
				$added = mysql_query("INSERT INTO links (title, url, type) VALUES ('$titlel', '$linkurl', '$typel')");
				if (!$added) {
					echo('An error occured while submiting your link: ' . mysql_error());
				}
				else echo("Link submitted! ");
			}
			else {
				linksnew($user);
			}
		}
		else if (isset($_GET['edit'])) {
			if (isset($_POST['sub'])) {
				$titlel = htmlentities($_POST['title'], ENT_QUOTES);
				$linkurl = htmlentities($_POST['content']);
				$typel = htmlentities($_POST['type']);
				$result = mysql_query("UPDATE links SET `title`='$titlel', `url`='$linkurl', `type`='$typel' WHERE id='$_POST[postid]' ");
				if (!$result) {
					echo('An error occured while updating your link: ' . mysql_error());
				}
				else echo("Link updated successfully");
			}
			else {
				linksedit($_GET['id']);
			}
		}
		else if (isset($_GET['del'])) {
			$postid = $_GET['id'];
			linksdel($postid);
		}
		else if (isset($_GET['list'])) linkslist($user);
		else echo('Please choose something from the menu');
	}
	else {
			echo "Sorry, function \"" . $_GET['module'] ."\" is not available. Choose something from the menus instead!";
	}
	
	
}
else {
	echo "Welcome to SCms Admin Panel!<br><br>\nWanna add something? :-)";
}
?>
