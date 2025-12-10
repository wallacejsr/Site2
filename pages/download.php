<div class="page">
	<div class="container">
		<h1 class="page-title"><?php print $lang['download']; ?></h1>
		<h6 class="page-subtitle"></h6>
		<div class="panel">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="row text-center">
						<?php 
							if(count($jsondataDownload)) { 
								$i=1; foreach($jsondataDownload as $key => $download) {
							?>
						<div class="col-md-8 offset-md-2">
							<div class="clearfix"></div>
							<a href="<?php print $download['link']; ?>" target="_BLANK" class="download-button"><?php print $download['name']; ?> <small><?php print $lang['download']; ?></small></a>
							<div class="clearfix"></div>
						</div>
					</div>
					<?php }} ?>
					<div class="download-requirements">
						Minimal requirements:
						<table>
							<tbody>
								<tr></tr>
								<tr>
									<td>OS:</td>
									<td>Windows 10</td>
								</tr>
								<tr>
									<td>Procesor:</td>
									<td>Intel Core2Duo E4300 / AMD Athlon 64 X2 3600+</td>
								</tr>
								<tr>
									<td>Operation memory:</td>
									<td>2GB RAM</td>
								</tr>
								<tr>
									<td>GPU:</td>
									<td>Graphics card with 512MB VRAM</td>
								</tr>
								<tr>
									<td>DirectX:</td>
									<td>Version 9.0</td>
								</tr>
								<tr>
									<td>Internet Access:</td>
									<td>Broadband connection</td>
								</tr>
								<tr>
									<td>Storage:</td>
									<td>8 GB free disk space</td>
								</tr>
								<tr>
									<td>Sound:</td>
									<td>Support DirectX 9.0.</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>