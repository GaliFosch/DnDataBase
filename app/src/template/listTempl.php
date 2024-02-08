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
                    $sql = $sql . " FROM " . $template["table"];
                    $oggetto = $db->getConnection()->query($sql);
                    while($row = $oggetto->fetch_assoc()){
                ?>
                    <tr>
                        <?php foreach($template["columns"] as $col){ ?>
                            <td>
                                <a href="http://localhost/DnDataBase/app/src/frame.php?frame=<?php echo $template["title"]?>&id=<?php echo $row[$template["idname"]]?>#" target="visualizer">
                                <?php echo $row[$col]?>
                                </a>
                            </td>
                        <?php }?>
                    </tr>
                <?php }?>
            </tbody>
        </table>
   
</main>
<aside class="col">
    <iframe src="http://localhost/DnDataBase/app/src/Hello.html" name="visualizer" frameborder="0"></iframe>
</aside>
</div>