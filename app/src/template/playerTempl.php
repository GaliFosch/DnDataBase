<div>
    <?php
    //img
    echo "<h2>".$_SESSION["user"]["Nickname"]."</h2>";
    ?>
</div>
<main>
    <div class="scrolling">
        <h3>Diario delle Campagne</h1>
        <img class="leftArrow" src="#" alt="freccia sinistra"/>
        <?php
            $sql = "SELECT Nome, Immagine
                    FROM Campagna
                    WHERE Id_campagna IN (SELECT Id_campagna
                                        FROM Eroe INNER JOIN Pg ON Eroe.IDPersonaggio = Pg.IDPersonaggio
                                        WHERE Pg.Creatore = ?)";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("s", $_SESSION["user"]["Nickname"]);
            $stmnt->execute();
            $result = $stmnt->get_result();
        ?>
        <?php while($row = $result->fetch_assoc()) {?>
            <div>
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Immagine']); ?>" />
                <p><?php echo $row['Nome']; ?></p>
            </div>
        <?php }?>
        <img class="rightArrow" src="#" alt="freccia destra"/>
    </div>
    
    <div class="scrolling">
        <h3>I tuoi Personaggi</h3>
        <img class="leftArrow" src="#" alt="freccia sinistra"/>
        <div>
            <a href="#">
                <img src="#" alt=""/>
                <p>Nuovo Personaggio</p>
            </a>
        </div>
        <?php
            $sql = "SELECT Nome, Immagine
                    FROM Pg INNER JOIN Personaggio ON Pg.IDPersonaggio = Personaggio.IDPersonaggio
                    WHERE Creatore = ?";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("s", $_SESSION["user"]["Nickname"]);
            $stmnt->execute();
            $result = $stmnt->get_result();
        ?>
        <?php while($row = $result->fetch_assoc()) {?>
            <div>
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Immagine']); ?>" />
                <p><?php echo $row['Nome']; ?></p>
            </div>
        <?php }?>
        <img class="rightArrow" src="#" alt="freccia destra"/>
    </div>
    <script src="js/scrolling.js"></script>
</main>