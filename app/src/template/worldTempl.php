<main>
    <div class="container world">
        <div class="top">
            <div class="worldContent"> 
                <?php if(!empty($world["Immagine"])){?>
                    <img id="preview" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($world['Immagine']); ?>" />
                <?php }else{?>
                    <img src="../../images/campaign/campaign1.jpg" alt=""/>
                <?php }?>
                
                <div class="info">
                    <h2><?php echo $world["Nome"]?></h2>
                        <p class="ambientazione"><strong>Ambientazione:</strong> <?php echo $world["Ambientazione"]?></p>
                </div>
            </div>
        </div>
        
        <div class="desc">
            <p class="worldDesc"><?php echo $world["Descrizione"] ?></p>
            <?php if($_SESSION["user"]["Nickname"] === $world["Creatore"]){?>
            <a href="world.php?id=<?php echo $world["Id_mondo"]?>&action=modify#" class="aMod"><button class="bmod">Modifica</button></a>
            <?php } ?>
        </div>

        <?php
            $sql = "SELECT * FROM Stato WHERE Id_mondo = ?";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("i", $world["Id_mondo"]);
            $stmnt->execute();
            $result = $stmnt->get_result();
            if($result->num_rows>0){
        ?>
        <section>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Governo</th>
                        <th>Ricchezza</th>
                        <th>Architettura</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()){?>
                        <tr>
                            <td><a href="state.php?name=<?php echo $row["Nome"] ?>&worldId=<?php echo $world["Id_mondo"] ?>#"><?php echo $row["Nome"] ?></a></td>
                            <td><?php echo $row["Governo"] ?></td>
                            <td><?php echo $row["Ricchezza"] ?></td>
                            <td><?php echo $row["Architettura"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
        <?php } ?>
        <?php if($_SESSION["user"]["Nickname"] === $world["Creatore"]){?>
        <a href="state.php?worldId=<?php echo $world["Id_mondo"]?>#" class="aState"><button class="state">Aggiungi Stato</button></a>
        <?php } ?>
        <footer class="footCreator">
            <p><?php echo $world["Creatore"] ?></p>
        </footer>
    </div>
</main>
