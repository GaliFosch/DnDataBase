<?php
require_once("bootstrap.php");
$template["title"] = "Login";
$template["style"] = "login.css";
$template["file"] = "loginTemplate.php";

if(empty($_GET["listName"])){
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["ERR_message"] = "List type not selected";
}else{
    switch($_GET["listName"]){
        case "specie":
            break;
        default:
            $template["title"] = "ERROR";
            $template["file"] = "errorTempl.php";
            $template["ERR_message"] = "List type does not exist";
            break;
    }
}

require("template/listTempl.php");