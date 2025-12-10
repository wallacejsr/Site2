<?php

	@ob_start();

	include 'include/functions/header.php';

	if($page=='admin')

		include 'pages/'.$page.'.php';

	else

	{

	?>

<html lang="<?php print $language_code; ?>">

	<head>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="icon" type="image/png" href="assets/images/icon.png">

		<link rel="preconnect" href="https://fonts.googleapis.com">

		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">

		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&amp;family=Philosopher:wght@400;700&amp;display=swap" rel="stylesheet">

		<link href="<?php print $site_url; ?>assets/css/bootstrap.min.css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<link href="<?php print $site_url; ?>assets/css/style.css" rel="stylesheet">

		<script src="<?php print $site_url; ?>assets/js/jquery.min.js"></script>

		<script src="<?php print $site_url; ?>assets/js/bootstrap.min.js"></script>

		<script src="<?php print $site_url; ?>assets/js/app.js"></script>

		<title><?php print $site_title.' - '.$title; if($offline) print ' - '.$lang['server-offline']; ?></title>

	</head>

	<body>

		<?php if ($anunt_header == 1) { ?>

		<a href="">

			<div class="event" style="background: #e68a00; color: #fff; padding: 10px 0;text-align: center;font-size: 13px;font-weight: normal; width: 100%; height: 40px; min-width: 1244px;">

				<img src="assets/images/Warning-icon.png" alt="POZOR">&nbsp; <?=$anunt_header_text;?> &nbsp; <img src="assets/images/Warning-icon.png" alt="POZOR">

			</div>

		</a>

		<?php } ?>

		

		<div id="invite-panel">

			<a href="#" id="invite-panel-close"><i class="fa-solid fa-xmark"></i></a>

			<h4>Junte-se</h4><br>
			<h4>agora!</h4>

			<br>

			Traga seus amigos para o Azrael2 e concorra a uma recompensa!

			<a href="/user/login" id="invite-panel-button">Convite</a>

		</div>

		

		<div class="topbar">

			<div class="container">

				<div class="row">

					<div class="col-md-6">

						Bem-vindo ao <?=$site_title;?> <a href="<?php print $site_url; ?>users/login" style="text-transform:lowercase;"><?php print $lang['login']; ?></a> or <a href="<?php print $site_url; ?>users/register" style="text-transform:lowercase;"><?php print $lang['register']; ?></a>. 

					</div>

					<div class="col-md-6 text-end">

						Você tem algum problema ou dúvida? <a href="<?=$discord;?>" target="_BLANK">Contate-nos</a>

					</div>

				</div>

			</div>

		</div>

		<nav class="navbar navbar-expand-lg" style="box-shadow: 0px 11px 8px 0px rgb(0 0 0 / 41%);" id="navbar">

			<div class="container">

				<a href="<?php print $site_url; ?>" class="navbar-brand">

				<img src="<?php print $site_url; ?>assets/images/logo.png">

				</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar"><i class="fa-solid fa-bars"></i></button>

				<div class="collapse navbar-collapse" id="collapsibleNavbar">

					<ul class="navbar-nav ms-auto">

						<li class="nav-item">

							<a class="nav-link <?php if($page=='news') print 'active'; ?>" href="<?php print $site_url; ?>"><?php print $lang['news']; ?></a>

						</li>

						<li class="nav-item">

							<a class="nav-link <?php if($page=='download') print 'active'; ?>" href="<?php print $site_url; ?>download"><?php print $lang['download']; ?></a>

						</li>

						<li class="nav-item">

							<a class="nav-link <?php if($page=='register') print 'active'; ?>" href="<?php print $site_url; ?>users/register"><?php print $lang['register']; ?></a>

						</li>

						<li class="nav-item">

							<a class="nav-link" href="<?php print $site_url; ?>itemshop">Itemshop</a>

						</li>

						<li class="nav-item">

							<a class="nav-link <?php if($page=='players' || $page=='guilds') print 'active'; ?>" href="<?php print $site_url; ?>ranking/players"><?php print $lang['ranking']; ?></a>

						</li>

						<li class="nav-item">

							<?php if($offline || !$database->is_loggedin()) { ?>

								<a class="nav-link nav-link-button" href="<?php print $site_url; ?>users/login"><?php print $lang['login']; ?></a>

							<?php } else { ?>

								<a class="nav-link nav-link-button" href="<?php print $site_url; ?>user/administration"><?php print $lang['user-panel']; ?></a>

							<?php } ?>

						</li>

						<?php if($web_admin) { ?>

						<li class="nav-item">

							<a class="nav-link nav-link-button" href="<?php print $site_url; ?>admin">Admin Panel</a>

						</li>

						<?php }?>

					</ul>

				</div>

			</div>

		</nav>

		<script type="text/javascript">

			function setRankingTab(tab) {

				if(tab == 1)

				{

					document.getElementById("ranking-table-player").style.display="";

					document.getElementById("ranking-table-guild").style.display="none";

				}else{

					document.getElementById("ranking-table-player").style.display="none";

					document.getElementById("ranking-table-guild").style.display="";

				}

			}

			//function showNewsFullText(id = 0) {

				// // $('.modal-content').load('/statistiky.txt',function(){

					// // $('#newsLargeModal').modal({show:true});

				// // });

				//$('#newsLargeModal').modal('show')

			//}

			//function hideNewsModal() {

			//	$('#newsLargeModal').modal('hide')

			//}

		</script>

		<?php include 'pages/'.$page.'.php'; ?>



		<script src="<?=$site_url; ?>assets/js/app-home.js"></script>

		<?php include 'include/functions/footer.php'; ?>

		<div class="footer">

			<div class="footer-nav">

				<a href="<?=$site_url; ?>" class="active"><?php print $lang['news']; ?></a>

				<a href="<?=$site_url; ?>user/register" class=""><?php print $lang['register']; ?></a>

				<a href="<?=$site_url; ?>download" class=""><?php print $lang['download']; ?></a>

				<a href="<?=$site_url; ?>rankings" class=""><?php print $lang['ranking']; ?></a>

			</div>

			<div class="footer-logo">

				<a href="/"><img src="<?=$site_url; ?>assets/images/logo.png"></a>

			</div>

			<div class="footer-links">

				<div class="container">

					<div class="row">

						<div class="col-sm-8">

							<p class="footer-copyright">© 2025 Coded by <a href="#">Azrael2</a></p>

						</div>

						<div class="col-sm-4 text-end">

							<div class="footer-social">

								<a href="<?=$facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>

								<a href="<?=$discord; ?>" target="_blank"><i class="fab fa-discord"></i></a>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</body>

</html>

	<?php }?>