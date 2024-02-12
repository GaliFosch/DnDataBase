<?php
require_once("bootstrap.php");

if(!empty($_POST["nome"]) && !empty($_POST["desc"]) ){
    $sql = "SELECT * FROM Classe WHERE Nome = ?";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("s", $_POST["nome"]);
    $stmnt->execute();
    if($stmnt->get_result()->num_rows>0){
        $template["ins_Err"] = "Nome già presente nel database";
    }else{
        $sql = "INSERT INTO Classe(Nome, Descrizione, Creatore) VALUES(?,?,?)";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("sss", $_POST["nome"], $_POST["desc"], $_SESSION["user"]["Nickname"]);
        $stmnt->execute();
        header("Location: class.php?id=" . $_POST["nome"] . "&action=show");
    }
}

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
        case "create":
            $template["title"] = "Crea Classe";
            $template["file"] = "classCreateTempl.php";
        break;
        default:
            signalError("action not recognized");
        break;
    }
}

require("template/base.php");