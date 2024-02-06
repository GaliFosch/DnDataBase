  <nav>
        <a href="#">Home</a> 
        <a href="#">Statistiche</a> 
        <a href="#">Database</a> 
        <a href="#">Specie</a>
        <a href="#">Classe</a>
    </nav>
    
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
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['immagine']); ?>" />
                    <p><?php echo $row['nome']; ?></p>
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
                    $sql = "SELECT Nome, Immagine
                            FROM Pg INNER JOIN Personaggio ON Pg.IDPersonaggio = Personaggio.IDPersonaggio
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
        </div>
        <script src="js/scrolling.js"></script>
</main>
