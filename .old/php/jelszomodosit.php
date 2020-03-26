<?php
session_start(); 

function jelszomodositas($id,$regijelszo,$ujjelszo,$ujjelszo2)
{
    if(empty($regijelszo) || empty($ujjelszo) || empty($ujjelszo2))
    {
        echo "Minden mező kitöltése kötelező!";
    }
    else if($ujjelszo != $ujjelszo2)
    {
        echo "A két jelszó nem egyezik meg!";
    }
    else
    {
        include "../incDB/kapcsolat.php";
        $keres = "SELECT so FROM felhasznalok WHERE fnev = '{$fnev}'";

        $eredmeny = $db -> query($keres) or die($db -> error);

        if($eredmeny->num_rows != 0)
        {
            $so = $eredmeny -> fetch_array();
            $regijelszosozott = hash("sha256",$regijelszo.$so["so"]);
            $egyezik = "SELECT fnev FROM felhasznalok WHERE jelszo = '{$regijelszosozott}'";
            $ered = $db -> query($egyezik) or die ($db -> error);
            if($ered->num_rows == 0)
            {
                echo "Hibás jelszó!";
                return;
            }
        }
        $jelszo = $ujjelszo.$so["so"];
        $modosit = "UPDATE felhasznalok SET jelszo = '".hash("sha256",$jelszo)."' WHERE fnev = '{$fnev}'";

        $db -> query($modosit) or die ($db -> error);

        echo "A jelszó sikeresen módosult!";

    }
}

jelszomodositas($_SESSION['id'],$_POST['regijelszo'],$_POST['ujjelszo'],$_POST['ujjelszo2']);

?>