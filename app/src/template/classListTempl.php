<main>
    <h2>Classi</h2>
    <?php
    $sql="SELECT Nome, Creatore FROM Classe";
    $list = $db->getConnection()->query($sql);
    ?>
    <table>
        <tr>
            <th>Nome</th>
            <th>Creatore</th>
        </tr>
        <?php while($row = $list->fetch_assoc()){?>
        <tr>
            <td><?php echo $row["Nome"]?></td>
            <td><?php echo $row["Creatore"]?></td>
        </tr>
        <?php }?>
    </table>
</main>