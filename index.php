<?php
    session_start();
    require_once "weChat/weChatId.php";
    require_once "config.php";

    $set = $_REQUEST['set'] == null ? "1" : $_REQUEST['set'];

    header("Location:".$gURL."home.php?set=".$set); 

?>