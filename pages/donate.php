<div class="page">
	<div class="container">
		<h1 class="page-title"><?php print $lang['donate']; ?></h1>
		<h6 class="page-subtitle"></h6>
		<div class="panel">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="row text-center">
	<?php
	if(isset($_POST['id']) && isset($_POST['type']) && isset($_POST['code']) && strlen($_POST['code']) >= 3 && strlen($_POST['code']) <= 50)
	{
		if(isset($jsondataDonate[$_POST['id']]['list'][$_POST['type']]))
		{
			$price = $jsondataDonate[$_POST['id']]['list'][$_POST['type']];
			$type = $jsondataDonate[$_POST['id']]['name'].' ['.$price['price'].' '.$jsondataCurrency[$price['currency']]['name'].' - '.$price['md'].' MD]';
			
							insert_donate($_SESSION['id'], $_POST['code'], $type);
		
							print '<div class="alert alert-success alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>';
							print $lang['send-donate'];
							print '</div>';	
		}
	}
	if(count($jsondataDonate)) { ?>
	
	<?php $i=-1; foreach($jsondataDonate as $key => $donate) { $i++; ?>
		<center><?php print $donate['name']; ?></center>
			<br>	<br>	<br>
				<?php 
					if(strtolower($donate['name'])=="paypal")
					{
				?>
					<form action="" method="post">
						<input type="hidden" name="id" value="<?php print $i; ?>">
						<input type="hidden" name="method" value="<?php print $donate['name']; ?>">
						<div class="form-group row">
							<div class="col-sm-6">
								<select class="form-control" name="type">
								<?php $j=-1; foreach($jsondataDonate[$i]['list'] as $key => $price) { $j++; ?>
									<option value="<?php print $j; ?>"><?php print $lang['price'].' '.$price['price'].' '.$jsondataCurrency[$price['currency']]['name'].' - '.$price['md'].' MD'; ?></option>
								<?php } ?>
								</select>
							</div>
							<div class="col-sm-6">
								<button type="submit" name="submit" class="nav-link nav-link-button" style="margin-top:-0.5px;"><?php print $lang['send']; ?></button>
							</div>
						</div>
					</form>
				<?php } else { ?>
					<form action="" method="post">
						<input type="hidden" name="id" value="<?php print $i; ?>">
						<input type="hidden" name="method" value="<?php print $donate['name']; ?>">
						<div class="form-group row">
							<div class="col-sm-6">
								<select class="form-control" name="type">
								<?php $j=-1; foreach($jsondataDonate[$i]['list'] as $key => $price) { $j++; ?>
									<option value="<?php print $j; ?>"><?php print $lang['price'].' '.$price['price'].' '.$jsondataCurrency[$price['currency']]['name'].' - '.$price['md'].' MD'; ?></option>
								<?php } ?>
								</select>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" max="50" name="code" placeholder="<?php print $lang['code']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<button type="submit" name="submit" class="nav-link nav-link-button" style="margin-top:-5px;"><?php print $lang['send']; ?></button>
						</div>
					</form>
				<?php } ?>
				
	<?php } ?>
	
	<?php } else { ?>
	<div class="alert alert-info" role="alert">
		<strong>Info!</strong> Donate methods not found.
	</div>
	<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>