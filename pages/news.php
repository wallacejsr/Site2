		<div class="header">

			<div class="container">

				<div class="row">

					<div class="col-md-6">

						<h2>Bem-vindo, Guerreiro</h2>

						<p>O mundo de <?=$site_title;?> está cheio de monstros sanguinários, meteoros e monstros lendários espreitando em cada esquina. Corra para ajudar os outros, vingue os caídos e lute para alcançar a glória!</p>

						<a href="<?php print $site_url; ?>download" class="header-button-download"><?php print $lang['download']; ?></a>

						<small>Espaço do cliente necessário: 3GB</small>

					</div>

				</div>

			</div>

		</div>

<div class="section-stats">
	<div class="container">
		<div class="row">

		<?php
		// PRIMEIRO LOOP (sem alterações)
		foreach($jsondataFunctions as $key => $status) {
			if($key == 'players-online')
			{
		?>
			<div class="col-lg-3 col-sm-6">
				<h4><?php print $lang[$key]; ?> <small>no servidor</small></h4>
				<?php
				$onplsts=number_format(getStatistics($key), 0, '', '.');
				if($onplsts > 100)
					$chart_on_pl = 100;
				else $chart_on_pl = $onplsts;
				?>
				<div class="section-stats-bar">
					<div style="width: <?= $chart_on_pl;?>%"></div>
				</div>
				<?php print $lang[$key]; ?>: <?php print number_format(getStatistics($key), 0, '', '.'); ?>
			</div>
		<?php 
			}
		}

		// SEGUNDO LOOP (sem alterações)
		foreach($jsondataFunctions as $key => $status) {
			if($key == 'players-online-last-24h')
			{
		?>
			<div class="col-lg-3 col-sm-6">
				<h4><?php print $lang[$key]; ?> <small>nas últimas 24 horas</small></h4>
				<?php
				$onplstsdp=number_format(getStatistics($key), 0, '', '.');
				if($onplstsdp > 100)
					$chart_ondp_pl = 100;
				else $chart_ondp_pl = $onplstsdp;
				?>
				<div class="section-stats-bar">
					<div style="width: <?= $chart_ondp_pl;?>%"></div>
				</div>
				<?php print $lang[$key]; ?>:  <?php print number_format(getStatistics($key), 0, '', '.'); ?>
			</div>
		<?php 
			}
		}

		// TERCEIRO LOOP (MODIFICADO CONFORME O SEU PEDIDO)
		foreach($jsondataFunctions as $key => $status) {
			if($key == 'accounts-created' || $key == 'created-characters')
			{
		?>
			<div class="col-lg-3 col-sm-6">
				<?php
				// Define o título e o subtítulo manualmente
				if ($key == 'accounts-created') {
					$titulo_manual = 'Contas criadas';
					$subtitulo_manual = 'no total';
				} else { // Se não for 'accounts-created', então é 'created-characters'
					$titulo_manual = 'Personagens criados';
					$subtitulo_manual = 'no total';
				}
				?>
				<h4><?php echo $titulo_manual; ?> <small><?php echo $subtitulo_manual; ?></small></h4>
				<h5><?php print number_format(getStatistics($key), 0, '', '.'); ?></h5>
			</div>
		<?php 
			}
		}
		?>

		</div>
	</div>
</div>

		<div class="section">

			<div class="container">

			<?php

				if(!$offline && $database->is_loggedin())

					if($web_admin>=$jsondataPrivileges['news'])

						include 'include/functions/add-news.php';

				?>

				<div class="news-slider">

					<div class="news-slider-container">

						<?php

							$query = "SELECT * FROM news ORDER BY id DESC";

							$records_per_page=intval(getJsonSettings("news"));

							$newquery = $paginate->paging($query,$records_per_page);

							$paginate->dataview($newquery, $lang['sure?'], $web_admin, $jsondataPrivileges['news'], $site_url, $lang['read-more']);

							$paginate->paginglink($query,$records_per_page,$lang['first-page'],$lang['last-page'],$site_url);		

						?>

					</div>

					<span class="news-slider-text">As últimas notícias</span>

					<span class="news-slider-text news-slider-text-right">Notícias anteriores</span>

				</div>

			</div>

		</div>

		<div class="section-register">

			<div class="container">

				<div class="row">

					<div class="col-lg-6">

						<?php include 'painel/status_evento.php'; ?>

					</div>

					<div class="col-lg-6">

						<p>Crie uma conta no jogo agora, é rápido e totalmente grátis! <a href="#">Estamos ansiosos para ver você no jogo!</a></p>

						<a href="<?php print $site_url; ?>user/register" class="section-register-button"><?php print $lang['register']; ?></a>

					</div>

				</div>

			</div>

		</div>

		<div class="section-ranking">

			<div class="container">

				<h2 class="section-ranking-title">Os melhores jogadores</h2>

				<h4 class="section-ranking-subtitle">Por classe</h4>

				<div style="display: none;">

					<img src="<?php print $site_url; ?>assets/images/ranking_icon_warrior.png">

					<img src="<?php print $site_url; ?>assets/images/ranking_icon_ninja.png">

					<img src="<?php print $site_url; ?>assets/images/ranking_icon_sura.png">

					<img src="<?php print $site_url; ?>assets/images/ranking_icon_shaman.png">

					<img src="<?php print $site_url; ?>assets/images/ranking_icon_lycan.png">

					<img src="<?php print $site_url; ?>assets/images/ranking_icon_warrior_active.png">

					<img src="<?php print $site_url; ?>assets/images/ranking_icon_ninja_active.png">

					<img src="<?php print $site_url; ?>assets/images/ranking_icon_sura_active.png">

					<img src="<?php print $site_url; ?>assets/images/ranking_icon_shaman_active.png">

					<img src="<?php print $site_url; ?>assets/images/ranking_icon_lycan_active.png">

					<img src="<?php print $site_url; ?>assets/images/character_warrior_m.png">

					<img src="<?php print $site_url; ?>assets/images/character_ninja_m.png">

					<img src="<?php print $site_url; ?>assets/images/character_sura_m.png">

					<img src="<?php print $site_url; ?>assets/images/character_shaman_m.png">

					<img src="<?php print $site_url; ?>assets/images/character_warrior_f.png">

					<img src="<?php print $site_url; ?>assets/images/character_ninja_f.png">

					<img src="<?php print $site_url; ?>assets/images/character_sura_f.png">

					<img src="<?php print $site_url; ?>assets/images/character_shaman_f.png">

					<img src="<?php print $site_url; ?>assets/images/character_lycan.png">

					<img src="<?php print $site_url; ?>assets/images/flag_chunjo.png">

					<img src="<?php print $site_url; ?>assets/images/flag_jinno.png">

					<img src="<?php print $site_url; ?>assets/images/flag_shinsoo.png">

				</div>

				<ul class="nav nav-pills section-ranking-nav">

					<li class="nav-item section-ranking-nav-warrior">

						<a class="nav-link active" data-bs-toggle="pill" href="#ranking_tabs_warrior"><?php print $lang['warrior']; ?></a>

					</li>

					<li class="nav-item section-ranking-nav-sura">

						<a class="nav-link" data-bs-toggle="pill" href="#ranking_tabs_sura"><?php print $lang['sura']; ?></a>

					</li>

					<li class="nav-item section-ranking-nav-ninja">

						<a class="nav-link" data-bs-toggle="pill" href="#ranking_tabs_ninja"><?php print $lang['ninja']; ?></a>

					</li>

					<li class="nav-item section-ranking-nav-shaman">

						<a class="nav-link" data-bs-toggle="pill" href="#ranking_tabs_shaman"><?php print $lang['shaman']; ?></a>

					</li>

				</ul>

				

				<div class="row">

					<div class="col-xxl-9 col-lg-8">

						<div class="tab-content">

							<div class="tab-pane container active" id="ranking_tabs_warrior">

								<div class="row">

									<div class="col-md-4">

										<div class="section-ranking-character-info">

											<div class="section-ranking-flag section-ranking-flag-<?= emire_name(get_player_empire(bestrace(0,4,"account_id")));?>"></div>

											<h4><?= bestrace(0,4,"name"); ?></h4>

											<h5><?= emire_name(get_player_empire(bestrace(0,4,"account_id")));?> <span>Level: <?= bestrace(0,4,"level"); ?></span></h5>

										</div>

										<table class="section-ranking-table">

											<tbody>

												<tr>

													

												</tr>

											</tbody>

										</table>

									</div>

									<div class="col-md-8 d-md-block d-none">

										<div class="section-ranking-character section-ranking-character-warrior-<?php if(bestrace(0,4,"job")==0) print 'm'; else print 'f';  ?>"></div>

									</div>

								</div>

							</div>

							<div class="tab-pane container fade" id="ranking_tabs_ninja">

								<div class="row">

									<div class="col-md-4">

										<div class="section-ranking-character-info">

											<div class="section-ranking-flag section-ranking-flag-<?= emire_name(get_player_empire(bestrace(1,5,"account_id")));?>"></div>

											<h4><?= bestrace(1,5,"name"); ?></h4>

											<h5><?= emire_name(get_player_empire(bestrace(1,5,"account_id")));?> <span>Level: <?= bestrace(1,5,"level"); ?></span></h5>

										</div>

										<table class="section-ranking-table">

											<tbody>

												<tr>

													

												</tr>

											</tbody>

										</table>

									</div>

									<div class="col-md-8 d-md-block d-none">

										<div class="section-ranking-character section-ranking-character-ninja-<?php if(bestrace(1,5,"job")==5) print 'm'; else print 'f';  ?>"></div>

									</div>

								</div>

							</div>

							<div class="tab-pane container fade" id="ranking_tabs_sura">

								<div class="row">

									<div class="col-md-4">

										<div class="section-ranking-character-info">

											<div class="section-ranking-flag section-ranking-flag-<?= emire_name(get_player_empire(bestrace(2,6,"account_id")));?>"></div>

											<h4><?= bestrace(2,6,"name"); ?></h4>

											<h5><?= emire_name(get_player_empire(bestrace(2,6,"account_id")));?> <span>Level: <?= bestrace(2,6,"level"); ?></span></h5>

										</div>

										<table class="section-ranking-table">

											<tbody>

												<tr>

													

												</tr>

											</tbody>

										</table>

									</div>

									<div class="col-md-8 d-md-block d-none">

										<div class="section-ranking-character section-ranking-character-sura-<?php if(bestrace(2,6,"job")==2) print 'm'; else print 'f';  ?>"></div>

									</div>

								</div>

							</div>

							<div class="tab-pane container fade" id="ranking_tabs_shaman">

								<div class="row">

									<div class="col-md-4">

										<div class="section-ranking-character-info">

											<div class="section-ranking-flag section-ranking-flag-<?= emire_name(get_player_empire(bestrace(3,7,"account_id")));?>"></div>

											<h4><?= bestrace(3,7,"name"); ?></h4>

											<h5><?= emire_name(get_player_empire(bestrace(3,7,"account_id")));?> <span>Level: <?= bestrace(3,7,"level"); ?></span></h5>

										</div>

										<table class="section-ranking-table">

											<tbody>

												<tr>

													

												</tr>

											</tbody>

										</table>

									</div>

									<div class="col-md-8 d-md-block d-none">

										<div class="section-ranking-character section-ranking-character-shaman-<?php if(bestrace(3,7,"job")==7) print 'm'; else print 'f';  ?>"></div>

									</div>

								</div>

							</div>

							<div class="tab-pane container fade" id="ranking_tabs_lycan">

								<div class="row">

									<div class="col-md-4">

										<div class="section-ranking-character-info">

											<div class="section-ranking-flag section-ranking-flag-<?= emire_name(get_player_empire(bestrace(8,8,"account_id")));?>"></div>

												<h4><?= bestrace(8,8,"name"); ?></h4>

												<h5><?= emire_name(get_player_empire(bestrace(8,8,"account_id")));?> <span>Level: <?= bestrace(8,8,"level"); ?></span></h5>

										</div> 

									</div>

									<div class="col-md-8 d-md-block d-none">

										<div class="section-ranking-character section-ranking-character-lycan"></div>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="col-xxl-3 col-lg-4" id="ranking-table-player">

						<h6 class="section-ranking-panel-title"><?php print $lang['ranking']; ?> <?php print $lang['players']; ?></h6>

						<div class="section-ranking-panel">

							<?php include 'include/sidebar/ranking.php'; ?>

							<a href="javascript:setRankingTab(2);" class="section-ranking-character-button"><?php print $lang['ranking']; ?> <?php print $lang['guilds']; ?></a>

						</div>

					</div>

					<div class="col-xxl-3 col-lg-4" style="display: none;" id="ranking-table-guild">

						<h6 class="section-ranking-panel-title"><?php print $lang['ranking']; ?> <?php print $lang['guilds']; ?></h6>

						<div class="section-ranking-panel">

							<?php include 'include/sidebar/ranking_guild.php'; ?>

						<a href="javascript:setRankingTab(1);" class="section-ranking-character-button"><?php print $lang['ranking']; ?> <?php print $lang['players']; ?></a>

						</div>

					</div>

				</div>

				<a href="/rankings" class="section-ranking-button">Veja a classificação completa</a>

			</div>

		</div>

		<div class="section-community">

			<div class="container">

				<div class="row">

					<div class="col-lg-5">

						<h2>Junte-se à nossa comunidade!</h2>

					</div>

					<div class="col-lg-7 text-end">

						<a href="<?=$facebook; ?>" target="_blank" class="section-community-button"><i class="fa-brands fa-facebook"></i> Facebook</a>

						<a href="<?=$discord; ?>" target="_blank" class="section-community-button"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>

					</div>

				</div>

			</div>

		</div>