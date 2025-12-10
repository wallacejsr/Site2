<div class="col-xl-12 col-lg-12">
<div class="card mb-4">
                                <div class="card-header">
                                    <?php print $title; ?>
                                </div>
                                <div class="card-body">
    <center>
<form action="" method="post">
		
	<?php
	foreach($jsondataFunctions as $key => $function)
		if(($key=='offline-shops' && check_table_in_player('offline_shop_npc')) || ($key!='offline-shops' && $key!='active-referrals'))
		{
	?>
		<div class="form-group row">
			<label for="active-registrations" class="col-sm-4 col-form-label"><?php print $lang[$key]; ?></label>
			<div class="col-sm-4">
			<select class="form-control" name="<?php print $key; ?>">
				<option value="1"<?php if($function) print ' selected="selected"'; ?>><?php print $lang['yes']; ?></option>
				<option value="0"<?php if(!$function) print ' selected="selected"'; ?>><?php print $lang['no']; ?></option>
			</select>
			</div>
		</div>
	<?php } ?>
		
        <div class="form-group row">
            <div class="offset-sm-4 col-sm-4">
                <button type="submit" name="submit" class="btn btn-primary"><?php print $lang['save']; ?></button>
            </div>
        </div>
	</form>
	</center>
</div>
</div>
</div>