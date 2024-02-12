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
            <a href="index.php">Home</a> 
            <a href="statistic.php">Statistiche</a>
            <a href="list.php?listName=specie#">Specie</a>
            <a href="list.php?listName=oggetti#">Oggetti</a>
            <a href="class.php?action=list">Classe</a>
        </nav>

        <?php require($template["file"])?>
    </body>
</html>