<?php
require_once("bootstrap.php");
if(!empty($_POST["nome"])&&!empty($_POST["desc"])){
    $_SESSION["createScene"] = $_POST;
    $action = "chooseLint";
    $template["title"] = "Crea Scena";
    $template["file"] = "sceneCreateTempl.php";
    $template["style"] = "creation.css";
}elseif(!empty($_POST["lint"])){
    if(!isset($_SESSION["createScene"])){
        signalError("sequence error");
    }
    $sql = "INSERT INTO Scena(Id_campagna, Data_Sessione, Nome, Descrizione, Id_luogo_d_interesse) VALUE(?,?,?,?,?)";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("isssi", $_SESSION["createScene"]["campagna"], 
                                $_SESSION["createScene"]["data"],
                                $_SESSION["createScene"]["nome"],
                                $_SESSION["createScene"]["desc"],
                                $_POST["lint"]);
    $stmnt->execute();
    header("Location: ?campagna=" . $_SESSION["createScene"]["campagna"] . "&data=" . $_SESSION["createScene"]["data"] . "&nome=" . $_SESSION["createScene"]["nome"]);
}
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
    $template["style"] = "character.css";
}elseif(!empty($_GET["campagna"])&&!empty($_GET["data"])){
    unset($_SESSION["createScene"]);
    $template["title"] = "Crea Scena";
    $template["file"] = "sceneCreateTempl.php";
    $template["style"] = "creation.css";
}

require("template/base.php");