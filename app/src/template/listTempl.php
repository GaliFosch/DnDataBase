<main>
    <table>
        <thead>
            <?php
                $sql = "SELECT `COLUMN_NAME` 
                FROM `INFORMATION_SCHEMA`.`COLUMNS` 
                WHERE `TABLE_SCHEMA`='dndatabase' 
                    AND `TABLE_NAME`= ?;";
                $stmnt = $db->getConnection()->prepare($sql);
                $stmnt->bind_param("s", $template["title"]);
                $stmnt->execute();
                $result = $stmnt->get_result();
                while($row = $result->fetch_array(MYSQLI_NUM)){
                    echo "<th>". $row[0] ."</th>"; 
                }
                ?>
        </thead>
        <tbody>
        </tbody>
    </table>
</main>