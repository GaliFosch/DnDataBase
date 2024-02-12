<main>
    <h2>Crea Classe</h2>
    <form action="#" method="post">
        <label for="nome">Nome:</label><input type="text" name="nome" id="nome" required/>
        <label for="desc">Descrizione:</label>
        <textarea name="desc" id="desc" cols="30" rows="10" required>
        <?php if(!empty($_POST["desc"])){
            echo $_POST["desc"];
        }?>
        </textarea>
        <input type="submit" value="Conferma"/>
    </form>
    <?php
    if(!empty($template["ins_Err"])){
        echo "<p>". $template["ins_Err"]."</p>";
        $template["ins_Err"] = "";
    }
    ?>
</main>