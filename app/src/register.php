<?php
require_once("bootstrap.php");
$template["title"] = "Registration";
$template["file"] = "registerTemplate.php";
require("template/base.php");

if(!empty($_GET["name"]) 
    && !empty($_GET["surname"])
    && !empty($_GET["birthdate"])
    && !empty($_GET["nickname"])
    && !empty($_GET["password"])){
    $sql = "INSERT INTO giocatore(nome,cognome,data_nascita,nickname,password) VALUES (?,?,?,?,?)";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("sssss", $_GET["name"], $_GET["surname"], $_GET["birthdate"], $_GET["nickname"], $_GET["password"]);
    $stmnt->execute();
}