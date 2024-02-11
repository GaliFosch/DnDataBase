<?php
require_once("bootstrap.php");
if(!empty($_POST)){
    $sql = "SELECT * FROM Stato WHERE nome = ? AND Id_mondo = ? ";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("si", $_POST["nome"], $_GET["worldId"]);
    $stmnt->execute();
    if($stmnt->get_result()->num_rows!=0){
        $template["InsertionError"] = "Nome già presente nel mondo!";
    }else{
        $sql = "INSERT INTO Stato VALUES (?, ?, ?, ?, ?, ?)";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("isssss", $_GET["worldId"], $_POST["nome"], $_POST["desc"], $_POST["gov"], $_POST["ricchezza"], $_POST["architettura"]);
        $stmnt->execute();
        header("Location: ?name=" . $_POST["nome"] . "&worldId=" . $_GET["worldId"] ."#");
    }
}
if(!empty($_GET["name"]) && !empty($_GET["worldId"])){
    $sql = "SELECT Stato.*, Mondo.Nome as Mondo, Mondo.Creatore FROM Stato, Mondo WHERE Stato.Nome = ? AND Stato.Id_mondo = ? AND Stato.Id_mondo = Mondo.Id_mondo";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("si", $_GET["name"], $_GET["worldId"]);
    $stmnt->execute();
    $state = $stmnt->get_result()->fetch_assoc();
    if(!$state){
        signalError($_GET["name"] . " doesn't exist in world_id =" . $_GET["worldId"]);
    }
    $template["title"] = $state["Nome"];
    $template["file"] = "stateTempl.php";
}else if(!empty($_GET["worldId"])){
    $sql = "SELECT Creatore FROM Mondo WHERE Id_mondo = ? ";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("i", $_GET["worldId"]);
    $stmnt->execute();
    $result=$stmnt->get_result();
    if($result->num_rows==0){
        signalError("Mondo inesistente!");
    }
    if($result->fetch_assoc()["Creatore"]!=$_SESSION["user"]["Nickname"]){
        signalError("Non puoi modificare un mondo non tuo!");
    }
    $template["title"] = "Crea Stato";
    $template["file"] = "stateCreationTempl.php";
    $template["style"] = "creation.css";
}
require("template/base.php");