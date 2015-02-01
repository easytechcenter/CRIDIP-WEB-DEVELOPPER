<?php 
//ERREUR LOGIN
define("E8777", "
			<div class='alert alert-block alert-danger fade in block-inner'>
              <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
              <h6><i class='icon-warning'></i> ERREUR 8777</h6>
              <hr>
              <p>Une erreur à été rencontrer lors de la vérification de votre nom d'utilisateur ou de votre mot de passe.<br>
              Veuillez réessayer.
              </p>
            </div>");
define("E8776", "
			<div class='alert alert-block alert-danger fade in block-inner'>
              <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
              <h6><i class='icon-warning'></i> ERREUR 8777</h6>
              <hr>
              <p>Plusieurs nom d'utilisateur sont entrée dans la base de donnée avec le même identifiant.<br>
              Veuillez contactez l'administrateur
              </p>
              <div class='text-left'>
              	<a href='".SITE."".DOSSIER."".MODULE."/intra_support/new_request.php' class='btn btn-primary'>
              		<i class='icon-link'></i> Contactez l'administrateur
              	</a> 
              </div>
            </div>");
define("E8778", "
			<div class='alert alert-block alert-danger fade in block-inner'>
              <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
              <h6><i class='icon-warning'></i> ERREUR 8778</h6>
              <hr>
              <p>Au moins un des champs est vide.<br>
              Veuillez le compléter.
              </p>
            </div>");
 ?>