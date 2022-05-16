<?php
session_start();
require "connection.php";

function getArticleByID($id){
    $sqlRequest="SELECT * FROM posts WHERE id=".$id;

    return connecter()->query($sqlRequest)->fetch();  
}

/*
function getAllArticles(){
    $sqlRequest="SELECT * FROM posts";

    return connecter()->query($sqlRequest)->fetchAll();
}
*/

function getAllArticles(){
    $sqlRequest="SELECT * FROM posts, users WHERE posts.author_id=users.id";

    return connecter()->query($sqlRequest)->fetchAll();
}

function getAllArticlesOfAuthor($author){
    $sqlRequest="SELECT * FROM posts, users WHERE posts.author_id=users.id AND users.pseudo=\"".$author."\"";

    return connecter()->query($sqlRequest)->fetchAll();
}

function getAllArticlesByCategorie($categorie){
    $sqlRequest="SELECT * FROM posts INNER JOIN users ON posts.author_id=users.id INNER JOIN category ON category.id=posts.category_id
    WHERE category.name=\"".$categorie."\"";

return connecter()->query($sqlRequest)->fetchAll();
}

function newArticle($ArticleTitle,$ArticleContent,$ArticleImage,$categorie){
$statement=connecter()->prepare("INSERT INTO posts (id,title,content,author_id,date,image,category_id) VALUES (:id,:title,:content,:author_id,:date,:image,:category_id)");
    /*$statement->bind_param("ssssss",$id,$nom,$prenom,$adresse,$dateNaissance,$profession);*/
        $statement->execute([
        "id"=>"",
        "title"=>$_POST["articleTitle"],
        "content"=>$_POST["articleContent"],
        "author_id"=>getUserId($_SESSION["pseudo"]),
        "date"=>date("Y-m-d"),
        "image"=>"./images/".$_FILES["articleImage"]["name"],
        "category_id"=>getCategoriesID($_POST["articleCategory"])
        ]);
        /*
        $URI=$_SERVER["REQUEST_URI"];
        header("location:$URI");
        */
}

/*  ANOTHER FUNCTION TO ADD NEW ARTICLES. USES BINDPARAM
function addPost($title, $author, $image, $content){
    $db = dbconnect();
    $query = $db->prepare("INSERT INTO articles VALUES(null, :title, :author_id, null, :image, :content)");
    $query->bindParam(':title', $title);
    $query->bindParam(':author_id', $author);
    $query->bindParam(':image', $image);
    $query->bindParam(':content', $content);
    $query->execute();
}
*/

function addNewComz($pseudo,$content,$postID){
    $statement=connecter()->prepare("INSERT INTO comz (id,pseudo,content, post_id) VALUES (:id,:pseudo,:content,:post_id)");
    $statement->execute([
        "id"=>"",
        "pseudo"=>getUserId($pseudo),
        "content"=>$content,
        "post_id"=>$postID
    ]);
}


function getCategories(){
    $sqlRequest="SELECT name FROM category";
    return connecter()->query($sqlRequest)->fetchAll();
}

function getCategoriesID($category){
    $sqlRequest="SELECT `id` FROM `category` WHERE category.name=\"".$category."\"";
    $returnedRequest= connecter()->query($sqlRequest)->fetch();
    return $returnedRequest["id"];
}

function verifyUser($pseudo,$mdp){
    
    $sqlRequest="SELECT * FROM `users` WHERE `pseudo` = \"".$pseudo."\"";
    $userReturned=connecter()->query($sqlRequest)->fetch();
    return password_verify($mdp,$userReturned["mdp"]);

}

function getUserId($userPseudo){
    $sqlRequest="SELECT id FROM `users` WHERE `pseudo`=\"".$userPseudo."\"";
    $userId=connecter()->query($sqlRequest)->fetch();
    return $userId["id"];
}

function getAllComzByPostsId($postID){
    /*
    $sqlRequest="SELECT * FROM `comz`, `posts`, `users` 
    WHERE 
    `post_id`=\"".$postID."\" AND 
    `comz.post_id`=`posts.id` AND 
    `users.id`=`posts.author_id`";
    */
    $sqlRequest="SELECT users.pseudo AS pseudo, comz.content AS content, comz.id AS id FROM comz INNER JOIN posts ON comz.post_id=posts.id INNER JOIN users ON posts.author_id=users.id 
    WHERE posts.id=\"".$postID."\"";
    $comzRequested=connecter()->query($sqlRequest)->fetchAll();
    return $comzRequested;
}
/*
function authorNameToID($authorName){
    $sqlRequest="SELECT `id` FROM `users` WHERE `pseudo`= \"".$authorName."\"";
    $user
}
*/
?>

<?php

function comzOfArticle(){
    $comz=getAllComzByPostsId($_GET["id"]);
    ?>
    <div class="container">
        <div class="row">
<?php
    foreach($comz as $com){
        ?>
        <div class="card">
            <div class="card-header">
                <?php 
                echo $com["pseudo"];
                ?>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                <p><?php echo $com["content"] ?></p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
            </div>
        </div>
        <div class="pb-3"></div>
<?php
    }

?>
</div>
<?php 
} 
?>