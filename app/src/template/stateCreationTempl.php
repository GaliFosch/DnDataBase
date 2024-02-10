<main>
    <h2>Crea Stato</h2>
    <form action="#" method="post">
        <ul>
            <li><label for="nome">Nome:</label><input type="text" name="nome" id="nome" required/></li>
            <li><label for="gov">Governo:</label><input type="text" name="gov" id="gov" required/></li>
            <li><label for="architettura">Architettura:</label><input type="text" name="architettura" id="architettura" required/></li>
            <li>
                <label for="ricchezza">Ricchezza</label>
                <select name="ricchezza" id="ricchezza" required>
                    <?php
                        $sql = "SELECT SUBSTRING(COLUMN_TYPE,5) As options 
                                FROM information_schema.COLUMNS 
                                WHERE TABLE_SCHEMA='dndatabase'  
                                    AND TABLE_NAME='Stato' 
                                    AND COLUMN_NAME='Ricchezza'";
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
            </li>
        </ul>
        <textarea name="desc" id="" cols="30" rows="10" required>Inserisci una descrizione</textarea>
        <input type="submit" value="Conferma"/>
    </form>
    <?php
    if(!empty($template["InsertionError"])){
        echo $template["InsertionError"];
        $template["InsertionError"] = "";
    }
    ?>
</main>