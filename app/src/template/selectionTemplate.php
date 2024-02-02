<main>
    <div class="selection-wrap">
        <div class="selection-title">
            <?php echo "<h1 class='benvenuto-title'>Benvenut* ".$_SESSION["user"]["Nickname"]."</h1>"?>
            <p>Scegli da dove cominciare!</p>
        </div>
        <div class="selection-container">
            <div class="selection-image player">
                <a href="http://localhost/DnDataBase/app/src/index.php?mode=player#">
                    <img src="..\..\images\player.jpg" alt=""/>
                    <p>Player</p>
                </a>
            </div>
            <div class="middle"></div>
            <div class="selection-image master">
                <a href="http://localhost/DnDataBase/app/src/index.php?mode=dm#">
                    <img src="..\..\images\dungeon-master.jpg" alt=""/>
                    <p>Dungeon Master</p>
                </a>
            </div>
        </div>
    </div>
</main>