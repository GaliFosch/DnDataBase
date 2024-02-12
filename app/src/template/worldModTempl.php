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