<main>
    <h2>Creazione Personaggio</h2>
    <form action="#" method="post">
        <label for="nome">Nome:</label><input type="text" name="nome" id="nome">
        <label for="allineamento">Allineamento:</label><select name="allineamento" id="allineamento">
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
        <label for="taglia">Taglia:</label><select name="taglia" id="taglia">
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
        <label for="ca">Classe Armatura:</label><input type="number" name="ca" id="ca"/>
        <label for="PP">Percezione Passiva:</label><input type="number" name="PP" id="PP"/>
        <label for="pf">Punti Ferita:</label><input type="number" name="pf" id="pf"/>
        <label for="desc">Descrizione:</label>
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Inserisci descrizione"></textarea>
    </form>
</main>