<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=nationsounds', 'root', '');

$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(isset($_POST['formconnexion'])) {
   $emailconnect = $_POST['emailconnect'];
   $passconnect = $_POST['passconnect']; 

   if(!empty($emailconnect) && !empty($passconnect)) {
      $requser = $bdd->prepare("SELECT * FROM compte WHERE email = :mail AND pass = :pass");
      $requser->bindParam(':mail', $emailconnect);
      $requser->bindParam(':pass', $passconnect);
      $requser->execute();
      $userexist = $requser->rowCount();
      
      if($userexist >= 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id_compte'] = $userinfo['id_compte'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['prenom'] = $userinfo['prenom'];
         $_SESSION['email'] = $userinfo['email'];
         $_SESSION['date_inscription'] = $userinfo['date_inscription'];
         header("Location: profil.php?id=".$_SESSION['id_compte']);
  
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } 
   else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html>
<head>
<title>Accueil</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
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

</header>
<body>
<link rel="stylesheet" href="css/style.css">

<div align="center">
<h2>Connexion</h2>
<br /><br />
	<form method="POST" action="">
	<input type="email" name="emailconnect" placeholder="E-mail"  />
	<input type="password" name="passconnect" placeholder="Mot de passe" />
<br /><br />
  <input type="submit" name="formconnexion" value="Se connecter !" />
  
	</form>

<?php
if(isset($erreur)) {
echo '<font color="red">'.$erreur."</font>";
}
?>

</body>
</html>
