<main>
    
    <div class="container user">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION['user']['Immagine']); ?>" />
        <?php
        echo "<h2>".$_SESSION["user"]["Nickname"]."</h2>";
        ?>
        <p>Dungeon Master</p>
    </div>

    <div class="container scrolling campaign">
        <h3>Diario delle Campagne Create</h3>
        <button class="arrow sx"></button>
        <div class="wrap">
            <a href="#">
                <img src="..\..\images\plus-sign.jpg" alt=""/>
                <p>Nuova Campagna</p>
            </a>
        </div>
        <?php
            $sql = "SELECT Nome, Immagine, Id_campagna
                    FROM Campagna
                    WHERE Creatore = ?";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("s", $_SESSION["user"]["Nickname"]);
            $stmnt->execute();
            $oggetto = $stmnt->get_result();
        ?>
        <?php while($row = $oggetto->fetch_assoc()) {?>
            <div class="wrap">
                <a href="campaign.php" onclick="window.location.href='campaign.php?Id_campagna=<?php echo urlencode($row['Id_campagna']); ?>'; return false;">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Immagine']); ?>" />
                    <p><?php echo $row['Nome']; ?></p>
                </a>
            </div>
        <?php }?>
        <button class="arrow dx"></button>
    </div>

    <script src="js/scrolling.js"></script>
</main>