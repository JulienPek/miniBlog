<?php 
session_start();
require "header.php";
?>

<div class="container">
<div class="text-center">
<h2>Make a new Article</h2>

<form enctype="multipart/form-data" method="post" action="./makeNewArticle.php">
    <label for="articleTitle">Article Title : </label><br>
<input type="text" id="articleTitle" name="articleTitle" placeholder="Article Title" class="form-control"><br><br>  

  <label for="articleContent">Article Content : </label><br>
  <textarea id="articleContent" name="articleContent" rows="8" cols="60" placeholder="Votre article ici...." class="form-control"></textarea><br><br>
  
<div class="text-start">

  <label for="articleCategory">Categorie : </label>
  <select id="articleCategory" name="articleCategory">
      <?php 
      $categories=getCategories();
      foreach ($categories as $categorie){
      ?>
    <option value=<?php echo $categorie["name"];?>><?php echo $categorie["name"];?></option>
    <?php 
    }
    ?>
  </select>
  <br><br>

  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
  <label for="articleImage">Image :</label>
  <input type="file" id="articleImage" name="articleImage" ><br><br>
  <input type="submit" value="Submit" class="btn btn-dark">
</form> 

<?php
//echo $_SESSION["pseudo"]."  ".$_SESSION["mdp"]."   ".$_POST["articleTitle"]."   ".$_POST["articleContent"]."   ".$_FILES["articleImage"]["name"]."   ".$_POST["articleCategory"];

    ?>
<?php 
if(isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"]) && isset($_SESSION["mdp"]) && !empty($_SESSION["mdp"]) && 
    isset($_POST["articleTitle"]) && !empty($_POST["articleTitle"]) && isset($_POST["articleContent"]) && !empty($_POST["articleContent"])  &&
    isset($_FILES["articleImage"]["name"]) && !empty($_FILES["articleImage"]["name"]) && isset($_POST["articleCategory"]) && !empty($_POST["articleCategory"])   ){

        
    newArticle($_POST["articleTitle"],$_POST["articleContent"],($_FILES["articleImage"]["name"]),$_POST["articleCategory"]);
    
    $uploaddir = 'images/';
    $uploadfile = $uploaddir.basename($_FILES['articleImage']['name']);
        //var_dump($uploaddir);
        //var_dump($uploadfile);
    echo '<pre>';
    if (move_uploaded_file($_FILES['articleImage']['tmp_name'], $uploadfile)) {
        echo "Le fichier est valide, et a été téléchargé
            avec succès. Voici plus d'informations :\n";
    } else {
        echo "Attaque potentielle par téléchargement de fichiers.
            Voici plus d'informations :\n";
    }

    echo 'Voici quelques informations de débogage :';
    print_r($_FILES);

    echo '</pre>';
    
}
?>
</div>
</div>
</div>





























<?php
require "footer.php";
?>