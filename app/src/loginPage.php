<?php
require_once("bootstrap.php");
if(!empty($_SESSION["user"])){
    unset($_SESSION["user"]);
}
$template["title"] = "Login";
$template["style"] = "login.css";
$template["file"] = "loginTemplate.php";

if(!empty($_POST["nickname"]) && !empty($_POST["password"])){
    $oggetto = $db->getAccount($_POST["nickname"], $_POST["password"]);
    if(!$oggetto){
        $template["log_ERR"] = "Combinazione Nickname e Password errata";
    }else{
        $_SESSION["user"] = $oggetto;
        $template["title"]  = "Select";
        $template["file"]  = "selectionTemplate.php";
    }
}

require("template/base.php");
