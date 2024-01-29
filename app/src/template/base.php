<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $template["title"]?></title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <header>
            <h1>DnDatabase</h1>
        </header>
        <?php require($template["file"])?>
    </body>
</html>