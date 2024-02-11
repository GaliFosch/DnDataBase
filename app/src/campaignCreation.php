<?php
    require_once("bootstrap.php");
    $template["title"] = "CampaignCreation";
    $template["file"] = "campCreateTempl.php";
    $template["style"] = "creation.css";

    if(!empty($_GET["img"])
    && !empty($_GET["nome"])
    && !empty($_GET["mondo"])
    && !empty($_GET["sinossi"])){
            $sql = "INSERT INTO campagna(Immagine,Nome,Id_mondo,Sinossi, Creatore) VALUES (?,?,?,?)";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("ssss", $_GET["img"], $_GET["nome"], $_GET["mondo"], $_GET["sinossi"],$_SESSION["user"]["Nickname"]);
            $stmnt->execute();
            $template["title"] = "Dungeon Master";
            $template["file"] = "index.php";
        }else{
            $template["err_CAMP"] = "Errore nella creazione della campagna";
        }

    require_once("template/base.php");
