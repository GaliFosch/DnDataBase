<main>
    <h2>Classi</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Creatore</th>
        </tr>
        <?php while($row = $list->fetch_assoc()){?>
        <tr>
            <td><a href="?action=show&id=<?php echo $row["Nome"]?>"><?php echo $row["Nome"]?></a></td>
            <td><?php echo $row["Creatore"]?></td>
        </tr>
        <?php }?>
    </table>
    <?php if($_GET["action"]==="homebrew"){?>
        <a href="?action=create"><button>Crea</button></a>
    <?php }?>
</main>