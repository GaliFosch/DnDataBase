<?php
function signalError($message){
    $template["title"] = "ERROR";
    $template["file"] = "errorTempl.php";
    $template["ERR_message"] = $message;
    require("template/base.php");
    exit();
}

function parseImg($image){
    if(isset($_FILES[$image])){
        return file_get_contents($_FILES[$image]['tmp_name']);
    }
    return NULL;
}