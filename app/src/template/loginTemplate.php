<main>
    <h2>Benvenut*</h2>
    <form action="#" method="get">
        <ul>
            <li>
                <label for="nickname">Nickname</label>
                <input type="text" name="nickname" id="nickname">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
        </ul>
        <input type="submit" value="Login">
    </form>
    <?php
    if(!empty($template["log_ERR"])){
        echo "<p>". $template["log_ERR"] ."</p>";
        $template["log_ERR"] = "";
    }
    ?>
    <p>Non hai un account? <a href="http://localhost/DnDataBase/app/src/register.php">Creane uno</a></p>
</main>