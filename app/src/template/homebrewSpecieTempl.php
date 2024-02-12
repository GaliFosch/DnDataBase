<?php
if(!empty($_POST) && empty($_SESSION["Hid"])){
    $sql = "INSERT INTO Specie(Nome, Descrizione, Creatore) 
            VALUES(?, ?, ?)";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("sss", $_POST["nome"], $_POST["desc"], $_SESSION["user"]["Nickname"]);
    $stmnt->execute();
    $_SESSION["Hid"] = $stmnt->insert_id;
}
if(empty($_SESSION["Hid"])){
?>
<main>
    <div class="container home">
        <h2>Crea Specie</h2>
        <section>
            <form action="#" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" onfocus="this.placeholder=''" onblur="this.placeholder='Il nome della tua specie'"
                placeholder="Il nome della tua specie" required>

                <label for="desc">Descrizione</label>
                <textarea name="desc" id="desc" onfocus="this.placeholder=''" onblur="this.placeholder='La descrizione della tua specie'"
                        oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' placeholder="La descrizione della tua specie" required></textarea>
                <input type="submit" id="submit" value="Conferma"/>
            </form>
        </section>
    </div>
</main>
<?php 
} else{
    if(!empty($_GET["addTrait"])){
        $sql="SELECT * FROM Tratto WHERE IdSpecie = ? AND IDTratto = ?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("ii", $_SESSION["Hid"], $_GET["addTrait"]);
        $stmnt->execute();
        if(!$stmnt->get_result()->num_rows>0){
            $sql="INSERT INTO Tratto(IdSpecie,IDTratto) VALUES(?,?)";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("ii", $_SESSION["Hid"], $_GET["addTrait"]);
            $stmnt->execute();
        }
    }
    $sql = "SELECT * FROM Specie WHERE IdSpecie = ?";
    $stmnt = $db->getConnection()->prepare($sql);
    $stmnt->bind_param("i", $_SESSION["Hid"]);
    $stmnt->execute();
    $specie = $stmnt->get_result()->fetch_assoc();
?>
<main>
<div class="container trait">
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
        <button id="add">Aggiungi</button>
        <script src="js/addTrait.js"></script>
    </section>
</div>
</main>
<?php }?>