<?php
    function vegrehajt($muvelet)
    {
        global $db;
        $eredmeny = $db->query($muvelet) or die($db->error);
        return $eredmeny;
    }
?>