<main>
    <div class="container">
        <h2>Sessioni:</h2>
        <div>
            <a href="scene.php?data=<?php echo $_GET["date"] ?>&campagna=<?php echo $_GET["Id_campagna"]?>#" class="aScena"><button class="scena">Aggiungi Scena</button></a>
            <?php
            $sql = "SELECT Nome
            FROM Scena
            WHERE Data_Sessione = ? AND Id_campagna = ?";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("si", $_GET["date"], $_GET["Id_campagna"]);
            $stmnt->execute();
            $result = $stmnt->get_result();
            if($result->num_rows>0){
            ?>
            <ul>
                <?php while($row = $result->fetch_assoc()){?>
                    <li><a href="scene.php?campagna=<?php echo $_GET["Id_campagna"]?>&data=<?php echo $_GET["date"]?>&nome=<?php echo $row["Nome"]?>"><?php echo $row["Nome"]?></a></li>
                <?php }?>    
            </ul>
            <?php }?>
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