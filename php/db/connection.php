<?php
    $user = "root";
    $pw = "rootroot";
    $ip = "localhost";
    $db = "bion";

    $db = new mysqli($ip, $user, $pw, $db) or die($db->connect_error);
?>