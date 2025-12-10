<table class="section-ranking-panel-table">
	<thead>
		<tr>
			<th>#</th>
			<th><?php print $lang['name']; ?></th>
			<th><?php print $lang['empire']; ?></th>
			<th><?php print $lang['level']; ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(!$offline) {
			$top = array();
			$top = top10guilds();
			
			$i=1;
			
			foreach($top as $guild)
			{
				$empire=get_guild_empire($guild['master']);
		?>
		<tr>
			<td><?php print $i++; ?></td>
			<td><?php print $guild['name']; ?></td>
			<td>
				<div class="icon-flag icon-flag-<?=emire_name($empire);?>"></div>
			</td>
			<td><?php print $guild['level']; ?></td>
		</tr>
	
		<?php }
		} else print $offline_players;
		?>
	</tbody>
</table>
