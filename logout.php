<?php
    session_start();
    function destroySession(){
        session_unset();
        session_destroy();
    }
    destroySession();
    header("location:Home.php");
?>