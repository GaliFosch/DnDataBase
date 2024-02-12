<main>
<div class="container">
    <h2>Crea un nuovo Mondo</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="info">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" onfocus="this.placeholder=''" onblur="this.placeholder='Il nome del tuo mondo'"
                placeholder="Il nome del tuo mondo" required> 
            <label for="ambientazione">Ambientazione</label>
            <input type="text" name="ambientazione" id="ambientazione" onfocus="this.placeholder=''" onblur="this.placeholder='Es. Fantasy, Sci-fi, Steampunk, ...'"
                placeholder="Es. Fantasy, Sci-fi, Steampunk, ..." required> 
        </div>
        <label for="img">Immagine:</label><input type="file" name="img" id="img"/>
        <img id="preview" style="display:none;">
        <div class="desc">
            <label for="desc">Descrizione:</label>
            <textarea name="desc" id="desc" onfocus="this.placeholder=''" onblur="this.placeholder='Come è fatto il tuo mondo?'"
            oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' placeholder="Come è fatto il tuo mondo?" required></textarea>
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