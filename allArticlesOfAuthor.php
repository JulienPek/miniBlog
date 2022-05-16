<?php 
session_start();
require "header.php";


   $allArticles=getAllArticlesOfAuthor($_GET["author"]);


?>
 
<div class="container">
    <div class="row">
<?php 
foreach ($allArticles as $article){
?>
<div class="col-4">
<div class="card" style="width: 18rem;">
  <img src=<?php echo $article["image"]; ?> class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $article["title"]; ?></h5>
    <p class="card-text"><?php echo substr($article["content"],0,100)."...."; ?></p>
    <a href=<?php echo "http://localhost:8080/miniBlogProjet/singleArticle.php?id=".$article["id"];?> class="btn btn-primary">Read More</a>
    <a href=<?php echo "http://localhost:8080/miniBlogProjet/allArticlesOfAuthor.php?author=".$article["pseudo"];?>>Article by <?php echo $article["pseudo"]?></a>
  </div>
</div>
</div>
<?php
}
?>
</div>
</div>

<div class="row">

<?php 
if(isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"]) && isset($_SESSION["mdp"]) && !empty($_SESSION["mdp"]) ){
?>
<a href="./makeNewArticle.php">Make a new article ?</a>

<?php
} 
?>
</div>
<?php require "footer.php"?> 