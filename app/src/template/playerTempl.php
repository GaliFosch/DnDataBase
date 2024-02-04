<main>   
    <div class="container user">
        <?php
        //img
        echo "<img>".$_SESSION["user"]["Immagine"]."</img>";
        echo "<h2>".$_SESSION["user"]["Nickname"]."</h2>";
        ?>
        <p>Giocatore</p>
    </div>

        <div class="container scrolling campaign">
            <h3>Diario delle Campagne</h3>
            <img class="leftArrow" src="#" alt="freccia sinistra"/>
            <button class="arrow sx"></button>
            <?php
                $sql = "SELECT nome, immagine
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
                <div class="wrap">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Immagine']); ?>" />
                    <p><?php echo $row['Nome']; ?></p>
                </div>
            <?php }?>
            <button class="arrow dx"></button>
            <img class="rightArrow" src="#" alt="freccia destra"/>
        </div>
        
        <div class="container scrolling pg">
            <h3>I tuoi Personaggi</h3>
            <button class="arrow sx"></button>
            <img class="leftArrow" src="#" alt="freccia sinistra"/>
            <div class="wrap">
                <a href="#">
                    <img src="..\..\images\plus-sign.jpg" alt=""/>
                    <p>Nuovo Personaggio</p>
                </a>
            </div>
            <?php
                $sql = "SELECT Nome, Immagine
                        FROM Pg
                        WHERE Creatore = ?";
                $stmnt = $db->getConnection()->prepare($sql);
                $stmnt->bind_param("s", $_SESSION["user"]["Nickname"]);
                $stmnt->execute();
                $result = $stmnt->get_result();
            ?>
            <?php while($row = $result->fetch_assoc()) {?>
                <div class="wrap">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Immagine']); ?>" />
                    <p><?php echo $row['Nome']; ?></p>
                </div>
            <?php }?>
            <button class="arrow dx"></button>
            <img class="rightArrow" src="#" alt="freccia destra"/>
        </div>
        <script src="js/scrolling.js"></script>
