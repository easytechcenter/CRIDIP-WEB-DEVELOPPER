<?php include ('include/header.php'); ?>
<?php
$titre_page = "Bienvenue";
//BREAD
$li_start = "<li><a href='index.html'>".LOGICIEL."</a></li>";
$li1 = "";
$li2 = "";
$li3 = "";
$li4 = "";
$li_end = "<li class='active'>".$titre_page."</li>";

?>

<body class="sidebar-wide">
<!-- Navbar -->
<?php include ('include/headerbar.php'); ?>
<!-- /navbar -->
<!-- Page container -->
<div class="page-container">
  <!-- Sidebar -->
  <?php include ('include/sidebar.php'); ?>
  <!-- /sidebar -->
  <!-- Page content -->
  <div class="page-content">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3>Wide left sidebar <small>Wide left sidebar blank page</small></h3>
      </div>
      <div id="reportrange" class="range">
        <div class="visible-xs header-element-toggle"><a class="btn btn-primary btn-icon"><i class="icon-calendar"></i></a></div>
        <div class="date-range"></div>
        <span class="label label-danger">9</span></div>
    </div>
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <?php echo $li_start; ?>
        <?php if(empty($li1)){echo "";}else{echo $li1;} ?>
        <?php if(empty($li2)){echo "";}else{echo $li2;} ?>
        <?php if(empty($li3)){echo "";}else{echo $li3;} ?>
        <?php if(empty($li4)){echo "";}else{echo $li4;} ?>
        <?php echo $li_end; ?>
      </ul>
    </div>
    <!-- /breadcrumbs line -->
    <?php
    if($sql_connect == FALSE){
    ?>
    <div class="alert alert-danger fade in block-inner">
    	<i class="icon-cancel-circle"></i> Erreur ! Impossible de ce connecter à la base de donnée 
    </div>
    <?php
    }
    ?>
    <?php
    if($sql_db == FALSE){
    ?>
    <div class="alert alert-danger fade in block-inner">
    	<i class="icon-cancel-circle"></i> Erreur ! Impossible d'acceder à la base de donnée 
    </div>
    <?php
    }
    ?>
    <!-- Default panel -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h6 class="panel-title">Default panel</h6>
      </div>
      <div class="panel-body"><code>div class="panel panel-default"</code></div>
    </div>
    <!-- /default panel -->
  </div>
  <!-- /page content -->
</div>
<!-- /content -->
</body>
</html>