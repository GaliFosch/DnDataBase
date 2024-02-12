<main>   
    <div class="container left">
        <div class="container user">
            <?php if(!empty($_SESSION['user']['Immagine'])){?>
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION['user']['Immagine']); ?>" />
            <?php }else{?>
                <img src="../../images/user/playsolder.jpg" alt=""/>
            <?php }?>
            <?php
            echo "<h2>".$_SESSION["user"]["Nickname"]."</h2>";
            ?>
            <p>Giocatore</p>
        </div>
        <a href="?mode=dm" class="aMode"><button class="mode">Modalità DM</button></a>
    </div>

    <div class="container invite">
            <h3>Inviti</h3>
            <p class="reminder">Clicca un invito per interagire</p>
            <?php
            $sql="SELECT C.Id_campagna, I.DataDiInserimento as data, C.Nome FROM Invito I, Campagna C WHERE I.Id_campagna = C.Id_campagna AND I.Nickname = ? ORDER BY data";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("s", $_SESSION["user"]["Nickname"]);
            $stmnt->execute();
            $result=$stmnt->get_result();
            ?>
            <ul>
                <?php while($row = $result->fetch_assoc()){?>
                    <li>
                        <?php echo $row["data"]?> <a href="invitation.php?campaign=<?php echo $row["Id_campagna"]?>"><?php echo $row["Nome"]?></a>
                    </li>
                <?php }?>
            </ul>
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
                    <a href="campaign.php?Id_campagna=<?php echo urlencode($row['Id_campagna']); ?>">
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
                <a href="charactersheet.php">
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
                        <a href="charactersheet.php?IDPersonaggio=<?php echo urlencode($row['IDPersonaggio']); ?>">
                            <?php if(!empty($row['Immagine'])){?> 
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Immagine']); ?>" />
                            <?php }else{?>
                                <img src="../../images/pg/playsolder.jfif" alt=""/>
                            <?php }?>
                            <p><?php echo $row['Nome']; ?></p>
                        </a>
                    </div>
                <?php }?>
            <button class="arrow dx"></button>
        </div>
        <script src="js/scrolling.js"></script>
</main>
