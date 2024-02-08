<!DOCTYPE html>
<html>
    <head>
        <title>Specie</title>
        <link rel="stylesheet" href="css\frame.css">
    </head>
    <body>
        <?php 
            $sql = "SELECT * FROM Specie WHERE IdSpecie = ?";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("i",$_GET["id"]);
            $stmnt->execute();
            $oggetto = $stmnt->get_result();
            $specie = $oggetto->fetch_assoc();
        ?>
        <main>
            <h2><?php echo $specie["Nome"]?></h2>
            <p><?php echo $specie["Descrizione"]?></p>
            <?php 
                $sql = "SELECT * 
                        FROM Tratto INNER JOIN Tratti ON Tratto.IDTratto = Tratti.IDTratto 
                        WHERE IdSpecie = ?";
                $stmnt = $db->getConnection()->prepare($sql);
                $stmnt->bind_param("i", $_GET["id"]);
                $stmnt->execute();
                $oggetto = $stmnt->get_result();
                while($row = $oggetto->fetch_assoc()){
            ?>
            <article>
                <h3><?php echo $row["Nome"] ?></h3>
                <p><?php echo $row["Descrizione"] ?></p>
            </article>
            <?php }?>
        </main>

        <footer>
            <p><?php echo $specie["Creatore"]?></p>
        </footer>
    </body>
</html>