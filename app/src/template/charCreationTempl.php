<main>
<?php if(empty($_POST["action"])){?>
    <div class="container ">
    <h2>Creazione Personaggio</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" onfocus="this.placeholder=''" onblur="this.placeholder='Il nome del tuo personaggio'"
            placeholder="Il nome del tuo personaggio" required>
        <label for="img">Immagine</label><input type="file" name="img" id="img"/>
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
            <label for="ca">Classe Armatura:</label>
            <input type="number" name="ca" id="ca"  onfocus="this.placeholder=''" onblur="this.placeholder='La classe armatura del personaggio'"
                placeholder="La classe armatura del personaggio" required>

            <label for="PP">Percezione Passiva:</label>
            <input type="number" name="PP" id="PP"  onfocus="this.placeholder=''" onblur="this.placeholder='La percezione passiva del personaggio'"
                placeholder="La percezione passiva del personaggio" required>

            <label for="pf">Punti Ferita:</label>
            <input type="number" name="pf" id="pf"  onfocus="this.placeholder=''" onblur="this.placeholder='I punti ferita del personaggio'"
                placeholder="I punti ferita del personaggio" required>
            <div class="stats">

                <div class="wrap">
                    <label for="Forza">Forza</label>
                    <input type="number" name="Forza" id="Forza" onfocus="this.placeholder=''" onblur="this.placeholder='10'"
                placeholder="10">
                </div>

                <div class="wrap">
                <label for="Destrezza">Destrezza</label>
                <input type="number" name="Destrezza" id="Destrezza"onfocus="this.placeholder=''" onblur="this.placeholder='10'"
                placeholder="10">
                </div>

                <div class="wrap">
                    <label for="Costituzione">Costituzione</label>
                    <input type="number" name="Costituzione" id="Costituzione"onfocus="this.placeholder=''" onblur="this.placeholder='10'"
                placeholder="10">
                </div>

                <div class="wrap">
                    <label for="Intelligenza">Intelligenza</label>
                    <input type="number" name="Intelligenza" id="Intelligenza"onfocus="this.placeholder=''" onblur="this.placeholder='10'"
                placeholder="10">
                </div>

                <div class="wrap">
                    <label for="Saggezza">Saggezza</label>
                    <input type="number" name="Saggezza" id="Saggezza"onfocus="this.placeholder=''" onblur="this.placeholder='10'"
                placeholder="10">
                </div>

                <div class="wrap">
                    <label for="Carisma">Carisma</label>
                    <input type="number" name="Carisma" id="Carisma"onfocus="this.placeholder=''" onblur="this.placeholder='10'"
                placeholder="10">
                </div>

            </div>
           

            <label for="desc">Descrizione:</label>
            <textarea name="desc" id="desc" onfocus="this.placeholder=''" onblur="this.placeholder='La descrizione del tuo personaggio'"
                        oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' placeholder="La descrizione del tuo personaggio" required></textarea>
            <input type="hidden" name="action" value="species"/>
            <input type="submit" id="submit" value="Continua"/>
        </form>
    </div>




    
    <?php }elseif($_POST["action"]=="species"){?>
        <div class="container ">
        <h2>Scegli una razza</h2>
        <div class="race">
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
                    <td class="scegli">
                        <form action="#" method="post">
                            <input type="hidden" name="action" value="class"/>
                            <input type="hidden" name="specie" value="<?php echo $row["IdSpecie"]?>"/>
                            <input type="submit" id="scelta" value="Scegli">
                        </form>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>

    
    <?php }elseif($_POST["action"]=="class"){?>
        <div class="container ">
        <h2>Scegli una classe</h2>
        <div class="class">
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
                    <td class="scegli">
                        <form action="#" method="post">
                            <input type="hidden" name="action" value="subclass"/>
                            <input type="hidden" name="class" value="<?php echo $row["Nome"]?>"/>
                            <input type="submit" id="scelta" value="Scegli">
                        </form>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>

    
    <?php }elseif($_POST["action"]=="subclass"){?>
    <div class="container ">
        <h2>Scegli una sottoclasse</h2>
        <div class="class">
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
                    <td class="scegli">
                        <form action="#" method="post">
                            <input type="hidden" name="action" value="complete"/>
                            <input type="hidden" name="subclass" value="<?php echo $row["Nome"]?>"/>
                            <input type="submit" id="scelta" value="Scegli">
                        </form>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
    <?php }?>
    </div>
</main>