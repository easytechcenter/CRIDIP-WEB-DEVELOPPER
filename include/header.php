<?php 
session_start();
include ('define.php');
include ('db.conf.php');
include (SITE."".DOSSIER."control/error.php");
if (!isset($_SESSION['login'])) {
header ("Location:".SITE."".DOSSIER."login.php");
exit();
}
?>
<?php
if(MAINTENANCE == '1'){
    header("Location: maintenance.php");
}
//Info utilisateur
$result = mysql_query("SELECT `iduser`, `login`, `nom_user`, `prenom_user`, `adresse1_user`, `adresse2_user`, `cp_user`, `ville_user`, `pays_user`, `adresse_mail`, `telephone_user`, `poste_user`, `link_google`, `link_twitter`, `link_github` FROM membre WHERE login = '".$_SESSION['login']. "'") or die(mysql_error());
$donnees_login = mysql_fetch_array($result);
?> 

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo LOGICIEL; ?></title>
<link href="<?php echo SITE,DOSSIER,ASSETS; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo SITE,DOSSIER,ASSETS; ?>css/londinium-theme.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo SITE,DOSSIER,ASSETS; ?>css/styles.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo SITE,DOSSIER,ASSETS; ?>css/icons.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/collapsible.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/application_blank.js"></script>
</head>