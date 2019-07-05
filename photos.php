<!-- ---
layout: examples
title: Album example
extra_css: "album.css"
--- -->

<html>
<head>
<title>Accueil</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
           try{
              $bdd = new PDO('mysql:host=localhost;dbname=nationsounds;charset=utf8', 'root', 'root');

                  if (isset($_POST["upload"])){
                   $id_compte = isset($_POST['id_compte']) ? $_POST['id_compte'] : NULL;
                   $img = isset($_POST['img']) ? $_POST['img'] : NULL;
                   $nom_img = isset($_POST['nom_img']) ? $_POST['nom_img'] : NULL;


                    $hello = $_FILES['img']['name'];
                    //stocker image
                    $target_dir = "upload/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);

                    // Select file type
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    // Valid file extensions
                    $extensions_arr = array("jpg","jpeg","png","gif");

                    // Check extension
                    // Check extension
                    if( in_array($imageFileType,$extensions_arr) ){

                        // Insert record
                        $insert_query = "INSERT INTO photos (id_compte, img, nom_img) values ('$id_compte', '$img', '$nom_img')";
                        $result = $bdd->query($insert_query);

                        // Upload file
                        move_uploaded_file($_FILES['img']['tmp_name'],$target_dir.$hello);

                     }

                  }
                }

          catch (Exception $e){
              die('Erreur : ' . $e->getMessage());
            }

?>

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
                Paramètres</a> </li>
        </div>
        </div>
      <a href="index.html" > <img id="logo" src="images/logoemma.png" alt="Logo Nation Sounds" /> </a>
      <!-- <nav class="navbar navbar-dark bg-black"> -->
        <!-- </nav> -->
    </div>
  </div>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/photos.css">



    <h1 class="head">Partage tes photos !</h1>

    <form action="photos.php" method="post" enctype="multipart/form-data">
      <input type="file" name="img" accept="" capture <?php $img ?> /><br/>
      <input name="nom_img" type="text" placeholder="Nommez votre photo" <?php $nom_img ?> /><br />
      <input type="submit" name="upload" value="Valider" />
    </form>

<p> Hop <?php /*echo $nom_img;*/?></p>


    <!--container where image will be loaded-->
    <div id="imageContainer" class="center">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/stadium.jpg">
    </div>

    <!--Controls for CSS filters via range input-->
    <div class="sliders">
      <form id="imageEditor">
        <p>
          <label for="gs">Tons de gris</label>
          <input id="gs" name="gs" type="range" min="0" max="100" value="0">
        </p>

        <p>
          <label for="blur">Flou</label>
          <input id="blur" name="blur" type="range" min="0" max="10" value="0">
        </p>

        <p>
          <label for="br">Exposition</label>
          <input id="br" name="br" type="range" min="0" max="200" value="100">
        </p>

        <p>
          <label for="ct">Contraste</label>
          <input id="ct" name="ct" type="range" min="0" max="200" value="100">
        </p>

        <p>
          <label for="huer">Teintes</label>
          <input id="huer" name="huer" type="range" min="0" max="360" value="0">
        </p>

        <p>
          <label for="opacity">Opacité</label>
          <input id="opacity" name="opacity" type="range" min="0" max="100" value="100">
        </p>

        <p>
          <label for="invert">Inverser les couleurs</label>
          <input id="invert" name="invert" type="range" min="0" max="100" value="0">
        </p>

        <p>
          <label for="saturate">Saturation</label>
          <input id="saturate" name="saturate" type="range" min="0" max="500" value="100">
        </p>

        <p>
          <label for="sepia">Sepia</label>
          <input id="sepia" name="sepia" type="range" min="0" max="100" value="0">
        </p>

        <input type="reset" form="imageEditor" id="reset" value="Remettre à zero" />

      </form>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/photos.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
