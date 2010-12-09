<?php
///
/// Used to rewrite the links
///

function mainURL() {
 $pageURL = 'http';
 if (@$_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 $pageURL .= $_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"];
 $urlArray = explode('/', $pageURL, -1);
 $ar = count($urlArray);
  $i = 0;
  $pageURLf='';
 while($i < $ar) {
	 $pageURLf .= $urlArray[$i];
	 $pageURLf .= '/';
	 $i++;
 }
 return $pageURLf;
}

///
/// Used to retrieve all posts from database
///
function postlist($theme, $link, $pno, $limit) {
	if (!isset($pno)) $pno = "0";
	$rstart = $pno * $limit;
	$result = mysql_query("SELECT * FROM posts ORDER BY id desc LIMIT $rstart,$limit");
	while($row = mysql_fetch_array($result)) {
		$pid = $row['id'];
		$pname = $row['title'];
		$pbody = html_entity_decode($row['content']);
		$pdate = $row['postdate'];
		$auid = $row['author'];
		$author = mysql_query("SELECT username FROM authors WHERE id='$auid' LIMIT 1");
		$aurow = mysql_fetch_array($author);
		$pauthor = $aurow['username'];
		$linkto = $link['post'];
		include("tpl/$theme/post.tpl");
	}
	$mainurl = mainURL();
	
	//calculating total posts, and then calculating how many posts are remaining to show.
	$query = mysql_query("SELECT COUNT(*) FROM posts");
	list($totalrows) = mysql_fetch_row($query);
	$remainingrows = $totalrows - $rstart - $limit;
	
	$linkto2 = $link['pages'];
	
	//If the page number ($pno) is greater than 0, we show a Newer Posts link
	if ($pno > "0") {
		$pagenum = $pno - 1;
		echo "<a href=\"$mainurl$linkto2$pagenum\">Newer Posts</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		
	}
	//If not we add some spaces to send "Older Posts" link a little bit to the right
	else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	//If the posts to show is greater than 0, we show an Older Posts link
	if ($remainingrows > "0" ) {
		$pagenum = $pno + 1;
		echo "<a href=\"$mainurl$linkto2$pagenum\">Older Posts</a>";

	}
}

///
/// Used to retrieve all posts from a single author
///
function authorpost($theme, $author, $link) {
	$authres = mysql_query("SELECT * FROM authors WHERE username='$author' LIMIT 1");
	$authrow = mysql_fetch_array($authres);
	$authid = $authrow['id'];
	$pres = mysql_query("SELECT * FROM posts WHERE author='$authid' ORDER BY id desc");
	while($row = mysql_fetch_array($pres)) {
		$pid = $row['id'];
		$pname = $row['title'];
		$pbody = html_entity_decode($row['content']);
		$pdate = $row['postdate'];
		$auid = $row['author'];
		$pauthor = $author;
		$linkto = $link['post'];
		include("tpl/$theme/post.tpl");
	}
}


///
/// Used to retrieve a single post
///
function singlepost($theme, $pid, $link) {
	$result = mysql_query("SELECT * FROM posts WHERE id='$pid'");
	$row = mysql_fetch_array($result);
	$pname = $row['title'];
	$pbody = html_entity_decode($row['content']);
	$pdate = $row['postdate'];
	$auid = $row['author'];
	$author = mysql_query("SELECT username FROM authors WHERE id='$auid' LIMIT 1");
	$aurow = mysql_fetch_array($author);
	$pauthor = $aurow['username'];
	$linkto = $link['post'];
	include("tpl/$theme/post.tpl");
}

///
/// Will be used for custom error messages
///
function errorshow($theme, $status) {
		$codes = array( 
				403 => array('403 Forbidden', 'The server has refused to fulfill your request.'), 
				404 => array('404 Not Found', 'The document/file requested was not found.'), 
				405 => array('405 Method Not Allowed', 'The method specified in the Request-Line is not allowed for the specified resource.'), 
				408 => array('408 Request Timeout', 'Your browser failed to sent a request in the time allowed by the server.'), 
				500 => array('500 Internal Server Error', 'The request was unsuccessful due to an unexpected condition encountered by the server.'), 
				502 => array('502 Bad Gateway', 'The server received an invalid response from the upstream server while trying to fulfill the request.'), 
				504 => array('504 Gateway Timeout', 'The upstream server failed to send a request in the time allowed by the server.') 
				); 
				 
		$title = $codes[$status][0]; 
		$message = $codes[$status][1]; 
		echo '<p><h1>' . $title . '</h1></p>' .  
			 '<p>' . $message . '</p>';  
		//include("tpl/$theme/error.tpl");
}

///
/// Used to retrieve menu bar links
/// Usage: links2get('position')
function links2get($position) {
	$query = "SELECT * FROM links WHERE type='$position'";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result)) {
		$linktitle = $row['title'];
		$linkurl = $row['url'];
		echo "<li><a href=\"$linkurl\">$linktitle</a></li>\n";
	}
}

//
// Used to get all the static pages from the database.
function getstaticpages($link) {
	$result = mysql_query("SELECT * FROM pages");
	while($row = mysql_fetch_array($result)) {
	$pname = $row['title'];
	$pbody = html_entity_decode($row['content']);
	$pdate = $row['postdate'];
	$auid = $row['author'];
	$author = mysql_query("SELECT username FROM authors WHERE id='$auid' LIMIT 1");
	$aurow = mysql_fetch_array($author);
	$pauthor = $aurow['username'];
	$linkto = $link['static'];
	?>
	<li><a href="<?php echo mainURL(); ?><?php echo $linkto . $pname; ?>"><?php echo $pname; ?></a></li>
	<?php
	}
}

//
// Used to get X last posts from the database
function getlastposts($link, $postsnumber) {
	$result = mysql_query("SELECT * FROM posts ORDER BY id desc  limit 5");
	while($row = mysql_fetch_array($result)) {
		$pid = $row['id'];
		$pname = $row['title'];
		$linkto = $link['post'];
	?>
	<li><a href="<?php echo mainURL(); ?><?php echo $linkto . $pid; ?>"><?php echo $pname; ?></a></li>
	<?php
	}
}

//
//function for static pages
function showstatic($theme, $pid, $link) {
	//$siddash = str_replace("-", " ", $sid);
	//$pid = $siddash;
	$result = mysql_query("SELECT * FROM pages WHERE title='$pid'");
	$row = mysql_fetch_array($result);
	$pname = $row['title'];
	$pbody = html_entity_decode($row['content']);
	$pdate = $row['postdate'];
	$auid = $row['author'];
	$author = mysql_query("SELECT username FROM authors WHERE id='$auid' LIMIT 1");
	$aurow = mysql_fetch_array($author);
	$pauthor = $aurow['username'];
	$linkto = $link['static'];
	include("tpl/$theme/post.tpl");
}

?>
