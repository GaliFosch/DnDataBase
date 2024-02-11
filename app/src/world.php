<?php
require_once("bootstrap.php");
if(!empty($_POST)){
    $sql = "INSERT INTO Mondo(Nome, Ambientazione, Descrizione, Creatore) VALUES(?, ?, ?, ?)";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("ssss", $_POST["nome"], $_POST["ambientazione"], $_POST["desc"], $_SESSION["user"]["Nickname"]);
    $stmnt->execute();
    header('Location: ?id=' . $stmnt->insert_id . '#');
}
if(!empty($_GET["id"])){
    $sql = "SELECT * FROM Mondo WHERE Id_mondo = ?";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("i", $_GET["id"]);
    $stmnt->execute();
    $world = $stmnt->get_result()->fetch_assoc();
    if(!$world){
        signalError("Id doesn't exist");
    }
    $template["title"] = $world["Nome"];
    $template["file"] = "worldTempl.php";
}else{
    $template["title"] = "Crea Mondo";
    $template["file"] = "worldCreationTempl.php";
}
$template["style"] = "world.css";

require("template/base.php");
