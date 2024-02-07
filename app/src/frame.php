<?php
require_once("bootstrap.php");
if(!isset($_GET["frame"])){
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["ERR_message"] = "Frame not setted";
    require("template/base.php");
}if(!isset($_GET["id"])){
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["ERR_message"] = "Element id not setted";
    require("template/base.php");
} else {
    require("frames/" . $_GET["frame"] . ".php");
}