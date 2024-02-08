<?php
require_once("bootstrap.php");
if(!empty($_GET["mode"])){
    $template["mode"] = $_GET["mode"];
}

if(!isset($_SESSION["user"])){
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["ERR_message"] = "user not logged in";
}elseif($template["mode"] == "player"){
    $template["title"] = "Player";
    $template["file"] = "playerTempl.php";
    $template["style"] = "player.css";
}elseif($template["mode"] == "dm"){
    $template["title"] = "Dungeon Master";
    $template["file"] = "dmTempl.php";
    $template["style"] = "player.css";
}else{
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["ERR_message"] = "visualization mode not set";
}

require_once("template/base.php");