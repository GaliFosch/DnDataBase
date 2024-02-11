<main>
<div class="container">
    <h2><?php echo $state["Nome"]?></h2>
    <section>
        <table>
            <tr>
                <th>Mondo:</th>
                <td><a href="world.php?id=<?php echo $_GET["worldId"]?>#" class="aMondo"><?php echo $state["Mondo"]?></a></td>
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
    <section class="desc">
        <h3>Descrizione:</h3>
        <p><?php echo $state["Descrizione"] ?></p>
    </section>
    <section class="POI">
        <h3>Luoghi d'interesse:</h3>
        <?php 
        $sql="SELECT Id_luogo_d_interesse as id, Nome, Tipologia FROM Luogo_D_Interesse WHERE Stato = ? AND Mondo = ?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("si", $state["Nome"], $state["Id_mondo"]);
        $stmnt->execute();
        $result = $stmnt->get_result();
        if($result->num_rows>0){
        ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Tipologia</th>
                </tr>
                <?php while($row = $result->fetch_assoc()) {?>
                <tr>
                    <td><a href="placeOfInterest.php?id=<?php echo $row["id"] ?>#"><?php echo $row["Nome"] ?></a></td>
                    <td><?php echo $row["Tipologia"] ?></td>
                </tr>
                <?php }?>
            </table>
        <?php }?>
        <?php if($_SESSION["user"]["Nickname"] === $state["Creatore"]){?>
        <a href="placeOfInterest.php?stato=<?php echo $state["Nome"] ?>&mondo=<?php echo $state["Id_mondo"]?>#" class="aPOI"><button>Aggiungi</button></a>
        <?php } ?>
    </section>
    <footer>
        <p><?php echo $state["Creatore"] ?></p>
    </footer>
    </div>
</main>