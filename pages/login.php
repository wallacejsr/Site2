<div class="page">
	<div class="container">
		<h1 class="page-title"><?php print $lang['login']; ?></h1>
		<h6 class="page-subtitle"></h6>
		<div class="panel-login">
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-5 col-sm-8 offset-lg-8 offset-md-7 offset-sm-2">
					<form role="form" method="post" action="">
						<?php
							if(isset($_POST['username']) && isset($_POST['password']))
							{
								print '<div class="alert alert-danger" role="alert">';
								switch ($login_info[0]) {
									case 1:
										print 'logged';
										break;
									case 2:
										print $lang['account-blocked'];
										break;
									case 3:
										print $lang['error-login'];
										break;
									case 4:
										print $lang['error-login-email'];
										break;
									case 5:
										print $lang['account-blocked-temporary'].' ('.$login_info[2].')';
										break;
									default:
										print 'ERROR';
								}
								print '</div>';
								
								if($login_info[0]==2 || $login_info[0]==5)
								print '<div class="alert alert-info" role="alert">'.$lang['reason'].': '.$login_info[1].'</div>';
							}
						?>
						<br><br><br>
						<div class="form-group">
							<input class="form-control" name="username" pattern=".{5,64}" maxlength="64" placeholder="<?php print $lang['user-name-or-email']; ?>" required="" type="text" autocomplete="off">
						</div>
						<div class="form-group">
							<input class="form-control" name="password" pattern=".{5,16}" maxlength="16" placeholder="<?php print $lang['password']; ?>" required="" type="password">
						</div>
						<br>
						<div class="clearfix"></div>
						<center><input type="submit" value="<?php print $lang['login']; ?>" class="panel-login-submit" tabindex=""></center>
					</form>
					<div class="row">
						<div class="col-md-6">
							<p><a href="<?php print $site_url; ?>users/register"><?php print $lang['register']; ?></a></p>
						</div>
						<div class="col-md-6">
							<p style="text-align: right"><a href="<?php print $site_url; ?>users/lost"><?php print $lang['forget-password']; ?></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>