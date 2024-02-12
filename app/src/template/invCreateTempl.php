<main>
    <div class="container">
        <h2>Crea un invito</h2>
        <form action="#" method="post">
            <select name="player" id="player">
                <?php
                $sql = "SELECT Nickname 
                        FROM Giocatore 
                        WHERE Nickname <> ?
                            AND Nickname NOT IN (SELECT Nickname
                                                FROM Invito
                                                WHERE Id_campagna = ?)
                            and Nickname NOT IN (SELECT Creatore
                                                FROM Eroe, Pg
                                                WHERE Pg.IDPersonaggio = Eroe.IDPersonaggio
                                                    AND Id_campagna = ?)";
                $stmnt = $db->getConnection()->prepare($sql);
                $stmnt->bind_param("sii", $_SESSION["user"]["Nickname"],$_GET["campaign"],$_GET["campaign"]);
                $stmnt->execute();
                $result = $stmnt->get_result();
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row["Nickname"] ?>">
                        <?php echo $row["Nickname"] ?>
                    </option>
                <?php } ?>
            </select>
            <input type="hidden" name="campaign" id="campaign" value="<?php echo $_GET["campaign"] ?>" />
            <input type="submit" id="submit" value="Invia" />
        </form>
    </div>
</main>