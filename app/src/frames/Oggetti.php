<!DOCTYPE html>
<html>
    <head>
        <title>Oggetto</title>
        <link rel="stylesheet" href="css\frame.css">
    </head>
    <body>
        <?php
        $sql = "SELECT * FROM oggetto WHERE Id_oggetto=?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("i",$_GET["id"]);
        $stmnt->execute();
        $oggetto = $stmnt->get_result()->fetch_assoc();
        ?>
        <h1><?php echo $oggetto["Nome"]?></h1>
        <section>
            <table>
                <tr>
                    <th>Costo</th>
                    <td><?php echo $oggetto["Costo"]?></td>
                </tr>
                <tr>
                    <th>Peso</th>
                    <td><?php echo $oggetto["Peso"]?></td>
                </tr>
                <tr>
                    <th>Categoria</th>
                    <td><?php echo $oggetto["Categoria"]?></td>
                </tr>
                <tr>
                    <th>Rarità</th>
                    <td><?php echo $oggetto["Rarita"]?></td>
                </tr>
                <?php
                $sql = "SELECT * FROM Armatura WHERE Id_oggetto=?";
                $stmnt = $db->getConnection()->prepare($sql);
                $stmnt->bind_param("i",$_GET["id"]);
                $stmnt->execute();
                $result = $stmnt->get_result();
                if($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <th>CA</th>
                    <td><?php echo $row["Classe_armatura"]?></td>
                </tr>
                <tr>
                    <th>Forza richiesta</th>
                    <td><?php echo $row["Forza_richiesta"]?></td>
                </tr>
                <tr>
                    <th>SV Furtività</th>
                    <td><?php echo $row["Svantaggio_furtivita"]?></td>
                </tr>
                <?php }?>
            </table>
        </section>
        <?php
        $sql = "SELECT Proprieta FROM caratteristica  WHERE Id_oggetto=?";
        $stmnt = $db->getConnection()->prepare($sql);
        $stmnt->bind_param("i",$_GET["id"]);
        $stmnt->execute();
        $result = $stmnt->get_result();
        if($result->num_rows>0){
        ?>
        <section>
            <h2>Proprietà:</h2>
            <ul>
                <?php while($row = $result->fetch_assoc()){?>
                    <li><?php echo $row["Proprieta"] ?></li>
                <?php }?>
            </ul>
        </section>
        <?php } ?>
        <section>
            <h2>Descrizione</h2>
            <p><?php echo $oggetto["Descrizione"]?></p>
        </section>
        <?php 
        if(!empty($oggetto["Id_effetto-magico"])){
            $sql = "SELECT Descrizione FROM effetto_magico WHERE Id_effetto_magico=?";
            $stmnt = $db->getConnection()->prepare($sql);
            $stmnt->bind_param("i", $oggetto["Id_oggetto_magico"]);
            $stmnt->execute();
            $effMagico = $stmnt->get_result()->fetch_assoc();
        ?>
        <h2>Effetto Magico</h2>
        <p><?php echo $effMagico["Descrizione"] ?></p>
        <section>

        </section>
        <?php }?>
    </body>
</html>