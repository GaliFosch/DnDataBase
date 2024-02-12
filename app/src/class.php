<?php
require_once("bootstrap.php");

if(!empty($_GET["action"])){
    switch($_GET["action"]){
        case "list":
            $template["title"] = "Lista Classi";
            $template["file"] = "classListTempl.php";
        break;
        case "show":
            if(empty($_GET["id"])){
                signalError("id not selected");
            }
            $sql = "SELECT * FROM Classe WHERE Nome = ?";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("s", $_GET["id"]);
            $stmnt->execute();
            $class = $stmnt->get_result()->fetch_assoc();
            if(!$class){
                signalError("Id not present in the database");
            }
            $template["title"] = $class["Nome"];
            $template["file"] = "classTempl.php";
        break;
        default:
            signalError("action not recognized");
        break;
    }
}

require("template/base.php");