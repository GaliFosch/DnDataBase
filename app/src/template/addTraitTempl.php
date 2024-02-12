<div class="container">
    <h2>Aggiungi un tratto</h2>
    <main class="col">   
            <table>
                <thead >
                    <?php
                        $template["columns"] = ["Nome", "Descrizione", "Creatore"];
                        foreach($template["columns"] as $c){
                            echo "<th>". $c ."</th>";
                        }
                    ?>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT DISTINCT Tratti.IDTratto, Nome, Descrizione, Creatore FROM Tratti LEFT OUTER JOIN Tratto ON Tratti.IDTratto = Tratto.IDTratto WHERE IdSpecie <> ? OR IdSpecie IS null";
                        $stmnt = $db->getConnection()->prepare($sql);
                        $stmnt->bind_param("i", $_SESSION["Hid"]);
                        $stmnt->execute();
                        $oggetto = $stmnt->get_result();
                        while($row = $oggetto->fetch_assoc()){
                    ?>
                        <tr>
                            <?php foreach($template["columns"] as $col){ ?>
                                <td class="td trait">
                                    <a href="http://localhost/DnDataBase/app/src/frame.php?frame=Tratto&id=<?php echo $row["IDTratto"]?>#" target="visualizer">
                                    <?php echo $row[$col]?>
                                    </a>
                                </td>
                            <?php }?>
                            <td class="add">
                                <a href="homebrew.php?type=specie&addTrait=<?php echo $row["IDTratto"]?>">Aggiungi</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
    </main>
    <aside class="trait">
        <iframe src="http://localhost/DnDataBase/app/src/Hello.html" name="visualizer" frameborder="0"></iframe>
    </aside>
</div>
