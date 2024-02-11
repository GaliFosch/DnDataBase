<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $template["title"]?></title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="css\base.css">
        <?php
            if(!empty($template["style"])){
                echo "<link href=\"". "css/" . $template["style"] ."\" type=\"text/css\" rel=\"stylesheet\" />";
            }
        ?>
    </head>
    <body>
        <header class="header">
            <h1>DnDatabase</h1>
        </header>

        <nav>
            <a href="http://localhost/DnDataBase/app/src/index.php">Home</a> 
            <a href="http://localhost/DnDataBase/app/src/statistic.php">Statistiche</a> 
            <a href="#">Database</a> 
            <a href="http://localhost/DnDataBase/app/src/list.php?listName=specie#">Specie</a>
            <a href="http://localhost/DnDataBase/app/src/list.php?listName=oggetti#">Oggetti</a>
            <a href="#">Classe</a>
        </nav>

        <?php require($template["file"])?>
    </body>
</html>