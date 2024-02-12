<main>
    <div class="container">

        <div class="top">

            <div class="pg"> 
                <?php if(!empty($character['Immagine'])){?> 
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($character['Immagine']); ?>" />
                <?php }else{?>
                    <img src="../../images/pg/playsolder.jfif" alt=""/>
                <?php }?>
                
                <div class="info">
                    <h2> <?php echo ($character['Nome']); ?> </h2>

                    <?php
                    $sql = "SELECT *
                            FROM Vocazione
                            WHERE IDPersonaggio = ?";
                    $stmnt = $db->getConnection()->prepare($sql);
                    $stmnt->bind_param("i", $character["IDPersonaggio"]);
                    $stmnt->execute();
                    $result = $stmnt->get_result();
                    ?>
                    <?php while($classe = $result->fetch_assoc()) {?>
                        <p class="class"> <?php echo $classe['Classe'];?>(<?php echo $classe['Livello'];?>)</p>
                    <?php }?>
                    

                    <p class="alignment"><?php echo ($character['Allineamento']); ?>, <?php echo ($character['Taglia']); ?></p>
                    <p class="creatore"><?php echo ($character['Creatore']); ?></p>
                </div>
            </div> 

            <div class="CAPF">
                <div class="CA">
                    <p>CA:</p><p><?php echo ($character['CA']); ?></p>
                </div>
                <div class="PF">
                    <p>PF:</p> <p><?php echo ($character['PF']); ?></p>
                </div>
            </div> 

        </div> 
        
        <div class="desc">
            <p> <?php echo ($character['Descrizione']); ?> </p>

        <div class="stats">

                <?php
                    $sql = "SELECT *
                            FROM Stat
                            WHERE IDPersonaggio = ?";
                    $stmnt = $db->getConnection()->prepare($sql);
                    $stmnt->bind_param("i", $character["IDPersonaggio"]);
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
            <p>Percezione passiva: <?php echo ($character['PercezionePassiva']); ?></p>
            <p>Bonus competenza: +<?php echo ($character['PB']); ?></p>
        </div> 
    </div>    
</main>