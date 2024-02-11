<main>
    <div class="container">
        <div class="content">
            <h2>Classi più usate dai giocatori:</h2>
            <div class="grid podium">
                <?php
                    $sql = "SELECT Classe, COUNT(*) as Count 
                            FROM Vocazione 
                            GROUP BY Classe
                            ORDER BY Count DESC
                            LIMIT  3";
                    $stmnt = $db->getConnection()->prepare($sql);
                    $stmnt->execute();
                    $result = $stmnt->get_result();
                    $rowNumber =  1;
                    ?>
                    <?php while($row = $result->fetch_assoc()) {?>
                        <div class="position">
                            <?php 
                            switch ($rowNumber) {
                                case  1:
                                    $imageFile = 'gold.png';
                                    break;
                                case  2:
                                    $imageFile = 'silver.png';
                                    break;
                                case  3:
                                    $imageFile = 'bronze.png';
                                    break;
                            }
                            echo "<img src='../../images/medals/$imageFile' alt='Medal for row $rowNumber place'>";
                            $rowNumber++;
                            ?>
                            
                            <p> <?php echo 'Classe: ' . $row['Classe'] .'<br>'?> </p>
                            <p> <?php echo 'Occorrenze: ' . $row['Count']?> </p>
                        </div>
                    <?php }?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <h2>Specie più usate dai giocatori:</h2>
            <div class="grid podium">
                <?php
                    $sql = "SELECT Pg.IdSpecie, Specie.Nome, COUNT(*) as Count 
                            FROM Pg
                            JOIN Specie
                            ON Pg.IdSpecie = Specie.IdSpecie
                            GROUP BY Pg.IdSpecie
                            ORDER BY Count DESC
                            LIMIT  3";
                    $stmnt = $db->getConnection()->prepare($sql);
                    $stmnt->execute();
                    $result = $stmnt->get_result();
                    $rowNumber =  1;
                    ?>
                    <?php while($row = $result->fetch_assoc()) {?>
                        <div class="position">
                            <?php 
                            switch ($rowNumber) {
                                case  1:
                                    $imageFile = 'gold.png';
                                    break;
                                case  2:
                                    $imageFile = 'silver.png';
                                    break;
                                case  3:
                                    $imageFile = 'bronze.png';
                                    break;
                            }
                            echo "<img src='../../images/medals/$imageFile' alt='Medal for row $rowNumber place'>";
                            $rowNumber++;
                            ?>
                            
                            <p> <?php echo 'Specie: ' . $row['Nome'] .'<br>'?> </p>
                            <p> <?php echo 'Occorrenze: ' . $row['Count']?> </p>
                        </div>
                    <?php }?>
            </div>
        </div>
    </div>

<div class="container">
    <div class="content">
        <h2>Mostri più usati dai Dungeon Master:</h2>
        <div class="grid podium">
            <?php
                $sql = "SELECT Personaggio.Nome AS Nome, COUNT(*) AS Count 
                        FROM Personaggio
                        JOIN Ubicazione
                        ON Personaggio.IDPersonaggio = Ubicazione.IDPersonaggio
                        GROUP BY Personaggio.Nome
                        ORDER BY Count DESC
                        LIMIT  3";
                $stmnt = $db->getConnection()->prepare($sql);
                $stmnt->execute();
                $result = $stmnt->get_result();
                $rowNumber =  1;
                ?>
                <?php while($row = $result->fetch_assoc()) {?>
                    <div class="position">
                        <?php 
                        switch ($rowNumber) {
                            case  1:
                                $imageFile = 'gold.png';
                                break;
                            case  2:
                                $imageFile = 'silver.png';
                                break;
                            case  3:
                                $imageFile = 'bronze.png';
                                break;
                        }
                        echo "<img src='../../images/medals/$imageFile' alt='Medal for row $rowNumber place'>";
                        $rowNumber++;
                        ?>
                        
                        <p> <?php echo 'Mostro: ' . $row['Nome'] .'<br>'?> </p>
                        <p> <?php echo 'Occorrenze: ' . $row['Count']?> </p>
                    </div>
                <?php }?>
        </div>
    </div>
</div>




    </div>

    
</main>