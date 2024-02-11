<main>
    <h2>Invito per partecipare a
        <?php echo $campaign["Nome"] ?>
    </h2>
    <p>
        <?php echo $campaign["Creatore"] ?> ti ha invitato a partecipare alla sua campagna!
    </p>
    <form action="?response=accetta#" method="post">
        <select name="pg" id="pg">
            <?php
            $sql = "SELECT p.Nome, p.IDPersonaggio as id 
                    FROM Personaggio as p, Pg 
                    WHERE p.IDPersonaggio = Pg.IDPersonaggio 
                        AND Pg.Creatore = ?
                        AND p.IDPersonaggio NOT IN (SELECT IDPersonaggio 
                                                    FROM Eroe
                                                    WHERE Id_campagna = ?)";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("ii", $_SESSION["user"]["Nickname"], $_GET["campaign"]);
            $stmnt->execute();
            $result = $stmnt->get_result();
            while ($row = $result->fetch_assoc()) {
                ?>
                <option value="<?php echo $row["id"] ?>">
                    <?php echo $row["Nome"] ?>
                </option>
            <?php } ?>
        </select>
        <input type="hidden" name="campaign" id="campaign" value="<?php echo $_GET["campaign"] ?>" />
        <input type="submit" value="Accetta" />
    </form>
    <form action="?response=rifiuto" method="post">
        <input type="hidden" name="campaign" id="campaign" value="<?php echo $_GET["campaign"] ?>" />
        <input type="submit" value="Rifiuta" />
    </form>
</main>