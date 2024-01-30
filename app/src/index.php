<?php
require_once("bootstrap.php");

if($_GET["mode"] = "player"){
    $template["title"] = "Player";
    $template["file"] = "playerTempl.php";
}elseif($_GET["mode"] = "dm"){
    $template["title"] = "Player";
    $template["file"] = "dmTempl.php";
}else{
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["ERR_message"] = "visualization mode not set";
}