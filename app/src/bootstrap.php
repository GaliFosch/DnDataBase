<?php
require_once("db/Database.php");
$db = new Database();
session_start();

function signalError($message){
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["ERR_message"] = $_GET["name"] . " doesn't exist in world_id =" . $_GET["worldId"];
    require("template/base.php");
    exit();
}