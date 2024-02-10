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
</main>