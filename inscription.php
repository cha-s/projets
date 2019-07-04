<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=nationsounds;charset=utf8', 'root', '');
    }
    catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(isset($_POST['form_inscription']))
{

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date_inscription = date('Y-m-d');
        $email = $_POST['email'];
        $pass = $_POST['pass']; 
        
    if(!empty($_POST['email']) && !empty($_POST['pass']))
    {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $insertmbr = $bdd->prepare("INSERT INTO compte (nom, prenom, date_inscription, email, pass) VALUES (? , ? , ? , ? , ?)");
                $insertmbr->execute(array($nom, $prenom, $date_inscription, $email, $pass));
                header('Location: programme.html');
                }
         else{
            $erreur = "Votre adresse e-mail n'est pas valide";
        }
    // } 
    // else{
    //     $erreur = "Votre pseudo ne doit pas dépasser 50 caractères ";
    // }
}
else{
    $erreur= "Tous les champs doivent être completés";
}
}
?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
<title>Inscription</title>
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
              <li class="dropdown-item"><a href="compte.html">
                <span style="color : white"></span>
                <i class="fab fa-cog fa-5px"> </i>
                Profil</a> </li>
        </div>
        </div>
      <a href="index.html" > <img id="logo" src="images/logoemma.png" alt="Logo Nation Sounds" /> </a>
    </div>
  </div>
 
<div align="center">
    <h1> Inscription </h1>

<form method ="POST" action="">
<table> 
    <th>
   <tr>  
    <td  align="right">
    <label for="nom"> Nom </label>
    </td>
        
    <td> 
    <input type="nom" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)) { } ?>"/>
    </td>
    </tr>
    <tr>
        <td align="right"> 
        <label for="prenom"> Prénom </label>
        </td>
        
        <td> 
        <input type="prenom" placeholder="Votre prénom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { } ?>"/>
        </td>
    </tr>
    <!-- <tr>
        <td align="right"> 
        <label for="pseudo"> Pseudo </label>
        </td>
        
        <td> 
        <input type="pseudo" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"/>
        </td>
    </tr> -->
    <tr>
        <td align="right"> 
        <label for="email"> E-mail </label>
        </td>
        <td> 
        <input type="email" placeholder="Votre e-mail" id="email" name="email" value="<?php if(isset($email))  { echo $email; } ?>"/>
        </td>
    </tr>
    <tr>
        <td align="right"> 
        <label for="pass">Mot de passe </label>
        </td>
        <td> 
        <input type="password" placeholder="Votre mot de passe" id ="pass" name="pass" value="<?php if(isset($pass)) { } ?>"/>
        </td>
    </tr>
    <tr>
        <td align="right"> 
        <label for="pass2">Confimation du mot de passe </label>
        </td>
        <td> 
        <input type="password" placeholder="Votre mot de passe" id="pass2" name="pass" value="<?php if(isset($pass)) { } ?>"/>
        </td>
    </tr>
    <tr>
        <td></td>
        <td align="center">
            <br/>
			<input type="submit" name="form_inscription" value="Je m'inscris" onclick="a.href='programme.html';"/>
			
        </td>
    </tr>
</th>
    </table>
    </form>
</div>
<?php
    if(isset($erreur))
    {
        echo '<font color="red">'.$erreur."</font>";
    }
?> 


</body>
</html>