<?php
    require_once("bootstrap.php");

    if(!empty($_POST)){
        $sql = "SELECT * 
                FROM Sessione 
                WHERE Data_Sessione = ? 
                AND Id_campagna = ? ";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("si", $_POST["date"], $_GET["Id_campagna"]);
        $stmnt->execute();
        if($stmnt->get_result()->num_rows!=0){
            $template["InsertionError"] = "Sessione già presente in questa data!";
        }else{
            $sql = "INSERT INTO Sessione VALUES (?, ?, ?)";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("iss", $_GET["Id_campagna"], $_POST["date"], $_POST["desc"]);
            $stmnt->execute();
            header("Location: ?date=" . $_POST["date"] . "&Id_campagna=" . $_GET["Id_campagna"] ."#");
        }
    }

    if(!empty($_GET["date"]) && !empty($_GET["Id_campagna"])){ //se esiste la sessione
        $sql = "SELECT *
                FROM Sessione
                WHERE Data_Sessione = ? AND Id_campagna = ?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("ss", $_GET["date"], $_GET["Id_campagna"]);
        $stmnt->execute();
        $session = $stmnt->get_result()->fetch_assoc();
        if(!$session){
            signalError("In data" . $_GET["date"] . " non è stata inserita alcuna sessione per la campagna con id=" . $_GET["Id_campagna"]);
        }
        $template["title"] = $session["Data_Sessione"];
        $template["file"] = "sessionTempl.php";
        $template["style"] = "character.css";
    }else if(!empty($_GET["Id_campagna"])){ //se la sessione è ancora da creare
        $sql = "SELECT Creatore FROM Campagna WHERE Id_campagna = ? ";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("i", $_GET["Id_campagna"]);
        $stmnt->execute();
        $result=$stmnt->get_result();
        if($result->num_rows==0){
            signalError("Campagna inesistente!");
        }
        if($result->fetch_assoc()["Creatore"]!=$_SESSION["user"]["Nickname"]){
            signalError("Non puoi modificare una campagna non tuo!");
        }
        $template["title"] = "Crea Sessione";
        $template["file"] = "sessionCreateTempl.php";
        $template["style"] = "creation.css";
    }

require_once("template/base.php");
