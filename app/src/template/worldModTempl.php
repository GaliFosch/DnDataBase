<main>
    <div class="container">
        <h2>Crea un nuovo Mondo</h2>
        <form action="#" method="post">
            <div class="info">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?php echo $world["Nome"]?>" required> 
                <label for="ambientazione">Ambientazione</label>
                <input type="text" name="ambientazione" id="ambientazione" value="<?php echo $world["Ambientazione"]?>" required> 
            </div>
            <label for="img">Immagine:</label><input type="file" name="img" id="img"/>
            <?php if(!empty($world["Immagine"])){?>
                <img id="preview" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($world['Immagine']); ?>" />
            <?php }else{?>
                <img id="preview" style="display:none;">
            <?php }?>
            <div class="desc">
                <label for="desc">Descrizione:</label>
                <textarea name="desc" id="desc"
                oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'  required><?php echo $world["Descrizione"]?></textarea>
                <p class="reminder">*Ricorda che la descrizione può essere visibile anche ai giocatori. Dovresti quindi descrivere
                            i dettagli principali senza dire dove si trova il covo di Tiamat.
                </p> 
            </div>
            <input type="submit" id="submit" value="Conferma"/>
        </form>
    </div>
</main>
<script>
    document.getElementById('img').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.getElementById('preview');
            preview.src = e.target.result;
            preview.style.display = 'block'; // Show the image
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>   