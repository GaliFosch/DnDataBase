<main>
    <div class="container">
        <h2>Crea Classe</h2>
        <form action="#" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" onfocus="this.placeholder=''" onblur="this.placeholder='Il nome della tua classe'"
            placeholder="Il nome della tua classe" required>

            <label for="desc">Descrizione:</label>
            <textarea name="desc" id="desc" onfocus="this.placeholder=''" onblur="this.placeholder='La descrizione della tua classe'"
            oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' placeholder="La descrizione della tua classe" required><?php if(!empty($_POST["desc"])){ echo $_POST["desc"];}?></textarea>
            <input type="submit" id="submit" value="Conferma"/>
        </form>
        <?php
        if(!empty($template["ins_Err"])){
            echo "<p>". $template["ins_Err"]."</p>";
            $template["ins_Err"] = "";
        }
        ?>
    </div>
</main>