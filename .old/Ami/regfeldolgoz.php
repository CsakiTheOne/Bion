<?php
    function kitoltott($email,$fnev,$jelszo,$jelszo2)
    {
        if (empty($email) ||
            empty($fnev) ||
            empty($jelszo) ||
            empty($jelszo2)) {
            
            echo "Kérem töltsön ki minden mezőt";
            return false;
        }
        else if ($jelszo != $jelszo2){
            include "../uzenetek/jelszavak.html";
            header("Refresh:1; url=../reg.php");
            exit;
            return false;
            
        }
        else{
            return true;
        }
    }

    //ellenőrizzük, hogy a DB-ben benne van-e
    function vanemar($email, $fnev)
    {
        include "kapcsolat.php";

        $keres="SELECT email, felh
                FROM felhasznalo
                WHERE email='{$email}'
                OR felh = '{$fnev}'";
        
        $vane = $db->query($keres) or die($db->error);

        if ($vane->num_rows != 0) {
            include "../uzenetek/foglalt.html";
            header("Refresh:2; url=../reg.php");
            exit;
            return false;
        }
        else{
            return true;
        }
    } 
    //regisztráció végrehajtása
    function regisztral($email,$fnev,$jelszo,$jelszo2){
        $ures=kitoltott($email,$fnev,$jelszo, $jelszo2);
        $van=vanemar($email,$fnev);

        if ($ures && $van) {
            include "randomgen.php";

            $so=sozas(2);

            $jelszo .=$so;
            $keres="INSERT INTO felhasznalo
                    (felh,passwd,so,email)
                    VALUES('{$fnev}',
                    '".hash("sha256",$jelszo)."',
                    '{$so}',
                    '{$email}')";

            include "kapcsolat.php";

            $db->query($keres) or die($db->error);
            include "../uzenetek/sikeresreg.html";
            session_start();
            $_SESSION["id"]= getAzon($fnev);
            header("Refresh:2; url=../klantagrepcsik.php");
            exit;
        }
    }

    regisztral($_POST["email"],
    $_POST["fnev"],
    $_POST["jelszo"],
    $_POST["jelszo2"]);

    function getAzon($fnev)
    {
        include "kapcsolat.php";
        $keres = "SELECT azon FROM felhasznalo
        WHERE felh = '{$fnev}'";
        $eredmeny = $db->query($keres) or die($db->error);
        if ($eredmeny->num_rows != 0)
        {
            while ($sor = $eredmeny->fetch_array()) {
                $adatok[] = $sor;
            }
            return $adatok;
        }
    }
?>