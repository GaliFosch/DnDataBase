<main>
    <div class="container">
        <h2>Sessioni:</h2>
        <div>
            <a href="#" class="aScena"><button class="scena">Aggiungi Scena</button></a>
            <?php
                $sql = "SELECT *
                FROM Sessione
                WHERE Data_Sessione = ? AND Id_campagna = ?";
                $stmnt = $db->getConnection()->prepare($sql);
                $stmnt->bind_param("si", $_GET["date"], $_GET["Id_campagna"]);
                $stmnt->execute();
                $result = $stmnt->get_result();
                ?>
                <?php while($ses = $result->fetch_assoc()) {?>
                    <p class="sessionInfo"> <?php echo $ses['Data_Sessione'];?> <br> <?php echo $ses['Riassunto'];?> </p>
            <?php }?>
        </div>
    </div>
</main>