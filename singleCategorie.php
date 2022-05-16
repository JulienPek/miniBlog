<?php 
session_start();
require "header.php";
?>


<?php

if(isset($_GET["category"]) && !empty($_GET["category"])){

    $articles=getAllArticlesByCategorie($_GET["category"]);

}

?>
<div class="container">
    <div class="row">
<?php 
foreach ($articles as $articleNeeded){
?>
<div class="col-4">
<div class="card" style="width: 18rem;">
  <img src=<?php echo $articleNeeded["image"]; ?> class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $articleNeeded["title"]; ?></h5>
    <p class="card-text"><?php echo substr($articleNeeded["content"],0,100)."...."; ?></p>
    <a href=<?php echo "http://localhost:8080/miniBlogProjet/singleArticle.php?id=".$articleNeeded["id"];?> class="btn btn-primary">Read More</a>
    <a href=<?php echo "http://localhost:8080/miniBlogProjet/allArticlesOfAuthor.php?author=".$articleNeeded["pseudo"];?>>Article by <?php echo $articleNeeded["pseudo"]?></a>
  </div>
</div>
</div>
<?php
}
?>

</div>
</div>





























<?php
require "footer.php"
?>