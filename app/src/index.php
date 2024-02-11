<?php
require_once("bootstrap.php");
if(!empty($_GET["mode"])){
    $_SESSION["mode"] = $_GET["mode"];
}

if(!isset($_SESSION["user"])){
    header("Location: loginPage.php");
}elseif($_SESSION["mode"] == "player"){
    $template["title"] = "Player";
    $template["file"] = "playerTempl.php";
    $template["style"] = "player.css";
}elseif($_SESSION["mode"] == "dm"){
    $template["title"] = "Dungeon Master";
    $template["file"] = "dmTempl.php";
    $template["style"] = "player.css";
}else{
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["ERR_message"] = "visualization mode not set";
}

require_once("template/base.php");