<?php
require_once("bootstrap.php");
if(!empty($_POST)){
    if(!empty($_GET["id"]) && !empty($_GET["action"]) && $_GET["action"]=="modify"){
        $sql = "UPDATE Mondo
                SET Nome = ?, Ambientazione = ?, Descrizione = ?
                WHERE Id_mondo = ? AND Creatore = ?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("sssis", $_POST["nome"], $_POST["ambientazione"], $_POST["desc"], $_GET["id"], $_SESSION["user"]["Nickname"]);
        $stmnt->execute();
        if(!empty($_POST["img"])){
            $_POST["img"] = parseImg('img');
            $sql = "UPDATE Mondo
                    SET Immagine = ?
                    WHERE Id_mondo = ? AND Creatore = ?";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("sis", $_POST["img"], $_GET["id"], $_SESSION["user"]["Nickname"]);
            $stmnt->execute();
        }
        $id = $_GET["id"];
    }else{
        $sql = "INSERT INTO Mondo(Nome, Ambientazione, Immagine, Descrizione, Creatore) VALUES(?, ?, ?, ?, ?)";
        $_POST["img"] = parseImg('img');
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("sssss", $_POST["nome"], $_POST["ambientazione"], $_POST["img"], $_POST["desc"], $_SESSION["user"]["Nickname"]);
        $stmnt->execute();
        $id = $stmnt->insert_id;
    }
    header('Location: ?id=' . $id . '#');
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
    if(!empty($_GET["action"]) && $_GET["action"]=="modify"){
        if($world["Creatore"]!=$_SESSION["user"]["Nickname"]){
            signalError("Non puoi modificare un mondo non tuo");
        }
        $template["title"] = $world["Nome"];
        $template["file"] = "worldModTempl.php";
        $template["style"] = "creation.css";
    }else{
        $template["title"] = $world["Nome"];
        $template["file"] = "worldTempl.php";
        $template["style"] = "character.css";
    }
}else{
    $template["title"] = "Crea Mondo";
    $template["file"] = "worldCreationTempl.php";
    $template["style"] = "creation.css";
}


require("template/base.php");
