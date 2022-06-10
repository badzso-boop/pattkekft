<?php
if (isset($_POST["submit"]))
{
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $megnevezes = $_POST["megnevezes"];
    $leiras = $_POST["leiras"];
    $fajl = $_FILES['myFile'];

    $fajlnev = $fajl['name'];
    $fajlhelye = $fajl['tmp_name'];
    $fajlmeret = $fajl['size'];
    $fajlerror = $fajl['error'];
    $fajltipus = $fajl['type'];

    
    
    $seged = explode('.', $fajlnev);
    $fajlkit = strtolower(end($seged));

    $engedelyezett = array('jpg', 'jpeg', 'png');

    //Fajl ellenorzese
    if (in_array($fajlkit, $engedelyezett)) {
        if ($fajlerror === 0) {
            if ($fajlmeret > 500000) {
                $fajlnevuj = uniqid('', true).".".$fajlkit;
                $fajlDestination = "C:/xampp/htdocs/img"."/".$fajlnevuj;
                if (move_uploaded_file($fajl['tmp_name'], $fajlDestination)) {
                    //Üres mezők ellenőrzése
                    if (emptyInpuReferenciakUpload($megnevezes, $leiras, $fajlnevuj) !== false)
                    {
                        header("location: ../admin.php?error=emptyinput");
                        exit();
                    }

                    uploadReferencia($conn, $megnevezes, $leiras, $fajlnevuj);
                } else {
                    //header("location: ../admin.php?error=nomove");
                    print_r($fajl);
                    printf("uj sor: \n");
                    printf($fajlDestination);
                exit();
                }
            } else {
                header("location: ../admin.php?error=bigfile");
                exit();
            }
        } else {
            header("location: ../admin.php?error=wrongfile");
            exit();
        }
    } else {
        header("location: ../admin.php?error=wrongfileext");
        exit();
    }
}
?>