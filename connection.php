<?php


function connecter(){
$serverName="localhost";
    $userName="root";
    $password="";

    
    try{
    $connexion=new PDO("mysql:host=$serverName;dbname=projetminiblog",$userName,$password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
 return $connexion;
}