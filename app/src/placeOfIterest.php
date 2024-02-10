<?php
require_once("bootstrap.php");

if(!empty($_GET["id"])){
    $sql = "SELECT ldi.*, M.nome as NomeMondo, app.Nome AS appNome
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
}else if((!empty($_GET["stato"]) && !empty($_GET["mondo"])) || !empty($_GET["app"])){
    $template["title"] = "Crea Luogo d'Interesse";
    $template["file"] = "POICreationTempl.php";
}

require("template/base.php");