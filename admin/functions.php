<?php
/////////////////////
// Posts functions //
/////////////////////

function postnew() {
	calltinymce("add", "0", "news");
	
}

function postedit($postid) {
	calltinymce("edit", $postid, "news");
	
}

function postdel($postid) {
	$result = mysql_query("SELECT * from posts where id='$postid'");
	$row = mysql_fetch_array($result);
	//echo $row['title'];
	if (!isset($row['title'])) {
		echo "Error! Post with id $postid does not exist. Maybe it was already deleted by someone else...";
	}
	else {
		$result = mysql_query("DELETE FROM posts WHERE id='$postid'");
		if($result==1) {
			echo "Post " . $row['title'] . " (id " . $postid . ") deleted with success!";
		}
		else{
			echo "An error occured...";
		}
	}
}

function postlist($user) {
	echo "\n<tr><td><i>Post ID</i></td> <td><i>Title <small>(Click to edit)</small></i></td> <td></td>\n";
	$result = mysql_query("SELECT id FROM authors WHERE username = '$user' limit 1");
		while($row = mysql_fetch_array($result)) {
		$usrid = $row['id'];
	}
	$result = mysql_query("SELECT * FROM posts where author = '$usrid' ORDER BY id desc");
	while($row = mysql_fetch_array($result)) {
		echo "<tr><td>" . $row['id'] . "</td><td><a href=\"panel.php?module=news&id=" . $row['id'] . "&edit\">" . $row['title'] . "</a></td><td><a href=\"panel.php?module=news&id=" . $row['id'] . "&del\">Delete</a></td></tr>\n";
	}
}

/////////////////////
// Pages functions //
/////////////////////


function pagenew() {
	calltinymce("add", "0", "pages");
	
}

function pageedit($postid) {
	calltinymce("edit", $postid, "pages");
	
}

function pagedel($postid) {
	$result = mysql_query("SELECT * from pages where id='$postid'");
	$row = mysql_fetch_array($result);
	//echo $row['title'];
	if (!isset($row['title'])) {
		echo "Error! Page with id $postid does not exist. Maybe it was already deleted by someone else...";
	}
	else {
		$result = mysql_query("DELETE FROM pages WHERE id='$postid'");
		if($result==1) {
			echo "Page " . $row['title'] . " (id " . $postid . ") deleted with success!";
		}
		else{
			echo "An error occured...";
		}
	}
}

function pagelist($user) {
	echo "\n<tr><td><i>Post ID</i></td> <td><i>Title <small>(Click to edit)</small></i></td> <td></td>\n";
	$result = mysql_query("SELECT id FROM authors WHERE username = '$user' limit 1");
		while($row = mysql_fetch_array($result)) {
		$usrid = $row['id'];
	}
	$result = mysql_query("SELECT * FROM pages where author = '$usrid' ORDER BY id desc");
	while($row = mysql_fetch_array($result)) {
		echo "<tr><td>" . $row['id'] . "</td><td><a href=\"panel.php?module=pages&id=" . $row['id'] . "&edit\">" . $row['title'] . "</a></td><td><a href=\"panel.php?module=pages&id=" . $row['id'] . "&del\">Delete</a></td></tr>\n";
	}
}

/////////////////////
// Links functions //
/////////////////////

function linksnew() {
	calltinymce("add", "0", "links");
	
}

function linksedit($postid) {
	calltinymce("edit", $postid, "links");
	
}

function linksdel($postid) {
	$result = mysql_query("SELECT * from links where id='$postid'");
	$row = mysql_fetch_array($result);
	//echo $row['title'];
	if (!isset($row['title'])) {
		echo "Error! Link with id $link does not exist. Maybe it was already deleted by someone else...?";
	}
	else {
		$result = mysql_query("DELETE FROM links WHERE id='$postid'");
		if($result==1) {
			echo "Link " . $row['title'] . " (id " . $postid . ") deleted with success!";
		}
		else{
			echo "An error occured...";
		}
	}
}

function linkslist($user) {
	echo "\n<tr><td><i>Link ID</i></td> <td><i>Title</i></td> <td><i>URL</i></td> <td><i>Place</i></td> <th colspan=2><i>Options</i></th>\n";
	/*
	$result = mysql_query("SELECT id FROM authors WHERE username = '$user' limit 1");
		while($row = mysql_fetch_array($result)) {
		$usrid = $row['id'];
	}
	* */
	echo "<tr><th colspan=6>Menubar Links</th></tr>";
	$result = mysql_query("SELECT * FROM links WHERE type='menubar' ORDER BY id asc");
	while($row = mysql_fetch_array($result)) {
		echo "<tr><td>" . $row['id'] . "</td><td> " . $row['title'] . "</td><td>" . $row['url'] . "</td> <td>" . $row['type'] . "</td><td><a href=\"panel.php?module=links&id=" . $row['id'] . "&edit\">Edit</a></td><td><a href=\"panel.php?module=links&id=" . $row['id'] . "&del\">Delete</a></td></tr>\n";
	}
	echo "<tr><th colspan=6>Sidebar Links</th></tr>";
	$result = mysql_query("SELECT * FROM links WHERE type='sidebar' ORDER BY id asc");
	while($row = mysql_fetch_array($result)) {
		echo "<tr><td>" . $row['id'] . "</td><td> " . $row['title'] . "</td><td>" . $row['url'] . "</td> <td>" . $row['type'] . "</td><td><a href=\"panel.php?module=links&id=" . $row['id'] . "&edit\">Edit</a></td><td><a href=\"panel.php?module=links&id=" . $row['id'] . "&del\">Delete</a></td></tr>\n";
	}
		
	echo "<tr><th colspan=6><br><br><a href=\"panel.php?module=links&add\">Add new</a></th></tr>\n";
}

/////////////////////
// Other functions //
/////////////////////

function errshow() {
	
	
}

function stats() {
	
	
}

function editconf() {
	
	
}

function edittopbar() {
	
	
}

function editsidebar() {
	
	
}

function editfooter() {
	
	
}

function twitter() {
	
	
}

function facebook() {
	
	
}

function othernetworks() {
	
	
}

function about($sver) {
			echo "Thank you for using SCms.<BR>You are using ";
		echo "version: " . $sver['main'] . " release " . $sver['release'] . " <BR>(For support or debugging please use this : " . $sver['main'] . "-" . $sver['state'] . $sver['subv']  . "-" .  $sver['release'] . ".)<BR>";
		echo "<BR></BR><BR>Developed by: <a href=\"http://www.dimp.tk/\">DIMP.tk</a>.";
		echo "<br>With resources from: <a href=\"http://www.php.net/\">PHP.net</a>";
		echo "<br> Admin area design: <a href=\"http://www.dimp.tk/\">DIMP.tk</a>";
		echo "<BR>Admin area menu bar generated at <a href=\"http://purecssmenu.com/\">Pure CSS Menu</a>\n";
		echo "<BR><BR>Hosted by: <a href=\"http://www.dimp.tk/\">DIMP.tk</a> (content & other info), <a href=\"http://scms.googlecode.com/\">Google Code</a> (downloads & ticket system), <a href=\"http://www.beanstalkapp.com/\">Beanstalkapp</a> (svn hosting).<br><br><br>";
		echo "Version Changelog:<br>";
		echo "Experimental: Adding/Editing/Removing links on admin area.<br>" .
			 "Experimental: Corrected static page listing on homepage.<br>" .
			 "Update: Admin area redesigned" .
			 "<br>Info: calltinymce() needs a total rewrite." .
			 "<br>Info: changed versioning scheme section" .
			 "<br>New: Limit posts per page, by default 15 posts." .
			 "<br>Experimental: Post navigation, \"Newer posts & Previous posts\" links on page navigation.".
			 "<br>Bugfix: Fixed Error 404 page which wasn't showing. But it won't show up if a post/page doesn't exist.".
			 "<br>Info: Added changelog on the about page.";
		//echo "<BR><BR>Follow us on <a href=\"http://twitter.com/scms\">twitter</a>, <a href=\"http://facebook.com/scms\">facebook</a> .";
	
}

///////////////////////
// WYSIWYG functions //
///////////////////////

function calltinymce($postaction, $postid, $type2) {
	if ($postid != "0" && $type2 !="links") {
		if ($type2="news") $type3 = "posts";
		else $type3 = $type2;
		$result = mysql_query("SELECT * from $type3 where id='$postid'");
		$row = mysql_fetch_array($result);
		$title = $row['title'];
		$content = $row['content'];
		$postdate = $row['postdate'];
	}

	else if ($postid !="0" && $type2 == "links") {
		$result = mysql_query("SELECT * from $type2 where id='$postid'");
		$row = mysql_fetch_array($result);
		$title = $row['title'];
		$content = $row['url'];
		$type = $row['type'];
		//$postdate = $row['postdate'];
	}
	else {
		$title = "";
		$content = "";
		$postid = "0";
	}
	if ($type2 == "links") {
	    $tbox = "<br>URL: <input type=\"text\" size=\"100%\" name=\"content\" value=\"$content\" >" .
				"<br>Type:     <select name=\"type\">";
				if ($postid !="0") {
					$typecap = ucwords($type);
					$tbox .= "<option value=\"$type\">$typecap</option>";
					$tbox .= "<option value=\"\" disabled>---</option>";
				}
				$tbox .= "<option value=\"sidebar\">Sidebar</option>" .
				"<option value=\"menubar\">Menubar</option>" .
		         "</select>";
	}
	else $tbox = "<textarea name=\"content\" cols=\"100\" rows=\"31\">$content</textarea><br>";
?>	
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
	theme : "advanced",
	mode : "textareas",
	height : "500",
	plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",
	theme_advanced_buttons3_add : "fullpage",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	entity_encoding : "raw",
	theme_advanced_resizing : true,

	
});
</script>
<form method="post" action="panel.php?module=<?php echo $type2; ?>&<?php echo $postaction; ?>">
	<p>	
		<input type="hidden" name="sub" value="ok">
		<input type="hidden" name="postid" value="<?php echo $postid; ?>">
		Title: <input type="text" size="100%" name="title" value="<?php echo $title; ?>" >
		<?php echo $tbox; ?><br>
		<input type="submit" value="Save" />
	</p>
</form>
<?php
}
?>

