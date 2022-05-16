<?php require "header.php"; ?>

<body>
    <h2>Subscribe</h2>

<form method="post" action="blog.php">
  <label for="pseudo">Pseudo :</label><br>
  <input type="text" id="pseudo" name="pseudo" placeholder="John85"><br>
  <label for="mdp">password:</label><br>
  <input type="text" id="mdp" name="mdp" placeholder="password"><br>
  <label for="email">email:</label><br>
  <input type="email" id="email" name="email" placeholder="john85@gmail.com"><br><br>
  <input type="submit" value="Submit">
  <input type="reset" value="Reset">
</form> 

<?php 
if(isset($_POST["pseudo"]) && isset($_POST["mdp"]) && !empty($_POST["mdp"]) && !empty($_POST["pseudo"])){

    require "connection.php";

    $statement=$connexion->prepare("INSERT INTO users (id,pseudo,mdp,email) VALUES (:id,:pseudo,:mdp,:email)");
    /*$statement->bind_param("ssssss",$id,$nom,$prenom,$adresse,$dateNaissance,$profession);*/
        $statement->execute([
        "id"=>"",
        "pseudo"=>$_POST["pseudo"],
        "mdp"=>password_hash($_POST["mdp"],PASSWORD_DEFAULT),
        "email"=>$_POST["email"]
        ]);
        /*$URI=$_SERVER["REQUEST_URI"];
        header("location:$URI");*/
    
}
?>





<?php require "footer.php"; ?>