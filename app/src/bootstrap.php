<?php
require_once("db/Database.php");
$db = new Database();
session_start();

function signalError($message){
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["ERR_message"] = $message;
    require("template/base.php");
    exit();
}