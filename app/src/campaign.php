<?php
    require_once("bootstrap.php");

    if(!empty($_GET['Id_campagna'])){
        $idSelected = filter_var($_GET['Id_campagna'], FILTER_SANITIZE_NUMBER_INT);
        $sql = "SELECT Campagna.Nome AS CampagnaNome, 
                Campagna.Sinossi AS Sinossi, Campagna.Immagine AS Immagine, 
                Campagna.Creatore AS CampagnaCreatore, Mondo.Nome AS MondoNome, 
                Mondo.Ambientazione AS Ambientazione, Mondo.Descrizione AS Descrizione, 
                Mondo.Creatore AS MondoCreatore, Mondo.Id_mondo AS Id_Mondo
                FROM Campagna
                JOIN Mondo
                ON Campagna.Id_mondo = Mondo.Id_mondo
                WHERE Campagna.Id_campagna = ?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("i", $idSelected);
        $stmnt->execute();
        $result = $stmnt->get_result();
        $row = $result->fetch_assoc();
        if(!$row){
            signalError("Campagna inesistente");
        }
        $template["title"] = $row["CampagnaNome"];
        $template["file"] = "campTempl.php";
        $template["style"] = "character.css";
    }else{
        $template["title"] = "CampaignCreation";
        $template["file"] = "campCreateTempl.php";
        $template["style"] = "creation.css";

        if(!empty($_POST["nome"])
        && !empty($_POST["mondo"])
        && !empty($_POST["sinossi"])){
            $_POST["img"] = parseImg('img');
            $sql = "INSERT INTO campagna(Immagine,Nome,Id_mondo,Sinossi, Creatore) VALUES (?,?,?,?,?)";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("ssiss", $_POST["img"], $_POST["nome"], $_POST["mondo"], $_POST["sinossi"],$_SESSION["user"]["Nickname"]);
            $stmnt->execute();
            $template["title"] = "Dungeon Master";
            $template["file"] = "index.php";
            header("Location: ?Id_campagna=" . $stmnt->insert_id . "&modalita=dm");
        }
    }

    require_once("template/base.php");
