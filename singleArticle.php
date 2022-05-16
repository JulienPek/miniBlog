<?php 
session_start();
require "header.php";

if(isset($_GET["id"]) && !empty($_GET["id"])){
   $articleNeeded=getArticleByID($_GET["id"]);
}

?>
<div class="card mb-3">
<div class="row g-0 pb-5">
  <h1 class="card-title text-center"><?php echo $articleNeeded["title"]; ?></h1>
</div>
  <div class="row g-0">
    <div class="col-md-3">
      <img src=<?php echo $articleNeeded["image"]; ?> class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-9">
      <div class="card-body">
        
        <p class="card-text"><?php echo $articleNeeded["content"]; ?></p>
      </div>
    </div>
  </div>
</div>
</div>




<?php
if(isset($_GET["id"]) && !empty($_GET["id"])){
  ?>
  <h2 class="text-center pb-5 pt-5">Commentaires :</h2>
  <?php
    comzOfArticle();
}
?>




<?php 
if(isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"]) && isset($_GET["id"]) && !empty($_GET["id"])){
?>
<?php $urlAction ="./singleArticle.php?id=".$_GET["id"]; ?>
<form method="post" action=<?php echo $urlAction; ?>>
  <div class="form-group">
    <label for="comzContent">Laissez un commentaire : </label>
    <textarea class="form-control" id="comzContent" name="comzContent" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" value="submit" id="addComzBtn">Submit</button>
</form>

<?php 
}
?>

<?php 
/*
var_dump($_POST);
echo $_POST["comzContent"]."<br>";
echo $_SESSION["pseudo"]."<br>";
echo $_GET["id"]."<br>";
*/
echo $_SESSION["pseudo"]."<br>";
?> 

<?php
if(isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"]) && isset($_GET["id"]) && !empty($_GET["id"]) && 
    isset($_POST["comzContent"]) && !empty($_POST["comzContent"])) {

      echo "Comz Ajouté";
      addNewComz($_SESSION["pseudo"],$_POST["comzContent"],$_GET["id"]);
}


?>




<?php require "footer.php";?> 