<main>
    <div class="container">
        <h2>Crea un invito</h2>
        <form action="#" method="post">
            <select name="player" id="player">
                <?php
                $sql = "SELECT Nickname FROM Giocatore WHERE Nickname <> ?";
                $stmnt = $db->getConnection()->prepare($sql);
                $stmnt->bind_param("s", $_SESSION["user"]["Nickname"]);
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