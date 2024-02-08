<script>
    function popUpFunc() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
</script>


<main>

    <?php
        if (isset($_GET['Id_campagna'])) {
            $idSelected = filter_var($_GET['Id_campagna'], FILTER_SANITIZE_NUMBER_INT);
        } else {
            die("No ID provided.");
        }
    ?>
    <div class="container">

        <div class="top">

            <div class="campaign"> 

                <?php
                    $sql = "SELECT Campagna.Nome AS CampagnaNome, 
                            Campagna.Sinossi AS Sinossi, Campagna.Immagine AS Immagine, 
                            Campagna.Creatore AS CampagnaCreatore, Mondo.Nome AS MondoNome, 
                            Mondo.Ambientazione AS Ambientazione, Mondo.Descrizione AS Descrizione, 
                            Mondo.Creatore AS MondoCreatore
                            FROM Campagna
                            JOIN Mondo
                            ON Campagna.Id_mondo = Mondo.Id_mondo
                            WHERE Campagna.Id_campagna = ?";
                    $stmnt = $db->getConnection()->prepare($sql);
                    $stmnt->bind_param("i", $idSelected);
                    $stmnt->execute();
                    $result = $stmnt->get_result();
                    $row = $result->fetch_assoc();
                ?>

                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Immagine']); ?>" />
                
                <div class="info">
                    <h2> <?php echo ($row['CampagnaNome']); ?> </h2>
                        
                    <div class="popup" onclick="popUpFunc()">
                        <p class="mondo"> <?php echo $row['MondoNome'];?></p>
                        <p class="popuptext" id="myPopup">Clicca sul popup per chiuderlo <br> 
                        Ambientazione: <?php echo $row['Ambientazione'];?> <br> 
                        <?php echo $row['Descrizione'];?></p>
                    </div>


                    <p class="creatore"><?php echo ($row['CampagnaCreatore']); ?></p>
                </div>
            </div>
        </div> 

        
        <div class="desc">
            <p> <?php echo ($row['Sinossi']); ?> </p>
        </div>


        <div class="partecipants">
            <h3>Partecipanti:</h3>
                <ul>
                    <?php
                        $sql = "SELECT *
                        FROM Eroe
                        JOIN Personaggio
                        ON Eroe.IDPersonaggio = Personaggio.IDPersonaggio
                        WHERE Eroe.Id_campagna = ?";
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