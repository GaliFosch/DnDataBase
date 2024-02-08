<?php
require_once("bootstrap.php");

if(empty($_GET["listName"])){
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["ERR_message"] = "List type not selected";
}else{
    $template["file"] = "listTempl.php";
    switch($_GET["listName"]){
        case "specie":
            $template["title"] = "Specie";
            $template["table"] = "specie";
            $template["idname"] = "IdSpecie"; 
            $template["columns"] = ["Nome", "Creatore"];
            $template["style"] = "list.css";
            break;
        case "oggetti":
            $template["title"] = "Oggetti";
            $template["table"] = "oggetto";
            $template["idname"] = "Id_oggetto"; 
            $template["columns"] = ["Nome", "Costo", "Peso", "Categoria", "Creatore"];
            $template["style"] = "list.css";
            break;
        default:
            $template["title"] = "ERROR";
            $template["file"] = "errorTempl.php";
            $template["ERR_message"] = "List type does not exist";
            break;
    }
}

require("template/base.php");