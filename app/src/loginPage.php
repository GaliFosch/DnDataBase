<?php 
if(isset($_SESSION["user"])){
    header("Location: http://localhost/DnDataBase/app/src/Hello.html");
}
require_once("bootstrap.php");
$template["title"] = "Login";
$template["file"] = "loginTemplate.php";
require("template/base.php");

if(!empty($_GET["nickname"]) && !empty($_GET["password"])){
    $result = $db->getAccount($_GET["nickname"], $_GET["password"]);
    if(!$result){
        $template["log error"] = "Combinazione Nickname e Password errata";
    }else{
        $_SESSION["user"] = $result;
    }
}

