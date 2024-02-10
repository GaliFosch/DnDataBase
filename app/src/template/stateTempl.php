<main>
    <h2><?php echo $state["Nome"]?></h2>
    <section>
        <table>
            <tr>
                <th>Mondo:</th>
                <td><a href="world.php?id=<?php echo $_GET["worldId"]?>#"><?php echo $state["Mondo"]?></a></td>
            </tr>
            <tr>
                <th>Governo:</th>
                <td><?php echo $state["Governo"]?></td>
            </tr>
            <tr>
                <th>Ricchezza:</th>
                <td><?php echo $state["Ricchezza"]?></td>
            </tr>
            <tr>
                <th>Architettura:</th>
                <td><?php echo $state["Architettura"]?></td>
            </tr>
        </table>
    </section>
    <section>
        <h3>Descrizione:</h3>
        <p><?php echo $state["Descrizione"] ?></p>
    </section>
    <footer>
        <p><?php echo $state["Creatore"] ?></p>
    </footer>
</main>