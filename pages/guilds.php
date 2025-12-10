<div class="page">
	<div class="container">
		<h1 class="page-title"><?php print $lang['ranking']; ?> - <?php print $lang['guilds']; ?> </h1>
		<h6 class="page-subtitle"></h6>
		<div class="panel panel-ranking">
			<div class="text-center">
				<a href="<?=$site_url;?>ranking/players" class="panel-button"><?php print $lang['players']; ?></a>
				<a href="<?=$site_url;?>ranking/guilds" class="panel-button panel-button-active"><?php print $lang['guilds']; ?></a>
			</div>
			<div class="panel-bar">
				<div class="jumbotron jumbotron-fluid" style="padding: 1rem 2rem;">
					<form action="" method="POST">
						<center>
							<div class="input-group"  style="width:400px;">
								<input type="text" style="width:200px;" name="search" class="form-control" placeholder="<?php print $lang['name']; ?>" value="<?php if(isset($search)) print $search; ?>">
								<button type="submit" style="height:45px;margin-top:0.8px;" class="panel-login-submit"><i class="fa fa-search fa-1" aria-hidden="true"></i> <?php print $lang['search']; ?></button>
							</div>
						</center>
					</form>
				</div>
			</div>
			<table class="table table-striped panel-ranking-table">
				<thead>
					<tr>
						<th>#</th>
						<th><?php print $lang['guild']; ?></th>
						<th><?php print $lang['leader']; ?></th>
						<th><?php print $lang['empire']; ?></th>
						<th class="level-table"><?php print $lang['level']; ?></th>
						<th class="exp-table"><?php print $lang['points']; ?></th>
					</tr>
				</thead>
				<tbody>
					<?php		
						$records_per_page=10;

						if(isset($search))
						{
							$query = "SELECT id, name, master, level, ladder_point FROM guild WHERE name NOT LIKE '[%]%' AND name LIKE :search ORDER BY level DESC, ladder_point DESC, exp DESC, name ASC";
							$newquery = $paginate->paging($query,$records_per_page);
							$paginate->dataview($newquery, $search);
						} else {
							$query = "SELECT id, name, master, level, ladder_point FROM guild WHERE name NOT LIKE '[%]%' ORDER BY level DESC, ladder_point DESC, exp DESC, name ASC";
							$newquery = $paginate->paging($query,$records_per_page);
							$paginate->dataview($newquery);
						}
						
					?>
				</tbody>
			</table>
			<div class="d-flex justify-content-center">
				<ul class="pagination panel-ranking-pagination">
					<?php
						if(isset($search))
							$paginate->paginglink($query,$records_per_page,$lang['first-page'],$lang['last-page'],$site_url,$search);
						else
							$paginate->paginglink($query,$records_per_page,$lang['first-page'],$lang['last-page'],$site_url);
					?>
				</ul>
			</div>
		</div>
	</div>
</div>