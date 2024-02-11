<?php
    require_once("bootstrap.php");

    if(!empty($_GET["IDPersonaggio"])){
        $sql = "SELECT *
                FROM Personaggio
                JOIN Pg
                ON Personaggio.IDPersonaggio = Pg.IDPersonaggio
                WHERE Pg.IDPersonaggio = ?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("i", $_GET["IDPersonaggio"]);
        $stmnt->execute();
        $result = $stmnt->get_result();
        $character = $result->fetch_assoc();
        if(!$character){
            signalError("Il personaggio non esiste");
        }
        $template["title"] = "Character";
        $template["file"] = "charTempl.php";
        $template["style"] = "character.css";
    }

    require_once("template/base.php");
