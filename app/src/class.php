<?php
require_once("bootstrap.php");

if(!empty($_GET["action"])){
    switch($_GET["action"]){
        case "list":
            $template["title"] = "Lista Classi";
            $template["file"] = "classListTempl.php";
        break;
    }
}

require("template/base.php");