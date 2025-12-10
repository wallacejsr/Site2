<div class="page">
	<div class="container">
		<h1 class="page-title"><?php print $lang['redeem-my-code']; ?></h1>
		<h6 class="page-subtitle"></h6>
		<div class="panel">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="row text-center">
					
						<?php if($received>=0) { ?>
						<div class="alert alert-<?php if(!$received || $received==4) print 'danger'; else print 'success'; ?>" role="alert">
							<?php
								if(!$received)
									print $lang['incorrect-redeem'];
								else if($received==1 || $received==2)
								{
									print $lang['collected_md'].' '.$coins.' '; 
									if($received==1)
										print $lang['md'].' (MD)';
									else print $lang['jd'].' (JD)';
									print '.';
								} else if($received==3)
									print $lang['successfully_added'];
								else
									print $lang['no_space'];
							?>
						</div>
						<?php } ?>
							
						<form action="" method="POST">
							
								<input type="text" class="form-control form-control-lg" value="" name="code" required>
								<center>
									<button class="nav-link nav-link-button" type="submit" data-placement="button">
										<i class="fa fa-check" aria-hidden="true"></i> <?php print $lang['redeem-my-code']; ?>
									</button>
								</center>
								
						
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>