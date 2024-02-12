<?php
require_once("bootstrap.php");

function addCharacter($values){
    global $db;
    $sql = "INSERT INTO Personaggio(Nome, Immagine, Allineamento, Taglia, CA, PercezionePassiva, PB, PF, Descrizione) VALUES(?,?,?,?,?,?,2,?,?)";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("ssssiiis", $values["nome"],
                        $values["img"], 
                        $values["allineamento"], 
                        $values["taglia"],
                        $values["ca"],
                        $values["PP"],
                        $values["pf"],
                        $values["desc"]);
    $stmnt->execute();
    $id = $stmnt->insert_id;
    $sql = "INSERT INTO stat(IDPersonaggio, Statistica, Valore) VALUES(?,?,?)";
    $stmnt = $db->getConnection()->prepare($sql);
    $basicStats=array("Forza", "Destrezza", "Costituzione", "Intelligenza", "Saggezza", "Carisma");
    foreach($basicStats as $s){
        $stmnt->bind_param("isi", $id, $s, $values[$s]);
        $stmnt->execute();
    }
    $sql = "INSERT INTO Pg(IDPersonaggio, Livello, Creatore, IdSpecie) VALUES(?,1,?,?)";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("isi", $id, $_SESSION["user"]["Nickname"], $values["specie"]);
    $stmnt->execute();
    $sql = "INSERT INTO Vocazione(IDPersonaggio, Classe, Livello) VALUES(?,?,1)";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("is", $id, $values["class"]);
    $stmnt->execute();
    $sql = "INSERT INTO Specializza(Nome_SottoClasse, Classe, IDPersonaggio) VALUES(?,?,?)";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("ssi", $values["subclass"], $values["class"], $id);
    $stmnt->execute();
    return $id;
}

if(!empty($_POST) && !empty($_POST["action"])){
    switch($_POST["action"]){
        case "species":
            $_SESSION["creaPg"] = $_POST;
            $_SESSION["creaPg"]["img"] = parseImg("img");
            $template["title"] = "Creazione Personaggio";
            $template["file"] = "charCreationTempl.php";
            $template["style"] = "creation.css";    
            break;
        case "class":
            $_SESSION["creaPg"]["specie"] = $_POST["specie"];
            $template["title"] = "Creazione Personaggio";
            $template["file"] = "charCreationTempl.php";  
            $template["style"] = "creation.css";     
            break;
        case "subclass":
            $_SESSION["creaPg"]["class"] = $_POST["class"];
            $template["title"] = "Creazione Personaggio";
            $template["file"] = "charCreationTempl.php";
            $template["style"] = "creation.css";   
            break;
        case "complete":
            $_SESSION["creaPg"]["subclass"] = $_POST["subclass"];
            $id = addCharacter($_SESSION["creaPg"]);
            unset($_SESSION["creaPg"]);
            header("Location: ?IDPersonaggio=".$id);
            break;
        default:
            signalError("Azione non riconosciuta");
            break;
    }
}elseif(!empty($_GET["IDPersonaggio"])){
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
    $template["title"] = $character["Nome"];
    $template["file"] = "charTempl.php";
    $template["style"] = "character.css";
}else{
    unset($_SESSION["creaPg"]);
    $template["title"] = "Creazione Personaggio";
    $template["file"] = "charCreationTempl.php";
    $template["style"] = "creation.css";   
}

require_once("template/base.php");
