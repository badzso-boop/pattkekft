<?php
    if( empty(session_id()) && !headers_sent()){
        session_start();
    }

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (isset($_POST["ssubmit"])) {
        // Lekérjük az adatokat az URL-ből
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        
        // Üres inputok
        if (emptyInputLogin($username, $pwd) === true) {
            header("location: ../admin.php?error=emptyinput");
                exit();
        }
        
        // Bejelentkeztetjük a felhasználót a weboldalra
        loginUser($conn, $username, $pwd);
    }

    if(isset($_SESSION["pozicio"])) {
        if($_SESSION["pozicio"]["pozicio"] == "admin")
        {
            echo '<style type="text/css">
                    .fooldal {
                        display: block !important;
                    }
                    .adminlogin {
                        display: none !important;
                    }
                </style>'; 
            //Összes felhasznalo lekerese
            $users = getAllUser($conn);

            //Adott felhasznalo szerkesztese
            if (isset($_POST["submit"])) {
                $id = $_POST["id"];
                $name = $_POST["name"];
                $username = $_POST["euid"];
                $email = $_POST["email"];
                $position = $_POST["position"];
        
                //header("location: ../admin.php?id='$id'name='$name'username='$username'email='$email'pozicio='$position'");
                
                if (emptyUsersInput($id,$name,$username,$email,$position)) {
                    header("location: ../admin.php?error=emptyinput");
                    exit();
                }
        
                if (invalidUid($username) !== false) {
                    header("location: ../admin.php?error=invaliduid");
                        exit();
                }
        
                if (invalidEmail($email) !== false) {
                    header("location: ../admin.php?error=invalidemail");
                        exit();
                }
        
                updateSpecificUser($conn, $id, $name, $username, $email, $position);
            }

            //Adott felhasznalo torlese
            if (isset($_POST["tsubmit"])) {
                $id = $_POST["did"];
        
                deleteSpecificUser($conn, $id);
            }


            //Összes munka lekérése
            $works = getAllWorks($conn);

            //Adott munka szerkesztese
            if (isset($_POST["wsubmit"])) {
                $id = $_POST["swid"];
                $nev = $_POST["wnev"];
                $feladat = $_POST["wfeladat"];
                $fizetes = $_POST["wfizetes"];
                $elerhetoseg = $_POST["welerhetoseg"];
        
                //Üres mezők ellenőrzése
                if (emptyInputWorkUpload($nev, $feladat, $fizetes, $elerhetoseg) !== false)
                {
                    header("location: ../admin.php?error=emptyinput");
                    exit();
                }
        
                editSpecificWork($conn, $id, $nev, $feladat, $fizetes, $elerhetoseg);
            }

            //Adott munka torlese
            if (isset($_POST["wdsubmit"])) {
                $id = $_POST["wid"];
        
                deleteSpecificWork($conn, $id);
            }



            //Összes referencia lekérése
            $referenciak = getAllReferencia($conn);

            //Adott referencia szerkesztese
            if (isset($_POST["rszsubmit"])) {
                $id = $_POST["rid"];
                $megnevezes =$_POST["rmegnevezes"];
                $leiras = $_POST["rleiras"];
                $kepek = $_POST["rkepek"];
        
                if (emptyInpuReferenciakUpload($megnevezes, $leiras, $kepek) !== false) {
                    header("location: ../admin.php?error=emptyinput");
                    exit();
                }
        
                updateReferencia($conn, $id, $megnevezes, $leiras, $kepek);
            }

            //Adott referencia törlése
            if (isset($_POST["rdsubmit"])) {
                $id = $_POST["rid"];
        
                deleteSpecificReferencia($conn, $id);
            }


            //Összes üzenet lekérese
            $messages = getAllMessages($conn);

            //Adott üzenet olvasva
            if (isset($_POST["ubsubmit"])) {
                $id = $_POST["uzid"];
                $felado = $_POST["felado"];
                $elerhetoseg = $_POST["elerhetoseg"];
                $cimzett = $_POST["cimzett"];
                $szoveg = $_POST["szoveg"];
                $allapot = $_POST["allapot"];
        
                updateSpecificMessage($conn, $id, $felado, $elerhetoseg, $cimzett, $szoveg, $allapot);
            } 

            //Adott üzenet törlése
            if (isset($_POST["udsubmit"])) {
                $id = $_POST["uzid"];
        
                deleteSpecificMessage($conn, $id);
            }
        }
        else
        {
            header("location: ../index.php?error=notadmin");
        }
    }
?>