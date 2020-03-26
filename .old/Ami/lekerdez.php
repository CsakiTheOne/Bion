<?php
function leker($muvelet)
{
    global $db;
    $eredmeny = $db->query($muvelet) or die($db->error);

    if ($eredmeny->num_rows != 0)
    {
        while ($sor = $eredmeny->fetch_array()) {
            $adatok[] = $sor;
        }
        return $adatok;
    }
    else return false;
}
?>