<?php
require_once("bootstrap.php");
if(!empty($_POST)){

    if(!empty($_GET["stato"]) && !empty($_GET["mondo"])){
        $sql = "INSERT INTO Luogo_d_Interesse(Nome, Tipologia, Descrizione, Mondo, Stato) VALUES (?,?,?,?,?)";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("sssis", $_POST["nome"], $_POST["type"], $_POST["desc"], $_GET["mondo"], $_GET["stato"]);
        $stmnt->execute();
    }else if(!empty($_GET["app"])){
        $sql = "SELECT Stato, Mondo FROM luogo_d_interesse WHERE Id_luogo_d_interesse=?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("i", $_GET["app"]);
        $stmnt->execute();
        $result = $stmnt->get_result();
        if($result->num_rows === 0){
            signalError("l'Id di appartenenza non esiste");
        }
        $app = $result->fetch_assoc();
        $sql = "INSERT INTO Luogo_d_Interesse(Nome, Tipologia, Descrizione, Appartiene, Mondo, Stato) VALUES (?,?,?,?,?,?)";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("sssiis", $_POST["nome"], $_POST["type"], $_POST["desc"], $_GET["app"], $app["Mondo"], $app["Stato"]);
        $stmnt->execute();
    } else {
        signalError("Mancano delle variabili");
    }
    header("Location: ?id=" . $stmnt->insert_id ."#");
}

if(!empty($_GET["id"])){
    $sql = "SELECT ldi.*, M.nome as NomeMondo, M.Creatore, app.Nome AS appNome
            FROM Luogo_D_Interesse ldi LEFT JOIN luogo_d_interesse app ON ldi.Appartiene=app.Id_luogo_d_interesse, Mondo M
            WHERE ldi.Id_luogo_d_interesse = ? 
                AND ldi.Mondo = M.id_mondo";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("i", $_GET["id"]);
    $stmnt->execute();
    $result = $stmnt->get_result();
    if($result->num_rows === 0){
        signalError("Id non presente");
    }
    $lint = $result->fetch_assoc();
    $template["title"] = $lint["Nome"];
    $template["file"] = "POITempl.php";
}else if(!empty($_GET["stato"]) && !empty($_GET["mondo"])){
    $sql = "SELECT Mondo.Creatore FROM Mondo, Stato WHERE Mondo.Id_mondo = ? AND Stato.Nome = ? AND Mondo.Id_mondo = Stato.Id_mondo";
    $stmnt=$db->getConnection()->prepare($sql);
    $stmnt->bind_param("is", $_GET["mondo"], $_GET["stato"]);
    $stmnt->execute();
    $result=$stmnt->get_result();
    if($result->num_rows==0){
        signalError("Stato inesistente");
    }
    if($result->fetch_assoc()["Creatore"]!=$_SESSION["user"]["Nickname"]){
        signalError("Non puoi modificare questo stato");
    }
    $template["title"] = "Crea Luogo d'Interesse";
    $template["file"] = "POICreationTempl.php";
}elseif(!empty($_GET["app"])){
    $sql = "SELECT Mondo.Creatore FROM Mondo, Luogo_D_Interesse WHERE Id_mondo = Mondo AND Id_luogo_d_interesse = ?";
    $stmnt=$db->getConnection()->prepare($sql);
    $stmnt->bind_param("i", $_GET["app"]);
    $stmnt->execute();
    $result=$stmnt->get_result();
    if($result->num_rows==0){
        signalError("Contenitore inesistente");
    }
    if($result->fetch_assoc()["Creatore"]!=$_SESSION["user"]["Nickname"]){
        signalError("Non puoi modificare questo Contenitore");
    }
    $template["title"] = "Crea Luogo d'Interesse";
    $template["file"] = "POICreationTempl.php";
}

require("template/base.php");