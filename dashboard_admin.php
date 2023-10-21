<?php
  session_start();
  include_once("./config/env.php");
  include_once("./config/database.php");
  $db = new DatabaseConnector();
  $Connexion = $db->getConnection();
  require_once("./traitements/electeur/crud_electeur.php");


?>
<html>
<head>
<title>PGGE</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-blue w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">PGGE</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="./images/photo_electeur.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Bienvenu, <strong> <?php echo $_SESSION['mail_administrateur']; ?></strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="./traitements/log_out.php" class="w3-bar-item w3-button"><i class="fa fa-power-off"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>TABLEAU DE BORD</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Fermer</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Fichier electoral</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Gestion Candidats</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Gestoin des élections</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Gestion des votes</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Resultats</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Rapports</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  Safety</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Historique</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Réglages</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<?php
  if(!empty($_SESSION['electeur_ajoute'])){
    echo '<div class="alert alert-success" role="alert">'.$_SESSION['electeur_ajoute'].'
    </div>';
    $_SESSION['electeur_ajoute'] = "";
  }

?>

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Mon Tableau de Bord</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Messages</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Candidats</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Bureaux de vote</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3> 
            <?php
              //var_dump($result_query_nombre_electeur);
               foreach($result_query_nombre_electeur as $nombre){ echo $nombre['count']; }
            ?>
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Electeurs</h4>
      </div>
    </div>
  </div>

  <div class="w3-panel">
    <div class="w3-container">
      <h2>Informations électeur</h2>
      <form class="form-horizontal" action="./traitements/electeur/add_electeur_via_admin.php" method="POST">
        <div class="form-group">
          <label class="control-label col-sm-2" for="nom_electeur">Nom:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name="nom_electeur" required>
          </div>
          <label class="control-label col-sm-1" for="prenom_electeur">Prenom:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prenom" name="prenom_electeur" required>
          </div> 
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="nom">Adresse:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="adresse" placeholder="Entrez votre adresse" name="adresse_electeur" required>
          </div>
          <label class="control-label col-sm-2" for="nom">Date. naissance:</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" id="naissance" placeholder="Date de naissance" name="date_naissance" required>
          </div> 
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2" for="nom">N° CNI:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="cni" placeholder="Entrez le n° de la CNI" name="num_cni" required>
          </div>
          <label class="control-label col-sm-1" for="nom">Adr mail:</label>
          <div class="col-sm-5">
            <input type="email" class="form-control" id="email" placeholder="Entrez votre mail" name="mail_electeur" required>
          </div> 
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Mot de passe:</label>
          <div class="col-sm-10">          
            <input type="password" class="form-control" id="pwd" placeholder="Enter mot de passe" name="mdp_electeur" required>
          </div>
        </div>
        
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" name="ajouter_electeur_via_admin">Ajouter</button>
          </div>
        </div>
      </form>
    </div>
    
  </div>
  <div class="w3-panel">
    <div class="w3-container">
      <h2>Liste des électeurs</h2>
      
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom(s)</th>
            <th>Email</th>
            <th>Modifier</th>
            <th>Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($result_query_liste_electeur as $electeur){
  
          ?>
          <tr>
            <td><?= $electeur['id_electeur'] ?></td>
            <td><?= $electeur['nom_electeur'] ?></td>
            <td><?= $electeur['mail_electeur'] ?></td>
            <td><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span><a href="">Modif.</a></button></td>
            <td><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Suppr..</button></td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>


    </div>
  </div>

  





  <hr>
  <hr>
  <hr>
  <hr> 
  <br>
  

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>Portail Gabonais de Gestion des Elections</h4>
    <p>Conçu par <a href="" target="_blank">Ing. Lénaic G. KOUMBA MOUDOUHI</a></p>
  </footer>

  <!-- End page content -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
