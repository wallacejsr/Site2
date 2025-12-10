<?php
foreach($jsondataFunctions as $key => $status)
if(!in_array($key, array('active-registrations', 'players-debug', 'active-referrals')) && $status)
{
?>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-primary shadow h-100 py-2">
<div class="card-body">

<center>
<div class="col mr-5">
<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php print $lang[$key]; ?></div>
<div class="h5 mb-0 font-weight-bold text-gray-800"><?php print number_format(getStatistics($key), 0, '', '.'); ?></div>
</div>
</center>

</div>
</div>
</div>
<?php } ?>
<div class="container-fluid">
               <!-- Page Heading -->
               <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-gray-800">Online Players - Stats</h1>
               </div>
               <!-- Content Row -->
               <div class="row">
<div class="col-xl-6 col-lg-6">
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary"><?php print $lang['players-online']; ?> (Name)</h6>
      </div>
      <div class="card-body">
         <?php print showOnlinePlayers_minute(5); ?>
      </div>
   </div>
</div>
<div class="col-xl-6 col-lg-6">
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary"><?php print $lang['players-online-last-24h']; ?> (Name)</h6>
      </div>
      <div class="card-body">
         <?php print showOnlinePlayers_h(1); ?>
      </div>
   </div>
</div>
</div></div>
