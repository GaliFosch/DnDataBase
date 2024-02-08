<?php
if(!empty($_POST) && empty($_SESSION["Hid"])){
    $sql = "INSERT INTO Specie(Nome, Descrizione, Creatore) 
            VALUES(?, ?, ?)";
    $stmnt = $db->getConnection()->prepare($sql);
    $temp = "WOC";
    $stmnt->bind_param("sss", $_POST["nome"], $_POST["desc"], $temp);
    $stmnt->execute();
    $_SESSION["Hid"] = $stmnt->insert_id;
}
if(empty($_SESSION["Hid"])){
?>
<main>
    <h2>Crea Specie</h2>
    <section>
        <form action="#" method="post">
            <label for="nome">Nome</label><input type="text" name="nome" id="nome"/>
            <label for="desc">Descrizione</label><br/>
            <textarea name="desc" id="desc" cols="30" rows="10">Inserisci la descrizione</textarea>
            <input type="submit" value="Conferma"/>
        </form>
    </section>
</main>
<?php 
} else{
    $sql = "SELECT * FROM Specie WHERE IdSpecie = ?";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("i", $_SESSION["Hid"]);
    $stmnt->execute();
    $specie = $stmnt->get_result()->fetch_assoc();
?>
<main>
    <h2><?php echo $specie["Nome"]?></h2>
    <p><?php echo $specie["Descrizione"]?></p>
    <section>
        <h3>Tratti</h3>
        <?php
        $sql = "SELECT * FROM Tratto INNER JOIN TRATTI ON Tratto.IDTratto = TRATTI.IDTratto WHERE IdSpecie = ?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("i", $_SESSION["Hid"]);
        $stmnt->execute();
        $result = $stmnt->get_result();
        ?>
        <table>
            <tr>
                <th>Nome</th>
                <th>Creatore</th>
            </tr>
            <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row["Nome"] ?></td>
                    <td><?php echo $row["Creatore"] ?></td>
                </tr>
            <?php }?>
        </table>
    </section>
</main>
<?php }?>