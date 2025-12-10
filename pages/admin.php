<!DOCTYPE html>
<html lang="<?php print $language_code; ?>">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title><?php print $site_title.' - '.$title; if($offline) print ' - '.$lang['server-offline']; ?></title>
      <!-- Custom fonts for this template-->
      <link href="<?=$site_url; ?>universal_panel/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <!-- Custom styles for this template-->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <link href="<?=$site_url; ?>universal_panel/admin/css/sb-admin-2.min.css" rel="stylesheet">
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
            </div>
            <div class="sidebar-brand-text mx-3">Admin Panel <sup>Metin2CMS.CF</sup></div>
         </a>
         <!-- Divider -->
         <hr class="sidebar-divider my-0">
         <!-- Nav Item - Dashboard -->
         <li class="nav-item active">
            <a class="nav-link" href="<?php print $site_url; ?>admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><? print $lang['news'];?></span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
         <!-- Heading -->
         <div class="sidebar-heading">
            <?php print $lang['general-settings']; ?>
         </div>
         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/links">
            <i class="fa fa-cog fa-1"></i>
            <span><?php print $lang['general-settings']; ?></span>
            </a>
         </li>
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/download">
            <i class="fa fa-download fa-1" aria-hidden="true"></i>
            <span><?php print $lang['download']; ?></span>
            </a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
         <!-- Heading -->
         <div class="sidebar-heading">
            <?php print $lang['functions']; ?>
         </div>
         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/functions">
            <i class="fa fa-cog fa-1"></i> 
            <span>Functions</span>
            </a>
         </li>
         <!-- Nav Item - Charts -->
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/privileges">
            <i class="fa fa-users fa-1" aria-hidden="true"></i>
            <span><?php print $lang['privileges']; ?></span>
            </a>
         </li>
         <!-- Nav Item - Tables -->
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/vote4coins">
            <i class="fa fa-users fa-1" aria-hidden="true"></i>
            <span>Vote4Coins</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/referrals">
            <i class="fa fa-user-plus fa-1" aria-hidden="true"></i>
            <span><?php print $lang['referrals']; ?></span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/redeem">
            <i class="fa fa-barcode fa-1" aria-hidden="true"></i>
            <span><?php print $lang['redeem-codes']; ?></span>
            </a>
         </li>
         <hr class="sidebar-divider">
         <!-- Heading -->
         <div class="sidebar-heading">
            <?php print $lang['donate']; ?>
         </div>
         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/donate">
            <i class="fa fa-credit-card  fa-1" aria-hidden="true"></i>
            <span><?php print $lang['donate']; ?></span>
            </a>
         </li>
         <!-- Nav Item - Charts -->
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/donatelist">
            <i class="fa fa-check fa-1" aria-hidden="true"></i>
            <span><?php print $lang['donatelist' ]; ?></span>
            </a>
         </li>
         <hr class="sidebar-divider">
         <!-- Heading -->
         <div class="sidebar-heading">
            <?php print $lang['game-management']; ?>
         </div>
         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/players">
            <i class="fa fa-user fa-1" aria-hidden="true"></i>
            <span> <?php print $lang['player-management']; ?></span>
            </a>
         </li>
         <!-- Nav Item - Charts -->
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/log">
            <i class="fa fa-binoculars fa-1" aria-hidden="true"></i>
            <span>LOG</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/createitems">
            <i class="fa fa-fire fa-1" aria-hidden="true"></i>
            <span><?php print $lang['create-items']; ?></span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/coins">
            <i class="fa fa-dollar fa-1" aria-hidden="true"></i> 
            <span><?php print $lang['add-coins']; ?></span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/reward">
            <i class="fa fa-gift fa-1" aria-hidden="true"></i>
            <span><?php print $lang['reward-players']; ?></span>
            </a>
         </li>
         <div class="sidebar-heading">
            METIN2CMS - ADMIN
         </div>
         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link" href="<?php print $site_url; ?>admin/language">
            <i class="fa fa-user fa-1" aria-hidden="true"></i>
            <span> <?php print $lang['site-translate']; ?></span>
            </a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">
         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
      </ul>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
         <!-- Main Content -->
         <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">
               <!-- Sidebar Toggle (Topbar) -->
               <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
               <i class="fa fa-bars"></i>
               </button>
               <!-- Topbar Search -->
               <a href="<?php print $site_url; ?>" class="btn btn-primary btn-icon-split">
               <span class="icon text-white-50">
               <i class="fas fa-arrow-right"></i>
               </span>
               <span class="text"><?php print $lang['news'];?></span>
               </a>
               <!-- Topbar Navbar -->
               <ul class="navbar-nav ml-auto">
                  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                  <li class="nav-item dropdown no-arrow d-sm-none">
                     <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-search fa-fw"></i>
                     </a>
                  <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     </a>
                  </li>
               </ul>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
               <!-- Page Heading -->
               <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-gray-800"><?php print $a_title; ?></h1>
               </div>
               <!-- Content Row -->
               <div class="row">
				<?php
					if($web_admin>=9)
					fix_account_columns();
					?>
				<?php
                     include 'pages/admin/'.$a_page.'.php';
                     ?>
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                     <span>Copyright &copy; <a href="https://metin2cms.cf">Metin2CMS</a></span>
                  </div>
               </div>
            </footer>
            <!-- End of Footer -->
         </div>
         <!-- End of Content Wrapper -->
      </div>
      <!-- End of Page Wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Bootstrap core JavaScript-->
      <script src="<?=$site_url; ?>universal_panel/admin/vendor/jquery/jquery.min.js"></script>
      <script src="<?=$site_url; ?>universal_panel/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="<?=$site_url; ?>universal_panel/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?=$site_url; ?>universal_panel/admin/js/sb-admin-2.min.js"></script>
      <!-- Page level plugins -->
      <script src="<?=$site_url; ?>universal_panel/admin/vendor/chart.js/Chart.min.js"></script>
      <!-- Page level custom scripts -->
      <script src="<?=$site_url; ?>universal_panel/admin/js/demo/chart-area-demo.js"></script>
      <script src="<?=$site_url; ?>universal_panel/admin/js/demo/chart-pie-demo.js"></script>
   </body>
</html>