<?php if(isset($action) && $action="chooseLint"){?>
    <main>
        <h2>Scegli Un'ambientazione</h2>
        <table>
            <tr>
                <td>Nome</td>
                <td>Tipologia</td>
                <td>Appartiene</td>
                <td>Stato</td>
            </tr>
            <?php
            $sql="SELECT l.Id_luogo_d_interesse as id, l.Nome, l.Tipologia, app.Nome as Appartiene, l.Stato 
                    FROM Luogo_D_Interesse l LEFT JOIN Luogo_D_Interesse app ON l.Appartiene = app.Id_luogo_d_interesse, Campagna
                    WHERE l.Mondo = Campagna.Id_mondo
                        AND Campagna.Id_campagna=?";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("i", $_SESSION["createScene"]["campagna"]);
            $stmnt->execute();
            $result = $stmnt->get_result();
            while($row = $result->fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $row["Nome"]?></td>
                    <td><?php echo $row["Tipologia"]?></td>
                    <td><?php if(empty($row["Appartiene"])){
                            echo "----------";
                        }else{
                            echo $row["Appartiene"];
                        }?></td>
                    <td><?php echo $row["Stato"]?></td>
                    <td>
                        <form action="#" method="post">
                            <input type="hidden" id="lint" name="lint" value="<?php echo $row["id"]?>"/>
                            <input type="submit" value="Seleziona"/>
                        </form>
                    </td>
                </tr>
            <?php }?>
        </table>
    </main>
<?php }else{?>
    <main>
        <h2>Crea Scena</h2>
        <form action="?#" method="post">
            <label for="nome">Nome:</label><input type="text" name="nome" id="nome" required/>
            <label for="desc">Descrizione</label>
            <textarea name="desc" id="desc" cols="30" rows="10" required></textarea>
            <input type="hidden" name="campagna" value="<?php echo $_GET["campagna"]?>">
            <input type="hidden" name="data" value="<?php echo $_GET["data"]?>">
            <input type="submit" value="Continua"/>
        </form>
    </main>
<?php }?>