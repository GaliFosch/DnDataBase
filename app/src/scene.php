<?php
require_once("bootstrap.php");

if(!empty($_GET["campagna"])&&!empty($_GET["data"])&&!empty($_GET["nome"])){
    $sql = "SELECT * FROM Scena WHERE Id_campagna = ? AND Data_Sessione = ? AND Nome = ?";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("iss",$_GET["campagna"],$_GET["data"],$_GET["nome"]);
    $stmnt->execute();
    $scene = $stmnt->get_result()->fetch_assoc();
    if(!$scene){
        signalError("Scena non presente nel database");
    }
    $template["title"] = $scene["Nome"];
    $template["file"] = "sceneTempl.php";
}