<?php
require_once("bootstrap.php");
if(!empty($_GET["id"])){
    $_SESSION["Hid"] = $_GET["id"];
}
$template["title"] = "Homebrew Specie";
$template["file"] = "homebrewSpecieTempl.php";

require_once("template/base.php");