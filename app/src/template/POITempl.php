<main>
    <h2><?php echo $lint["Nome"]?></h2>
    <table>
        <tr>
            <th>Tipologia:</th>
            <td><?php echo $lint["Tipologia"]?></td>
        </tr>
        <tr>
            <th>Mondo:</th>
            <td><a href="world.php?id=<?php echo $lint["Mondo"]?>#"><?php echo $lint["NomeMondo"]?></a></td>
        </tr>
        <tr>
            <th>Stato:</th>
            <td><a href="state.php?name=<?php echo $lint["Stato"]?>&worldId=<?php echo $lint["Mondo"]?>#"><?php echo $lint["Stato"]?></a></td>
        </tr>
        <?php if(!empty($lint["appNome"])) {?>
        <tr>
            <th>Appartiene:</th>
            <td><a href="?id=<?php echo $lint["Appartiene"]?>#"><?php echo $lint["appNome"]?></a></td>
        </tr>
        <?php }?>
    </table>
    <p><?php echo $lint["Descrizione"] ?></p>
    <?php 
    $sql="SELECT Id_luogo_d_interesse as id, Nome, Tipologia FROM Luogo_D_Interesse WHERE Appartiene = ?";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("i", $lint["Id_luogo_d_interesse"]);
    $stmnt->execute();
    $result = $stmnt->get_result();
    if($result->num_rows>0){
    ?>
    <h3>Contiene:</h3>
        <table>
            <tr>
                <th>Nome</th>
                <th>Tipologia</th>
            </tr>
            <?php while($row = $result->fetch_assoc()) {?>
            <tr>
                <td><a href="?id=<?php echo $row["id"] ?>#"><?php echo $row["Nome"] ?></a></td>
                <td><?php echo $row["Tipologia"] ?></td>
            </tr>
            <?php }?>
        </table>
    <?php }?>
</main>