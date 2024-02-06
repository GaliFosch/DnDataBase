<?php require_once("bootstrap.php") ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Specie</title>
    </head>
    <body>
        <?php 
            $sql = "SELECT * FROM Specie WHERE IdSpecie = ?";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("i",$_GET["id"]);
            $stmnt->execute();
            $result = $stmnt->get_result();
            $specie = $result->fetch_assoc();
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
                $result = $stmnt->get_result();
                while($row = $result->fetch_assoc()){
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