<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=nationsounds', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM compte WHERE id_compte = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>

<html>
<head>
<meta charset="UTF-8">
<title>Espace membre</title>
</head>

<body>
<link rel="stylesheet" href="css/style.css">
<div class="navbar navbar-dark bg-black shadow-sm">
      <div class="container d-flex justify-content">

        <button class="navbar-toggler" type="button" data-toggle="dropdown" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse bg-dark" id="navbarHeader">
          <div class="collapse dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li class="dropdown-item"><a href="programme.html" >Programmes </a></li>
              <li class="dropdown-item"><a href="carte.html">Carte</a></li>
              <li class="dropdown-item"><a href="billeterie.html" >Billeterie</a></li>
              <li class="dropdown-item"><a href="photos.html" >Photos</a></li>
              <li class="dropdown-item"><a href="informations.html" >Informations pratiques</a></li>
              <li class="dropdown-item"><a href="contact.html" >Contact</a></li>
              <li class="dropdown-item"><a href="partenariats.html" >Partenariat</a></li>
              <li class="dropdown-item"><a href="compte.html" >
                <span style="color : white"></span>
                <i class="fab fa-cog fa-5px"> </i>
                Profil</a> </li>
        </div>
        </div>
      <a href="index.html" > <img id="logo" src="images/logoemma.png" alt="Logo Nation Sounds" /> </a>
    </div>
  </div>

  <div align="center">
      <h2>Profil de <?php echo $userinfo['prenom']?> <?php echo $userinfo['nom'] ; ?></h2>
      <br /><br />
      Date d'inscription : <?php echo $userinfo['date_inscription']; ?>
      <br />
      E-mail : <?php echo $userinfo['email']; ?>
      <br />
      <?php
      if(isset($_SESSION['id_compte']) AND $userinfo['id_compte'] == $_SESSION['id_compte']) {
      }
      ?>
      <br />
      <!-- <a href="editionprofil.php">Editer mon profil</a> -->
      <a class="jeanpierre" href="deconnexion.php">Se déconnecter</a>
  </div>
   <?php
    }
    ?> 
    </body>
    </html>