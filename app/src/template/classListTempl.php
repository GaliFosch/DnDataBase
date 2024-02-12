<main>
    <h2>Classi</h2>
    <?php
    $sql="SELECT * FROM Classe";
    $list = $db->getConnection()->query($sql);
    ?>
    <table>
        <tr>
            <td>Nome</td>
            <td>Creatore</td>
        </tr>
        <?php while($row = $list->fetch_assoc()){?>
        <tr>
            <tr><?php echo $row["Nome"]?></tr>
            <tr><?php echo $row["Creatore"]?></tr>
        </tr>
        <?php }?>
    </table>
</main>