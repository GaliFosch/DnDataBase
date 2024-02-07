<div>
    <?php
    //img
    echo "<h2>".$_SESSION["user"]["Nickname"]."</h2>";
    ?>
</div>

<main>
    <div class="scrolling">
        <h3>Diario delle Campagne Create</h3>
        <img class="leftArrow" src="#" alt="freccia sinistra"/>
        <div>
            <a href="#">
                <img src="#" alt=""/>
                <p>Nuova Campagna</p>
            </a>
        </div>
        <?php
            $sql = "SELECT Nome, Immagine
                    FROM Campagna
                    WHERE Creatore = ?";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("s", $_SESSION["user"]["Nickname"]);
            $stmnt->execute();
            $oggetto = $stmnt->get_result();
        ?>
        <?php while($row = $oggetto->fetch_assoc()) {?>
            <div>
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Immagine']); ?>" />
                <p><?php echo $row['Nome']; ?></p>
            </div>
        <?php }?>
        <img class="rightArrow" src="#" alt="freccia destra"/>
    </div>
    <script src="js/scrolling.js"></script>
</main>