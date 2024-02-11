<main>
    <div class="container">
        <div class="grid podium">
            <?php
                $sql = "SELECT Classe, COUNT(*) as Count 
                        FROM Vocazione 
                        GROUP BY Classe
                        ORDER BY Count DESC";
                $stmnt = $db->getConnection()->prepare($sql);
                $stmnt->execute();
                $result = $stmnt->get_result();
                ?>
                <?php while($row = $result->fetch_assoc()) {?>
                    <div class="position">
                        <p> <?php echo 'Class: ' . $row['Classe'] . ', Occurrences: ' . $row['Count'] . '<br>'?> </p>
                    </div>
                    
                <?php }?>
        </div>
    </div>

    
</main>