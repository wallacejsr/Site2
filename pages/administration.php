<?php 
	$account_name = getAccountName($_SESSION['id']); 
	if(isset($_POST['delete-code']))
	{
		$alt_message = $lang['delete-chars'];
		$subject = $lang['delete-chars'];
		$sendName = $account_name;
		$sendEmail = $myEmail;
		$code = getAccountSocialID($_SESSION['id']);
		
		$html_mail = sendCode($account_name, $code);
		include 'include/functions/sendEmail.php';
		
		print '<div class="alert alert-success alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>';
		print $lang['sended-code'];
		print '</div>';
	} else if(isset($_POST['storekeeper-code']))
	{
		$code = getPlayerSafeBoxPassword($_SESSION['id']);
		
		if($code!='' && $code!='000000')
		{
			$alt_message = $lang['storekeeper'];
			$subject = $lang['storekeeper'];
			$sendName = $account_name;
			$sendEmail = $myEmail;
			$html_mail = sendCode($account_name, $code, 2);
			include 'include/functions/sendEmail.php';
			
			print '<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>';
			print $lang['sended-code'];
			print '</div>';
		} else
		{
			print '<div class="alert alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>';
			print $lang['no-storekeeper'];
			print '</div>';
		}
	} else if(!$delete_account && isset($_POST['delete-account']))
	{
		$code = generateSocialID(32);
		update_deletion_token($_SESSION['id'], $code);
		
		$code = '<br><br><a href="'.$site_url.'user/delete/'.$code.'" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">'.$lang['delete-account'].'</a>';
		
		$alt_message = $lang['delete-account'];
		$subject = $lang['delete-account'];
		$sendName = $account_name;
		$sendEmail = $myEmail;
		$html_mail = sendCode($account_name, $code, 3);
		include 'include/functions/sendEmail.php';
			
		print '<div class="alert alert-success alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>';
		print $lang['sended-code'];
		print '</div>';
	} else if(isset($_POST['change-password']))
	{
		$code = generateSocialID(32);
		update_passlost_token_by_email($myEmail, $code);
		
		$code = '<br><br><a href="'.$site_url.'user/password/'.$code.'" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">'.$lang['change-password'].'</a>';
		
		$alt_message = $lang['password'];
		$subject = $lang['password'];
		$sendName = $account_name;
		$sendEmail = $myEmail;
		$html_mail = sendCode($account_name, $code, 4);
		include 'include/functions/sendEmail.php';
			
		print '<div class="alert alert-success alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>';
		print $lang['sended-code'];
		print '</div>';
	}
?>
<div class="page">
	<div class="container">
		<h1 class="page-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print $lang['my-account']; ?></font></font></h1>
		<h6 class="page-subtitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></h6>
		<div class="panel">
			<div class="text-center">
				<a href="" class="panel-button panel-button-active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cont</font></font></a>
				<a href="<?php print $site_url; ?>user/redeem" class="panel-button"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print $lang['redeem-codes']; ?></font></font></a>
				<?php if($jsondataFunctions['active-referrals']) { ?>
				<a href="<?php print $site_url; ?>user/referrals" class="panel-button"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print $lang['referrals']; ?></font></font></a>
				<?php } if($item_shop!="") { ?>
				<a href="<?php print $item_shop; ?>" class="panel-button"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print $lang['item-shop']; ?></font></font></a>
				<?php }
					$vote4coins = file_get_contents('include/db/vote4coins.json');
					$vote4coins = json_decode($vote4coins, true);
					
					if(count($vote4coins))
						print '<a href="'.$site_url.'user/vote4coins" class="panel-button">Vote4Coins</a>';
					
					$donate = file_get_contents('include/db/donate.json');
					$donate = json_decode($donate, true);
					
					if(count($donate))
						print '<a href="'.$site_url.'user/donate" class="panel-button">'.$lang['donate'].'</a>';
				?>
				
				<a href="<?php print $site_url; ?>users/logout" class="panel-button"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Deconectați-vă</font></font></a>
			</div>
			<div class="panel-bar">
				<div class="row">
					<div class="col-xl-8 col-lg-10 offset-xl-2 offset-lg-1">
						<div class="row">
							<div class="col-5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
								Welcome, <?=$account_name;?>
								</font></font>
							</div>
							<div class="col-7 text-end"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
								<strong><a href="<?=$site_url;?>user/donate"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cumpără monede</font></font></a></strong>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 col-lg-10 offset-xl-2 offset-lg-1">
					<div class="panel-box">
						<table class="panel-settings-table">
							<tbody>
								<tr>
									<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print $lang['user-name']; ?>:</font></font></td>
									<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$account_name;?></font></font></td>
									<td></td>
								</tr>
								<tr>
									<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print $lang['email-address']; ?>:</font></font></td>
									<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print $myEmail; ?></font></font></td>
									<td><a href="<?php print $site_url; ?>user/email" name="change-password" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;"><i class='fa-solid fa-pen-to-square fa-fw'></i></button>
										
									</td>
								</tr>
								<tr>
									<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print $lang['change-password']; ?>:</font></font></td>
									<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">***</font></font></td>
									<td>
										<form action="" method="post">
											<button type="submit" name="change-password" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" onclick="return confirm('<?php print $lang['sure_send?']; ?>')"><i class='fa-solid fa-pen-to-square fa-fw'></i></button>
										</form>
									</td>
								</tr>
								<tr>
									<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print $lang['request-storekeeper']; ?>:</font></font></td>
									<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">***</font></font></td>
									<td>
										<form action="" method="post">
											<button type="submit" name="storekeeper-code" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" onclick="return confirm('<?php print $lang['sure_send?']; ?>')"><i class='fa-solid fa-pen-to-square fa-fw'></i></button>
										</form>
									</td>
								</tr>
								<tr>
									<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print $lang['delete-chars']; ?>:</font></font></td>
									<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">***</font></font></td>
									<td>
										<form action="" method="post">
											<button type="submit" name="delete-code" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" onclick="return confirm('<?php print $lang['sure_send?']; ?>')"><i class='fa-solid fa-pen-to-square fa-fw'></i></button>
										</form>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<h6 class="panel-box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print $lang['chars-list']; ?></font></font></h6>
					<div class="panel-box">
						<div class="row text-center">
						<?php
							$list = characters_list();
							$ranking = get_player_rank($list);
							if($jsondataFunctions['players-debug'] && isset($_POST['debug']))
								foreach($list as $player)
									if($player['id']==intval($_POST['debug']))
									{
										print '<div class="alert alert-success alert-dismissible fade in" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>';
										print $lang['debug-success'];
										print '</div>';
										
										$empire = get_player_empire($_SESSION['id']);	

										if($empire==1) { $mapindex = "0"; $x = "459770"; $y = "953980";}
										elseif($empire==2) { $mapindex = "21"; $x = "52043"; $y = "166304";}
										elseif($empire==3) { $mapindex = "41"; $x = "957291"; $y = "255221";}
										
										reset_char($player['id'], $mapindex, $x, $y);
									}
							if(count($list)) { 
							?>
							<div style="background-color: white;">
								<table class="table table-hover">
									<thead class="thead-inverse">
										<tr>
											<th><?php print $lang['rank-position']; ?></th>
											<th><?php print $lang['class']; ?></th>
											<th><?php print $lang['name']; ?></th>
											<th><?php print $lang['level']; ?></th>
											<th>EXP</th>
											<?php if($jsondataFunctions['players-debug']) { ?>
												<th><center><?php print $lang['debug']; ?></center></th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach($list as $player) { 
											$job = job_name($player['job']);
										?>
										<tr>
											<th scope="row"><?php print $ranking[$player['name']]; ?></th>
											<td><img src="<?php print $site_url.'assets/images/job/'.$player['job'].'.png'; ?>" width="32" alt="<?php print $job; ?>" title="<?php print $job; ?>"></td>
											<td><?php print $player['name']; ?></td>
											<td><?php print $player['level']; ?></td>
											<td><?php print $player['exp']; ?></td>
											<?php if($jsondataFunctions['players-debug']) { ?>
												<td>
													<form action="" method="post">
														<input type="hidden" name="debug" value="<?php print $player['id']; ?>">
														<center><button type="submit" name="submit" STYLE="width:100px;" class="panel-button"><?php print $lang['debug']; ?></button></center>
													</form>
												</td>
											<?php } ?>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<?php } else print $lang['no-chars']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>