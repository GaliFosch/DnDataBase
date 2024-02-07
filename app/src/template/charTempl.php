<main>

    <?php
        if (isset($_GET['IDPersonaggio'])) {
            $idSelected = filter_var($_GET['IDPersonaggio'], FILTER_SANITIZE_NUMBER_INT);
        } else {
            die("No ID provided.");
        }
    ?>
    <div class="container">

        <div class="top">

            <div class="pg"> 

                <?php
                    $sql = "SELECT *
                            FROM Personaggio
                            JOIN Pg
                            ON Personaggio.IDPersonaggio = Pg.IDPersonaggio
                            WHERE Pg.IDPersonaggio = ?";
                    $stmnt = $db->getConnection()->prepare($sql);
                    $stmnt->bind_param("i", $idSelected);
                    $stmnt->execute();
                    $result = $stmnt->get_result();
                    $row = $result->fetch_assoc();
                ?>

                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Immagine']); ?>" />
                
                <div class="info">
                    <h2> <?php echo ($row['Nome']); ?> </h2>

                    <?php
                    $sql = "SELECT *
                            FROM Vocazione
                            WHERE IDPersonaggio = ?";
                    $stmnt = $db->getConnection()->prepare($sql);
                    $stmnt->bind_param("i", $idSelected);
                    $stmnt->execute();
                    $result = $stmnt->get_result();
                    ?>
                    <?php while($classe = $result->fetch_assoc()) {?>
                        <p class="class"> <?php echo $classe['Classe'];?>(<?php echo $classe['Livello'];?>)</p>
                    <?php }?>
                    

                    <p class="alignment"><?php echo ($row['Allineamento']); ?>, <?php echo ($row['Taglia']); ?></p>
                    <p class="creatore"><?php echo ($row['Creatore']); ?></p>
                </div>
            </div> 

            <div class="CAPF">
                <div class="CA">
                    <p>CA:</p><p><?php echo ($row['CA']); ?></p>
                </div>
                <div class="PF">
                    <p>PF:</p> <p><?php echo ($row['PF']); ?></p>
                </div>
            </div> 

        </div> 
        
        <div class="desc">
            <p> <?php echo ($row['Descrizione']); ?> </p>

        <div class="stats">

                <?php
                    $sql = "SELECT *
                            FROM Stat
                            WHERE IDPersonaggio = ?";
                    $stmnt = $db->getConnection()->prepare($sql);
                    $stmnt->bind_param("i", $idSelected);
                    $stmnt->execute();
                    $result = $stmnt->get_result();
                    ?>
                    <?php while($point = $result->fetch_assoc()) {?>
                        <div class="wrap">
                            <p class="statistica"><?php echo ($point['Statistica']); ?></p>
                            <p class="numero"><?php echo ($point['Valore']); ?></p>
                                <?php
                                    $mod =  floor(($point["Valore"] - 10)/2); 
                                ?>
                            <p class="mod"><?php echo ($mod); ?></p>
                        </div>
                <?php }?>
        </div> 

        <div class="points">
            <p>Percezione passiva: <?php echo ($row['PercezionePassiva']); ?></p>
            <p>Bonus competenza: +<?php echo ($row['PB']); ?></p>
        </div> 

        <div class="equipment">
            <h3>Equipaggiamento:</h3>
                <ul>
                    <?php
                        $sql = "SELECT *
                        FROM Oggetto
                        WHERE Id_oggetto IN (SELECT Id_oggetto
                                            FROM Inventario 
                                            WHERE Inventario.IDPersonaggio = ?)";
                        $stmnt = $db->getConnection()->prepare($sql);
                        $stmnt->bind_param("i", $idSelected);
                        $stmnt->execute();
                        $result = $stmnt->get_result();
                        ?>
                        <?php while($inv = $result->fetch_assoc()) {?>
                            <li> <?php echo $inv['Nome'];?></li>
                    <?php }?>
                </ul>
        </div> 

    </div>    
</main>