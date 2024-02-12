<main>
    <h2><?php echo $scene["Nome"] ?></h2>
    <p><a href="session.php?date=<?php echo $scene["Data_Sessione"]?>&Id_campagna=<?php echo $scene["Id_campagna"]?>"><?php echo $scene["Data_Sessione"]?></a></p>
    <?php
    $sql = "SELECT Nome FROM Luogo_D_Interesse WHERE Id_Luogo_d_interesse = ?";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("i", $scene["Id_luogo_d_interesse"]);
    $stmnt->execute();
    $lint = $stmnt->get_result()->fetch_assoc();
    ?>
    <p>Ambientazione: <?php echo $lint["Nome"] ?></p>
    <section>
        <h3>Descrizione</h3>
        <p><?php echo $scene["Descrizione"]?></p>
    </section>
</main>