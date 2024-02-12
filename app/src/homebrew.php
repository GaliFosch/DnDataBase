<?php
require_once("bootstrap.php");
if(empty($_GET["type"]) || empty($_GET["action"])){
    signalError("mancano delle informazioni");
}
if($_GET["action"] == "create"){
    switch($_GET["type"]){
        case "specie":
            if(!empty($_GET["id"])){
                $_SESSION["Hid"] = $_GET["id"];
            }
            $template["title"] = "Homebrew Specie";
            $template["file"] = "homebrewSpecieTempl.php";
            $template["style"] = "creation.css";
        break;
        case "addTrait":
            $template["title"] = "AddTrait";
            $template["file"] = "addTraitTempl.php";
            $template["style"] = "trait.css";
        break;
        default:
        signalError("type non riconosciuto");
        break;
    }
}elseif($_GET["action"] == "show"){
    unset($_SESSION["Hid"]);
    switch($_GET["type"]){
        case "specie":
            if(!empty($_GET["id"])){
                $_SESSION["Hid"] = $_GET["id"];
            }
            $template["title"] = "Homebrew Specie";
            $template["table"] = "specie";
            $template["idname"] = "IdSpecie"; 
            $template["columns"] = ["Nome"];
            $template["file"] = "homebrewSpecieShowTempl.php";
            $template["style"] = "list.css";
        break;
        default:
        signalError("type non riconosciuto");
        break;
    }
}

require_once("template/base.php");