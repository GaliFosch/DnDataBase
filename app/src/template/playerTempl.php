<main>   
    <div class="container user">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION['user']['Immagine']); ?>" />
        <?php
        echo "<h2>".$_SESSION["user"]["Nickname"]."</h2>";
        ?>
        <p>Giocatore</p>
    </div>

        <div class="container scrolling campaign">
            <h3>Diario delle Campagne</h3>
            <button class="arrow sx"></button>
            <?php
                $sql = "SELECT nome, immagine, Id_campagna
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
                    <a href="campaign.php" onclick="window.location.href='campaign.php?Id_campagna=<?php echo urlencode($row['Id_campagna']); ?>'; return false;">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['immagine']); ?>" />
                        <p><?php echo $row['nome']; ?></p>
                    </a>
                </div>
            <?php }?>
            <button class="arrow dx"></button>
        </div>
        
        <div class="container scrolling pg">
            <h3>I tuoi Personaggi</h3>
            <button class="arrow sx"></button>
            <div class="wrap">
                <a href="#">
                    <img src="..\..\images\plus-sign.jpg" alt=""/>
                    <p>Nuovo Personaggio</p>
                </a>
            </div>
                <?php
                    $sql = "SELECT *
                            FROM Pg INNER JOIN Personaggio ON Pg.IDPersonaggio = Personaggio.IDPersonaggio
                            WHERE Creatore = ?";
                    $stmnt = $db->getConnection()->prepare($sql);
                    $stmnt->bind_param("s", $_SESSION["user"]["Nickname"]);
                    $stmnt->execute();
                    $result = $stmnt->get_result();
                ?>
                <?php while($row = $result->fetch_assoc()) {?>
                    <div class="wrap">
                        <a href="sheet.php" onclick="window.location.href='sheet.php?IDPersonaggio=<?php echo urlencode($row['IDPersonaggio']); ?>'; return false;">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Immagine']); ?>" />
                            <p><?php echo $row['Nome']; ?></p>
                        </a>
                    </div>
                <?php }?>
            <button class="arrow dx"></button>
        </div>
        <script src="js/scrolling.js"></script>
</main>
