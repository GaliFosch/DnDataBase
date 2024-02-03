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
                $sql = "SELECT " . $template["columns"][0] . ", ";
                for($i = 1; $i<count($template["columns"]); $i++){
                    $sql = ", " . $sql . $template["columns"][$i];
                }
                $sql = $sql . " FROM " . $template["title"];
                $result = $db->getConnection()->execute($sql);
                while($row = $result->fetch_array(MYSQLI_NUM)){
            ?>
                <tr>
                    <?php
                        foreach($row as $val){
                            echo "<tr>".$val."</tr>";
                        }
                    ?>
                </tr>
            <?php }?>
        </tbody>
    </table>
</main>