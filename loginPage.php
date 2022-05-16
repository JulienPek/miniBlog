<?php 
session_start();
require "header.php";
?>

<div class="container ">
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6 backgroundImageLogin " >
<h2>Login</h2>

<form method="post" action="loginPage.php">
  <label for="pseudo">Pseudo :</label><br>
  <input type="text" id="pseudo" name="pseudo" placeholder="John85" ><br>
  <label for="mdp">password:</label><br>
  <input type="text" id="mdp" name="mdp" placeholder="password"><br><br>
  <input type="submit" value="Submit" class="btn btn-lg btn-dark">
  <input type="reset" value="Reset" class="btn btn-lg btn-dark">
</form> 
</div>
<div class="col-3"></div>
</div>
</div>


<?php 
if( isset($_POST["pseudo"]) && !empty($_POST["pseudo"]) && isset($_POST["mdp"]) && !empty($_POST["mdp"]) ){
    if(verifyUser($_POST["pseudo"],$_POST["mdp"])) {
        $_SESSION["pseudo"]=$_POST["pseudo"];
        $_SESSION["mdp"]=$_POST["mdp"];

        header("Location: ./AllArticles.php");
        //die();
        
    }
}
?>












<?php 
require "footer.php";
?>