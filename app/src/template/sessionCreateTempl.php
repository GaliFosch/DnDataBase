<main>
<div class="container">
    <h2>Crea una nuova Sessione</h2>
    <form action="#" method="post">
        <div class="info">
            <label class="hidden" for="date">Data della sessione:</label>
            <input  type="date" name="date" id="date" placeholder="Data della sessione"/></div>
        <div class="desc">
            <label for="desc">Descrizione:</label>
            <textarea name="desc" id="desc" onfocus="this.placeholder=''" onblur="this.placeholder='Come succede nella sessione?'"
            oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' placeholder="Cosa succede nella sessione?" required></textarea>
            <p class="reminder">*Ricorda che la sessione può essere visibile anche ai giocatori. Dovresti quindi descrivere
                        i dettagli principali senza dire che avverrà un TPK;
            </p> 
        </div>
        <?php 
            if(!empty($template["InsertionError"])) {
                echo $template["InsertionError"];
                $template["InsertionError"] = '';
            }
        ?>
        <input type="submit" id="submit" value="Conferma"/>
    </form>
</div>
</main>