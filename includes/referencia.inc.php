<?php
    if( empty(session_id()) && !headers_sent()){
        session_start();
    }

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(isset($_POST['submit'])) {
        $megnevezes = $_POST['kereses'];

        if(emptySearch($megnevezes) === true) {
            header("location: ../referenciak.php?error=emptyinput");
                exit();
        }
    }
    
    header("location: ../referenciak.php?megnevezes=".$megnevezes."");
    exit();
?>