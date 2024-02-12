<?php
    require_once("bootstrap.php");

    if(!empty($_GET['Id_campagna']) && !empty($_GET['modalita'])){
        $template["title"] = "Campaign";
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
