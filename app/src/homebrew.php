<?php
require_once("bootstrap.php");
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
}

require_once("template/base.php");