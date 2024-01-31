<main>
    <div class="container-registration">
        <div class="wrap-form">
            <form action="#" method="get">
            <div class="form-content">
                <div class="registration-form">

                <span class="registration-form-title"> Registrazione</span>

                            <div class="wrap-input"><label class="hidden" for="name">Nome</label><input type="text" name="name" id="name" placeholder="Nome"/></div>
                        
                            <div class="wrap-input"><label class="hidden" for="surname">Cognome</label><input type="text" name="surname" id="surname" placeholder="Cognome"/></div>
                    
                            <div class="wrap-input"><label class="hidden" for="birthDate">Data di Nascita</label><input  type="date" name="birthdate" id="birthdate" placeholder="Data di nascita"/></div>
                    
                            <div class="wrap-input"><label class="hidden" for="nickname">Nickname*</label><input type="text" name="nickname" id="nickname" placeholder="Nickname*"/></div>
                    
                            <div class="wrap-input"><label class="hidden" ="password">Password</label><input type="password" name="password" id="password" placeholder="Password"/></div>

                            <div class="wrap-input"><label class="hidden" for="invia" hidden></label><input class="button" type="submit" value="Invia"></div>
                </div>
            </div>
            </form>
            <p>*Il nickname sarà il nome con cui gli utenti potranno vederti</p>
            
            <?php
            if(!empty($template["err_REG"])){
                echo "<p>". $template["err_REG"] ."</p>";
                $template["err_REG"] = "";
            }
            ?>
        </div>
     </div>
</main>