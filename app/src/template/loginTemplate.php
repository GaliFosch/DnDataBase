<main>
    <div class="container login">

        <div class="cover">
            <img src="..\..\images\loginImage.jpg" alt="Ai generated image of a typical Dungeons & Dragons campaign.">
        </div>

        <div class="wrap-form">

            <form action="#" method="post">

                <div class="form-content">

                    <div class="form">
                        <span class="title login"> Benvenut*</span>

                        <div class="wrap-input">
                                <label class="hidden" for="nickname">Nickname</label>
                                <input type="text" name="nickname" id="nickname" placeholder="Nickname" required>
                        </div>

                        <div class="wrap-input">
                            <label class="hidden" for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                        </div>
                        <input class="button" type="submit" value="Login">
                    </div>

                </div>

            </form>
            <?php
            if(!empty($template["log_ERR"])){
                echo "<p>". $template["log_ERR"] ."</p>";
                $template["log_ERR"] = "";
            }
            ?>
            <p>Non hai un account? <a href="http://localhost/DnDataBase/app/src/registration.php">Creane uno</a></p>
        </div>

    </div>
</main>