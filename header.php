<?php
require "functions.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Jeux Videos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <script src="jquery.js"></script>
        <script src="script.js"></script>

        <link rel="stylesheet" href="stylesProjet.css">


</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark col-12">
  <a class="navbar-brand col-1" href="http://localhost:8080/miniBlogProjet/allArticles.php">Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse col-7" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="http://localhost:8080/miniBlogProjet/loginPage.php">Se Connecter</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost:8080/miniBlogProjet/makeNewArticle.php">Ecrire un Article</a>
      </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Catégories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
            $categories=getCategories();
            foreach($categories as $categorie){
              echo "<li><a class=\"dropdown-item\" href=\"singleCategorie.php?category=".$categorie["name"]."\">".$categorie["name"]."</a></li>";
            }
            ?>
          <!--
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li> 
          -->
          </ul>
        </li>
    </ul>
  </div>
  <?php 
  if(isset($_SESSION["pseudo"]) && !empty(["pseudo"])){
  ?>
    <div class="container col-4 d-flex flex-row-reverse"> 
        
            <div class="row">
            <div class="col-12"><p style="color:white;" ><a href="http://localhost:8080/miniBlogProjet/allArticles.php" <?php //session_destroy(); ?>>Se déconnecter</a> </p>
                </div>    
            
            </div>
            <div class="row">
            <div class="col-12"><p style="color:white;" >Bienvenue <?php echo $_SESSION["pseudo"]?></p>
                </div>
            </div>    
       
    </div>
<?php 
    }
    else{ ?>
        <div class="container col-4 d-flex flex-row-reverse"> 
            <div class="row">
            <div class="col-12"><p style="color:white;" ></p>
                </div>    
            
            </div>
            <div class="row">
            <div class="col-12"><p style="color:white;" ><a href="http://localhost:8080/miniBlogProjet/loginPage.php"> Se Connecter </a></p>
                </div>
            </div>    
        </div>
     <?php 
    }
?>

</nav>