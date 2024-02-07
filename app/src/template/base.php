<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $template["title"]?></title>
        <meta charset="UTF-8"/>
        <!-- qui va il link del css Grossoh più GROSSOH -->
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
        <?php require($template["file"])?>
    </body>
</html>