			</div>
		</div>
	</div>
	<div id="sidebar">
		<ul>
			<li>
				<h2>Links </h2>
				<ul>
					<?php links2get("sidebar"); ?>
				</ul>
			</li>
			<li>
				<h2>Pages </h2>
				<ul>
					<?php getstaticpages($link); ?>
				</ul>
			</li>
			<li>
				<h2>Last <?php echo $postsnumber; ?> posts</h2>
				<ul>
					<?php getlastposts($link, $postsnumber); ?>
				</ul>
			</li>
		</ul>
	</div>
