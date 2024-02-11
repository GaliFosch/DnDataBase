<main>
    <div class="container registration">
        <?php
            $sql = "SELECT Classe, COUNT(*) as Count FROM Vocazione GROUP BY Classe";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->execute();
            $result = $stmnt->get_result();
            $map = [];
            while ($row = $result->fetch_assoc()) {
                echo 'Class: ' . $row['Classe'] . ', Occurrences: ' . $row['Count'] . '<br>';
                $newItem = [];
                $newItem['Classe'] = $row['Classe'];
                $newItem['Count'] = $row['Count'];
                array_push($map, $newItem);
            }
            $jsonString = json_encode($map);
            ?>
    </div>

    <script type="text/javascript">
        var classesArray = <?php echo $jsonString; ?>;

        console.log(classesArray);
    </script>

    
</main>