<div class="col-xl-12 col-lg-12">
<div class="card mb-4">
                                <div class="card-header">
                                    <?php print $title; ?>
                                </div>
                                <div class="card-body">
    <form action="" method="post">
		
	<?php
		foreach($jsondataPrivileges as $key => $function)
		{
	?>
		<div class="form-group row">
			<label for="active-registrations" class="col-sm-8 col-form-label"><?php if($key=='Vote4Coins' || $key=='Log') print $key; else print $lang[$key]; ?></label>
			<div class="col-sm-4">
			<select class="form-control" name="<?php print $key; ?>">
				<?php for($i=9;$i>=1;$i--) { ?>
				<option value="<?php print $i; ?>"<?php if($function==$i) print ' selected="selected"'; ?>><?php print $i; ?></option>
				<?php } ?>
			</select>
			</div>
		</div>
	<?php } ?>
		
        <div class="form-group row">
            <div class="offset-sm-8 col-sm-4">
                <button type="submit" name="submit" class="btn btn-primary"><?php print $lang['save']; ?></button>
            </div>
        </div>
	</form>
</div>
</div>
</div>