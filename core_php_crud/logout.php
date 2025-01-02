<?php
    include ("connect_db.php");
    session_destroy();
    header("Location: login.php");
    exit;
?>