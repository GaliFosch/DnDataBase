<?php
require_once("bootstrap.php");
$template["title"] = "Registration";
$template["style"] = "login.css";
$template["file"] = "registrationTemplate.php";

if(!empty($_GET["name"])
&& !empty($_GET["surname"])
&& !empty($_GET["birthdate"])
&& !empty($_GET["nickname"])
&& !empty($_GET["password"])){
    if(!$db->isPresent($_GET["nickname"])){
        $sql = "INSERT INTO giocatore(nome,cognome,data_nascita,nickname,password) VALUES (?,?,?,?,?)";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("sssss", $_GET["name"], $_GET["surname"], $_GET["birthdate"], $_GET["nickname"], $_GET["password"]);
        $stmnt->execute();
        $template["title"] = "Congratulazioni";
        $template["file"] = "regResTempl.php";
    }else{
        $template["err_REG"] = "Nickname già preso!";
    }
}

require("template/base.php");