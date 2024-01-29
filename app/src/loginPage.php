<?php
require_once("bootstrap.php");
$template["title"] = "Login";
$template["file"] = "loginTemplate.php";

if(!empty($_GET["nickname"]) && !empty($_GET["password"])){
    $result = $db->getAccount($_GET["nickname"], $_GET["password"]);
    if(!$result){
        $template["log error"] = "Combinazione Nickname e Password errata";
    }else{
        $_SESSION["user"] = $result;
        $template["title"]  = "Select";
        $template["file"]  = "selectionTemplate.php";
    }
}

require("template/base.php");
