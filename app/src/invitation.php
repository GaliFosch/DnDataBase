<?php
require_once("bootstrap.php");

if(!empty($_GET["response"])){
    if($_GET["response"] == "accetta"){
        if(empty($_POST["campaign"]) || empty($_POST["pg"])){
            signalError("Mancano delle variabili!");
        }
        $sql = "INSERT INTO Eroe(IDPersonaggio, Id_campagna) VALUES (?,?)";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("ii", $_POST["pg"], $_POST["campaign"]);
        $stmnt->execute();
        $sql = "DELETE FROM Invito WHERE Nickname = ? AND Id_campagna = ?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("si", $_SESSION["user"]["Nickname"], $_POST["campaign"]);
        $stmnt->execute();
    }elseif($_GET["response"] == "rifiuto"){
        $sql = "DELETE FROM Invito WHERE Nickname = ? AND Id_campagna = ?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("si", $_SESSION["user"]["Nickname"], $_POST["campaign"]);
        $stmnt->execute();
    }else{
        signalError("Response non valido");
    }
    header("Location: index.php");
}

if(!empty($_POST["campaign"]) && !empty($_POST["player"])){
    $sql = "INSERT INTO Invito(Id_campagna, Nickname, DataDiInserimento) VALUES(?, ?, CURDATE())";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("is", $_POST["campaign"], $_POST["player"]);
    $stmnt->execute();
    header("Location: campaign.php?modalita=dm&Id_campagna=" . $_POST["campaign"]);
}

if(!empty($_GET["campaign"])){
    $sql = "SELECT * FROM Campagna WHERE id_campagna=?";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("i", $_GET["campaign"]);
    $stmnt->execute();
    $campaign=$stmnt->get_result()->fetch_assoc();
    if(!$campaign){
        signalError("Campagna inesistente");
    }
    if($campaign["Creatore"]!=$_SESSION["user"]["Nickname"]){
        $sql = "SELECT * FROM Invito WHERE id_campagna=?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("i", $_GET["campaign"]);
        $stmnt->execute();
        $invito=$stmnt->get_result()->fetch_assoc();
        if(!$invito){
            signalError("Invito inesistente!");
        }
        $template["title"] = "Invito per " . $campaign["Nome"];
        $template["file"] = "invAccTempl.php";
    }else{
        $template["title"] = "Crea Invito";
        $template["file"] = "invCreateTempl.php";
        $template["style"] = "invitation.css";
    }
}

require("template/base.php");