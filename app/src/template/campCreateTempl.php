<main>
    <div class="container">
        <form action="" method="get">
            <div class="immagine">
                <label for="img">Selezione immagine:</label>
                <input type="file" id="img" name="img" accept="image/*" required>
                <img id="preview" style="display:none;">
            </div>
            <div class="info">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" 
                onfocus="this.placeholder=''" onblur="this.placeholder='Il nome della tua campagna'"
                placeholder="Il nome della tua campagna" required> <br>

                <label for="mondo">Mondo:</label>
                <input list="mondi" id="mondo" 
                onfocus="this.placeholder=''" onblur="this.placeholder='Dove avviene la tua campagna'"
                placeholder="Dove avviene la tua campagna" required>
                <datalist id="mondi">
                    <?php
                        $sql = "SELECT *
                        FROM Mondo";
                        $stmnt = $db->getConnection()->prepare($sql);
                        $stmnt->execute();
                        $result = $stmnt->get_result();
                        ?>
                        <?php while($mondo = $result->fetch_assoc()) {?>
                            <option value="<?php echo $mondo['Nome'];?>">
                    <?php }?>
                </datalist>

                <div class="desc">
                   <label for="sinossi">Sinossi:</label>
                    <textarea id="sinossi" name="sinossi" 
                        onfocus="this.placeholder=''" onblur="this.placeholder='La trama della tua campagna'"
                        oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' placeholder="La trama della tua campagna" required></textarea> <br>
                    <p class="reminder">*Ricorda che la trama può essere visibile anche ai giocatori. Dovresti quindi descrivere
                        i dettagli principali senza spiegare il piano malefico di Vecna.
                    </p>    
                </div>
                
            </div>
            <input type="submit" id="submit"> 
        </form>

    </div> 
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
</main>
