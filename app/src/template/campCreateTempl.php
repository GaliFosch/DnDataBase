<main>
    <div class="container">
        <form action="" method="get">
            <div class="immagine">
                <label for="img">Selezione immagine:</label>
                <input type="file" id="img" name="img" accept="image/*">
                <img id="preview" style="display:none;">
            </div>
            <div class="info">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" 
                onfocus="this.placeholder=''" onblur="this.placeholder='Il nome della tua campagna'"
                placeholder="Il nome della tua campagna" required> <br>


                <button class="accordion">Mondo:</button>
                <div class="panel">
                    <?php
                        $sql = "SELECT Nome, Id_mondo as Id
                        FROM Mondo
                        WHERE Creatore = ?";
                        $stmnt = $db->getConnection()->prepare($sql);
                        $stmnt->bind_param("s", $_SESSION["user"]["Nickname"]);
                        $stmnt->execute();
                        $result = $stmnt->get_result();
                    ?>
                    <?php while($mondo = $result->fetch_assoc()) {?>
                        <div class="panelContent">
                            <label for="<?php echo $mondo['Nome'];?>">
                            <a href="world.php?id=<?php echo $mondo["Id"] ?>"><?php echo $mondo['Nome'];?></a></label>
                            <input type="radio" id="<?php echo $mondo['Nome'];?>" value="<?php echo $mondo['Id'];?>" name="mondo" required>
                        </div>
                    <?php }?>
                </div>

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
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
            } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
        }
    </script>

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
