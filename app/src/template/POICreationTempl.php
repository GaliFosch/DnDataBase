<main>
<div class="container">
    <h2>Crea un Luogo d'Interesse</h2>
    <form action="#" method="post">
        <div class="info poi">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" onfocus="this.placeholder=''" onblur="this.placeholder='Il nome del luogo'"
                placeholder="Il nome del luogo" required> 
            <label for="type">Tipologia</label>
            <input type="text" name="type" id="type" onfocus="this.placeholder=''" onblur="this.placeholder='Es. Città, Taverna, Dungeon, ...'"
                placeholder="Es. Città, Taverna, Dungeon, ..." required>
        </div>
        
        <div class="desc">
            <label for="desc">Descrizione</label>
            <textarea name="desc" id="desc" onfocus="this.placeholder=''" onblur="this.placeholder='Come è fatto questo luogo?'"
            oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' placeholder="Come è fatto questo luogo?" required></textarea>
            <p class="reminder">*Ricorda che la descrizione può essere visibile anche ai giocatori. Dovresti quindi descrivere
                        i dettagli principali senza dire che Asmodeus comanda tutti gli abitanti della città.
            </p> 
        </div>
        <input type="submit" id="submit" value="Conferma"/>
    </form>
</div>
</main>