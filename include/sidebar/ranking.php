
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
			$top = top10players();
			
			$i=1;
			
			foreach($top as $player)
			{
				$empire=get_player_empire($player['account_id']);
		?>
		<tr>
			<td><?php print $i++; ?></td>
			<td><?php print $player['name']; ?></td>
			<td>
				<div class="icon-flag icon-flag-<?=emire_name($empire);?>"></div>
			</td>
			<td><?php print $player['level']; ?></td>
		</tr>
	
		<?php }
		} else print $offline_players;
		?>
	</tbody>
</table>
