<?php
require_once("bootstrap.php");

if(empty($_GET["listName"])){
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["ERR_message"] = "List type not selected";
}else{
    switch($_GET["listName"]){
        case "specie":
            $template["title"] = "Specie";
            $template["file"] = "listTempl.php";
            $template["idname"] = "IdSpecie"; 
            $template["columns"] = ["Nome", "Creatore"];
            break;
        default:
            $template["title"] = "ERROR";
            $template["file"] = "errorTempl.php";
            $template["ERR_message"] = "List type does not exist";
            break;
    }
}

require("template/base.php");