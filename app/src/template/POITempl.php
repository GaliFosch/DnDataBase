<main>
    <h2><?php echo $lint["Nome"]?></h2>
    <table>
        <tr>
            <th>Tipologia:</th>
            <td><?php echo $lint["Tipologia"]?></td>
        </tr>
        <tr>
            <th>Mondo:</th>
            <td><?php echo $lint["NomeMondo"]?></td>
        </tr>
        <tr>
            <th>Stato:</th>
            <td><?php echo $lint["Stato"]?></td>
        </tr>
        <?php if(!empty($lint["appNome"])) {?>
        <tr>
            <th>Appartiene:</th>
            <td><?php echo $lint["appNome"]?></td>
        </tr>
        <?php }?>
    </table>
    <p><?php echo $lint["Descrizione"] ?></p>
</main>