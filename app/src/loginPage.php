<?php
require_once("bootstrap.php");
$template["title"] = "Login";
$template["style"] = "login.css";
$template["file"] = "loginTemplate.php";

if(!empty($_GET["nickname"]) && !empty($_GET["password"])){
    $oggetto = $db->getAccount($_GET["nickname"], $_GET["password"]);
    if(!$oggetto){
        $template["log_ERR"] = "Combinazione Nickname e Password errata";
    }else{
        $_SESSION["user"] = $oggetto;
        $template["title"]  = "Select";
        $template["file"]  = "selectionTemplate.php";
    }
}

require("template/base.php");
