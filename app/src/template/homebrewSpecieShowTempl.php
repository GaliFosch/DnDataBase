<div class="container">
    <main class="col">
        <table>
            <thead>
                <?php
                    foreach($template["columns"] as $c){
                        echo "<th>". $c ."</th>";
                    }
                ?>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT ". $template["idname"] . ", " . $template["columns"][0];
                    for($i = 1; $i<count($template["columns"]); $i++){
                        $sql = $sql . ", " . $template["columns"][$i];
                    }
                    $sql = $sql . " FROM " . $template["table"] . " WHERE Creatore = ?";
                    $stmnt = $db->getConnection()->prepare($sql);
                    $stmnt->bind_param("s", $_SESSION["user"]["Nickname"]);
                    $stmnt->execute();
                    $oggetto = $stmnt->get_result();
                    while($row = $oggetto->fetch_assoc()){
                ?>
                    <tr>
                        <?php foreach($template["columns"] as $col){ ?>
                            <td>
                                <a href="http://localhost/DnDataBase/app/src/frame.php?frame=Specie&id=<?php echo $row[$template["idname"]]?>#" target="visualizer">
                                <?php echo $row[$col]?>
                                </a>
                            </td>
                        <?php }?>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        <a href="?type=specie&action=create"><button>Crea Nuova</button></a>
</main>
<aside class="col">
    <iframe src="http://localhost/DnDataBase/app/src/Hello.html" name="visualizer" frameborder="0"></iframe>
</aside>
</div>