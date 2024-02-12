<main>
    
    <div class="container user">
        <?php if(!empty($_SESSION['user']['Immagine'])){?>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION['user']['Immagine']); ?>" />
        <?php }else{?>
            <img src="../../images/user/playsolder.jpg" alt=""/>
        <?php }?>
        <?php
        echo "<h2>".$_SESSION["user"]["Nickname"]."</h2>";
        ?>
        <p>Dungeon Master</p>
    </div>
    <a href="?mode=player"><button>Modalità Player</button></a>
    <div class="container scrolling campaign">
        <h3>Diario delle Campagne Create</h3>
        <button class="arrow sx"></button>
        <div class="wrap">
            <a href="campaign.php">
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
                <a href="campaign.php?Id_campagna=<?php echo urlencode($row['Id_campagna']); ?>">
                    <?php if(!empty($row["Immagine"])){?>
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Immagine']); ?>" />
                    <?php } else {?>
                        <img src="../../images/campaign/campaign10.jpg" alt=""/>
                    <?php }?>
                    <p><?php echo $row['Nome']; ?></p>
                </a>
            </div>
        <?php }?>
        <button class="arrow dx"></button>
    </div>

    <div class="container scrolling mondo">
        <h3>Archivio dei Mondi</h3>
        <button class="arrow sx"></button>
        <div class="wrap">
            <a href="world.php">
                <img src="..\..\images\plus-sign.jpg" alt=""/>
                <p>Nuovo Mondo</p>
            </a>
        </div>
        <?php
            $sql = "SELECT Nome, Id_mondo
                    FROM Mondo
                    WHERE Creatore = ?";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("s", $_SESSION["user"]["Nickname"]);
            $stmnt->execute();
            $oggetto = $stmnt->get_result();
        ?>
        <?php while($row = $oggetto->fetch_assoc()) {?>
            <div class="wrap">
                <a href="world.php?id=<?php echo $row["Id_mondo"]?>#">
                    <img src="..\..\images\campaign\campaign1.jpg" alt=""/>
                    <p><?php echo $row['Nome']; ?></p>
                </a>
            </div>
        <?php }?>
        <button class="arrow dx"></button>
    </div>

    <div class="container scrolling homebrew">
        <h3>Le Tue Homebrew</h3>
        <button class="arrow sx"></button>
        <div class="wrap">
            <a href="homebrew.php?type=specie&action=show#">
                <img src="..\..\images\pg\dream_TradingCard(24).jpg" alt=""/>
                <p>Specie</p>
            </a>
        </div>
        <div class="wrap">
            <a href="class.php?action=homebrew">
                <img src="..\..\images\classes\classimg.jpg" alt=""/>
                <p>Classi</p>
            </a>
        </div>
        <button class="arrow dx"></button>
    </div>

    <script src="js/scrolling.js"></script>
</main>