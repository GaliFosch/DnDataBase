<main>
<div class="container">
    <h2>Crea un nuovo Mondo</h2>
    <form action="#" method="post">
        <div class="info">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" onfocus="this.placeholder=''" onblur="this.placeholder='Il nome del tuo mondo'"
                placeholder="Il nome del tuo mondo" required> <br>
            <label for="ambientazione">Ambientazione</label>
            <input type="text" name="ambientazione" id="ambientazione" onfocus="this.placeholder=''" onblur="this.placeholder='Es. Fantasy, Sci-fi, Steampunk, ...'"
                placeholder="Es. Fantasy, Sci-fi, Steampunk, ..." required> <br>
        </div>
        <div class="desc">
            <label for="desc">Descrizione:</label>
            <textarea name="desc" id="desc" onfocus="this.placeholder=''" onblur="this.placeholder='Come è fatto il tuo mondo?'"
            oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' placeholder="Come è fatto il tuo mondo?" required></textarea>
            <p class="reminder mondo">*Ricorda che la descrizione può essere visibile anche ai giocatori. Dovresti quindi descrivere
                        i dettagli principali senza dire dove si trova il covo di Tiamat.
            </p> 
        </div>
        <input type="submit" id="submit" value="Conferma"/>
    </form>
</div>
</main>