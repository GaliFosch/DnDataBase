<main>
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
                $sql = $sql . " FROM " . $template["title"];
                $result = $db->getConnection()->query($sql);
                while($row = $result->fetch_assoc()){
            ?>
                <tr>
                    <?php foreach($template["columns"] as $col){ ?>
                        <td>
                            <a href="<?php echo "http://localhost/DnDataBase/app/src/species.php?id=" . $row[$template["idname"]] . "#"?>" target="visualizer">
                            <?php echo $row[$col]?>
                            </a>
                        </td>
                    <?php }?>
                </tr>
            <?php }?>
        </tbody>
    </table>
</main>
<aside>
    <iframe src="http://localhost/DnDataBase/app/src/Hello.html" name="visualizer" frameborder="0"></iframe>
</aside>