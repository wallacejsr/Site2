<div class="page">
	<div class="container">
		<h1 class="page-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print $article['title']; ?></font></font></h1>
		<h6 class="page-subtitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></h6>
		<div class="panel">
			<div class="text-center">
			<?php	
				if(!$offline && $database->is_loggedin())
					if($web_admin>=$jsondataPrivileges['news'])
						include 'include/functions/edit-news.php';
						if(!$offline && $database->is_loggedin())
							if($web_admin>=$jsondataPrivileges['news'])
							{
								print $article['content'];
							}
			?>
</div>
				</div>
			</div>
		</div>