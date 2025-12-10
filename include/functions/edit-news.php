<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus fa-2"></i> <?= $lang['edit-article'];?></a>
<a class="btn btn-danger" href="<?php print $site_url; ?>?delete=<?php print $read_id; ?>" onclick="return confirm('<?php print $lang['sure?']; ?>');"><i style="" class="fa fa-trash" aria-hidden="true"></i> Delete </a>
<br><br>
<?php
		if(isset($_POST['title']) && isset($_POST['content']))
			if(!empty($_POST['title']) && !empty($_POST['content']))
			{
				$paginate->edit($read_id, $_POST['title'], $_POST['content']);
				print '<script>window.location = window.location.href;</script>';
			}
			
		print '<form method="post" action="">';
		
		
		print '<form method="post" action="">';
		print '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">';
		
		print '<p>'.$lang['title'].':</p>';
		print '<input name="title" type="text" class="form-control -webkit-transition" placeholder="'.$lang['title'].'" value="'.$article['title'].'">';
		print '<p>'.$lang['content'].':</p>';
		print '<textarea class="ckeditor" name="content">'.$article['content'].'</textarea>';
		print '</br><input type="submit" class="btn-big btn-success btn-sm btn" value="'.$lang['edit-article'].'">';
		print '</div></div>';
		print '</form>';
		print '</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">'.$lang['new-article'].'</button>
				</div>
				</div>
				</div>';
?>