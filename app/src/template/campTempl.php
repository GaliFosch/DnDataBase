<script>
    function popUpFunc() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
</script>

<main>

    <?php
        $modalità = filter_var($_GET['modalita'], FILTER_SANITIZE_NUMBER_INT);
        $idSelected = filter_var($_GET['Id_campagna'], FILTER_SANITIZE_NUMBER_INT);
    ?>
    <div class="container">

        <div class="top">

            <div class="campaign"> 

                <?php
                    $sql = "SELECT Campagna.Nome AS CampagnaNome, 
                            Campagna.Sinossi AS Sinossi, Campagna.Immagine AS Immagine, 
                            Campagna.Creatore AS CampagnaCreatore, Mondo.Nome AS MondoNome, 
                            Mondo.Ambientazione AS Ambientazione, Mondo.Descrizione AS Descrizione, 
                            Mondo.Creatore AS MondoCreatore, Mondo.Id_mondo AS Id_Mondo
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
                <?php if(!empty($row["Immagine"])){?>
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Immagine']); ?>" />
                <?php }else{?>
                    <img src="../../images/campaign/campaign10.jpg" alt=""/>
                <?php }?>
                <div class="info">
                    <h2> <?php echo ($row['CampagnaNome']); ?> </h2>
                    <p class="mondo"> <?php echo $row['MondoNome'];?></p>
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
                        <?php while($part = $result->fetch_assoc()) {?>
                            <li> <?php echo $part['Nome'];?></li>
                    <?php }?>
                </ul>
                <a href="invitation.php?campaign=<?php echo $_GET["Id_campagna"]?>" class="aInvitation"><button class="invitation">Aggiungi partecipante</button></a>
        </div> 

        <button class="accordion">Sessioni:</button>
        <div class="panel">
            <ul>
                <?php
                    $sql = "SELECT *
                    FROM Sessione
                    WHERE Id_campagna = ?";
                    $stmnt = $db->getConnection()->prepare($sql);
                    $stmnt->bind_param("i", $idSelected);
                    $stmnt->execute();
                    $result = $stmnt->get_result();
                    ?>
                    <?php while($ses = $result->fetch_assoc()) {?>
                        <li> 
                            <p> <?php echo $ses['Data_Sessione'];?> <br> <?php echo $ses['Riassunto'];?> </p>
                        </li>
                    <?php }?>
            </ul>
        </div>

        <button class="accordion">Mondo:</button>
            <div class="panel">
                <p>  <?php echo $row['Ambientazione'];?> <br> 
                    <?php echo $row['Descrizione'];?> <br>
                    <?php echo $row['MondoCreatore'];?>
                </p>
            </div>

            <script>
                var acc = document.getElementsByClassName("accordion");
                var i;

                for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                    } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
                }
            </script>
    </div>    
</main>
