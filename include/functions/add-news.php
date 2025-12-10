<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus fa-2"></i> <?= $lang['new-article'];?></a>
<br><br>
<?php
		if(isset($_POST['title']) && isset($_POST['content']))
			if(!empty($_POST['title']) && !empty($_POST['content']))
				$paginate->add($_POST['title'], $_POST['content']);
			
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
		print '<input name="title" type="text" class="form-control -webkit-transition" placeholder="'.$lang['title'].'" required>';
		print '<p>'.$lang['content'].':</p>';
		print '<textarea class="ckeditor" name="content"></textarea>';
		print '</form>';
		print '</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">'.$lang['new-article'].'</button>
				</div>
				</div>
				</div>
				</div>';
		
		

		
?>