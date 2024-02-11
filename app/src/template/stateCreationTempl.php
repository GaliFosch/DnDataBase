<main>
<div class="container">
    <h2>Crea Stato</h2>
    <form action="#" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" onfocus="this.placeholder=''" onblur="this.placeholder='Il nome del tuo stato'"
                placeholder="Il nome del tuo stato" required>
        <label for="gov">Governo:</label>
        <input type="text" name="gov" id="gov" onfocus="this.placeholder=''" onblur="this.placeholder='Il tipo di governo'"
                placeholder="Il tipo di governo" required>
        <label for="architettura">Architettura:</label>
        <input type="text" name="architettura" id="architettura" onfocus="this.placeholder=''" onblur="this.placeholder='Es. Fantasy, Medioevo, Gotico, ...'"
                placeholder="Es. Fantasy, Medioevo, Gotico, ..." required>

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
        
        <label for="desc">Descrizione:</label>
        <textarea name="desc" name="desc" id="desc" onfocus="this.placeholder=''" onblur="this.placeholder='Come è fatto il tuo stato?'"
            oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' placeholder="Come è fatto il tuo stato?" required></textarea>
            <p class="reminder">*Ricorda che la descrizione può essere visibile anche ai giocatori. Dovresti quindi descrivere
                        i dettagli principali senza dire che l'intero stato è governato da Strahd von Zarovich.
            </p> 
        <input type="submit" id="submit" value="Conferma"/>
    </form>
    <?php
    if(!empty($template["InsertionError"])){
        echo $template["InsertionError"];
        $template["InsertionError"] = "";
    }
    ?>
</div>
</main>