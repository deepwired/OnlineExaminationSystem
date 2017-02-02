<?php
    session_start();
    session_cache_expire();    
    session_destroy();     
    header("Location: login.php");
    die;
?>

