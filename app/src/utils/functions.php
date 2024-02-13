<?php
function signalError($message){
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["style"] = "error.css";
    $template["ERR_message"] = $message;
    require("template/base.php");
    exit();
}

function parseImg($image){
    if(isset($_FILES[$image]) && !empty($_FILES[$image]['tmp_name'])){
        return file_get_contents($_FILES[$image]['tmp_name']);
    }
    return NULL;
}