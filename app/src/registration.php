<?php
require_once("bootstrap.php");
$template["title"] = "Registration";
$template["style"] = "login.css";
$template["file"] = "registrationTemplate.php";

if(!empty($_POST["name"])
&& !empty($_POST["surname"])
&& !empty($_POST["birthdate"])
&& !empty($_POST["nickname"])
&& !empty($_POST["password"])){
    if(!$db->isPresent($_POST["nickname"])){
        $_POST["img"] = parseImg('img');
        $sql = "INSERT INTO giocatore(nome,cognome,data_nascita,nickname,password,immagine) VALUES (?,?,?,?,?,?)";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("ssssss", $_POST["name"], $_POST["surname"], $_POST["birthdate"], $_POST["nickname"], $_POST["password"], $_POST["img"]);
        $stmnt->execute();
        $template["title"] = "Congratulazioni";
        $template["file"] = "regResTempl.php";
    }else{
        $template["err_REG"] = "Nickname già preso!";
    }
}

require("template/base.php");