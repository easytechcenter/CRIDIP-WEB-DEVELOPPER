<?php
include ('include/db.conf.php');
include ('include/define.php');
include ('include/error.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Londinium - premium responsive admin template by Eugene Kopyov</title>
<link href="<?php echo SITE,DOSSIER,ASSETS; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo SITE,DOSSIER,ASSETS; ?>css/londinium-theme.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo SITE,DOSSIER,ASSETS; ?>css/styles.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo SITE,DOSSIER,ASSETS; ?>css/icons.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/charts/sparkline.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/switch.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/uploader/plupload.full.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/uploader/plupload.queue.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/forms/wysihtml5/toolbar.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/plugins/interface/collapsible.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo SITE,DOSSIER,ASSETS; ?>js/application.js"></script>
</head>
<body class="full-width page-condensed">
<!-- Login wrapper -->
<div class="login-wrapper">
  <form action="login.php" role="form" method="POST">
    <div class="well">
          <?php
            // on teste si le visiteur a soumis le formulaire de connexion
            date_default_timezone_set("UTC");
            $date = date('d/m/y');
            $heure = date('H:i');
            if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
                if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

                    // on teste si une entrée de la base contient ce couple login / pass
                    $sql = 'SELECT count(*) FROM membre WHERE login="'.mysql_escape_string($_POST['login']).'"  AND pass_md5="'.mysql_escape_string(md5($_POST['pass'])).'"';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    $data = mysql_fetch_array($req);
                    mysql_free_result($req);
                    mysql_close();

                    // si on obtient une réponse, alors l'utilisateur est un membre
                    if ($data[0] == 1) {
                        session_start();
                        $_SESSION['login'] = $_POST['login'];
                        header('Location: index.php');
                        exit();
                    }
                    // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
                    elseif ($data[0] == 0) {
                        $erreur = E8777;
                    }
                    // sinon, alors la, il y a un gros problème :)
                    else {
                        $erreur = E8776;
                    }
                }
                else {
                $erreur = E8778;
                }
            }
            ?>
            <?php if(empty($erreur)){echo "";}else{echo $erreur;} ?>
      <div class="form-group has-feedback">
        <label>NOM D'UTILISATEUR</label>
        <input type="text" class="form-control" placeholder="NOM D'UTILISATEUR" name="login">
        <i class="icon-users form-control-feedback"></i></div>
      <div class="form-group has-feedback">
        <label>MOT DE PASSE</label>
        <input type="password" class="form-control" placeholder="Password">
        <i class="icon-lock form-control-feedback"></i></div>
      <div class="row form-actions">
        <div class="col-xs-6">
          <button type="submit" class="btn btn-warning pull-right" name="connexion" value="Connexion"><i class="icon-menu2"></i> Connexion</button>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- /login wrapper -->
</body>
</html>