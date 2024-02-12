<?php 
$sql="SELECT * FROM Tratti WHERE IDTratto = ?";
$stmnt = $db->getConnection()->prepare($sql);
$stmnt->bind_param("i", $_GET["id"]);
$stmnt->execute();
$tratto = $stmnt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tratti</title>
        <link rel="stylesheet" href="css\frame.css">
    </head>
    <body>
        <h2><?php echo $tratto["Nome"] ?></h2>
        <p><?php echo $tratto["Descrizione"] ?></p>
    </body>
    <footer>
        <p><?php echo $tratto["Creatore"] ?></p>
    </footer>
</html>