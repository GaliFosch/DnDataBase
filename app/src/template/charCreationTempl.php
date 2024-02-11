<main>
<?php if(empty($_POST["action"])){?>
    <h2>Creazione Personaggio</h2>
    <form action="#" method="post">
        <label for="nome">Nome:</label><input type="text" name="nome" id="nome" required>
        <label for="allineamento">Allineamento:</label><select name="allineamento" id="allineamento" required>
            <?php
            $sql = "SELECT SUBSTRING(COLUMN_TYPE,5) As options 
                    FROM information_schema.COLUMNS 
                    WHERE TABLE_SCHEMA='dndatabase'  
                        AND TABLE_NAME='Personaggio' 
                        AND COLUMN_NAME='Allineamento'";
            $result = $db->getConnection()->query($sql);
            $string = $result->fetch_assoc()["options"];
            $string = trim($string, "()");
            $values = explode(",", $string);
            foreach ($values as $v){
                $vt = trim($v, "'");
                ?>
            <option value="<?php echo $vt?>"><?php echo $vt?></option>
            <?php }?>
        </select>
        <label for="taglia">Taglia:</label><select name="taglia" id="taglia" required>
            <?php
            $sql = "SELECT SUBSTRING(COLUMN_TYPE,5) As options 
                    FROM information_schema.COLUMNS 
                    WHERE TABLE_SCHEMA='dndatabase'  
                        AND TABLE_NAME='Personaggio' 
                        AND COLUMN_NAME='Taglia'";
            $result = $db->getConnection()->query($sql);
            $string = $result->fetch_assoc()["options"];
            $string = trim($string, "()");
            $values = explode(",", $string);
            foreach ($values as $v){
                $vt = trim($v, "'");
                ?>
            <option value="<?php echo $vt?>"><?php echo $vt?></option>
            <?php }?>
        </select>
        <label for="ca">Classe Armatura:</label><input type="number" name="ca" id="ca" required/>
        <label for="PP">Percezione Passiva:</label><input type="number" name="PP" id="PP" required/>
        <label for="pf">Punti Ferita:</label><input type="number" name="pf" id="pf" required/>
        <label for="Forza">Forza</label><input type="number" name="Forza" id="Forza"/>
        <label for="Destrezza">Destrezza</label><input type="number" name="Destrezza" id="Destrezza"/>
        <label for="Costituzione">Costituzione</label><input type="number" name="Costituzione" id="Costituzione"/>
        <label for="Intelligenza">Intelligenza</label><input type="number" name="Intelligenza" id="Intelligenza"/>
        <label for="Saggezza">Saggezza</label><input type="number" name="Saggezza" id="Saggezza"/>
        <label for="Carisma">Carisma</label><input type="number" name="Carisma" id="Carisma"/>
        <label for="desc">Descrizione:</label>
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Inserisci descrizione" required></textarea>
        <input type="hidden" name="action" value="species"/>
        <input type="submit" value="Continua"/>
    </form>
<?php }elseif($_POST["action"]=="species"){?>
    <h2>Scegli una razza</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Creatore</th>
        </tr>
        <?php
        $sql="SELECT IdSpecie, Nome, Creatore FROM Specie";
        $result = $db->getConnection()->query($sql);
        while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row["Nome"]?></td>
            <td><?php echo $row["Creatore"]?></td>
            <td>
                <form action="#" method="post">
                    <input type="hidden" name="action" value="class"/>
                    <input type="hidden" name="specie" value="<?php echo $row["IdSpecie"]?>"/>
                    <input type="submit" value="Scegli">
                </form>
            </td>
        </tr>
        <?php }?>
    </table>
<?php }elseif($_POST["action"]=="class"){?>
    <h2>Scegli una classe</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Creatore</th>
        </tr>
        <?php
        $sql="SELECT Nome, Creatore FROM Classe";
        $result = $db->getConnection()->query($sql);
        while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row["Nome"]?></td>
            <td><?php echo $row["Creatore"]?></td>
            <td>
                <form action="#" method="post">
                    <input type="hidden" name="action" value="subclass"/>
                    <input type="hidden" name="class" value="<?php echo $row["Nome"]?>"/>
                    <input type="submit" value="Scegli">
                </form>
            </td>
        </tr>
        <?php }?>
    </table>
<?php }elseif($_POST["action"]=="subclass"){?>
    <h2>Scegli una sottoclasse</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Creatore</th>
        </tr>
        <?php
        $sql = "SELECT Nome, Creatore FROM Sotto_Classe WHERE Classe = ?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("s", $_SESSION["creaPg"]["class"]);
        $stmnt->execute();
        $result = $stmnt->get_result();
        while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row["Nome"]?></td>
            <td><?php echo $row["Creatore"]?></td>
            <td>
                <form action="#" method="post">
                    <input type="hidden" name="action" value="complete"/>
                    <input type="hidden" name="subclass" value="<?php echo $row["Nome"]?>"/>
                    <input type="submit" value="Scegli">
                </form>
            </td>
        </tr>
        <?php }?>
    </table>
<?php }?>
</main>