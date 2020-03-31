<?php
    $user = "root";
    $pw = "";
    $ip = "localhost";
    $db = "bion";

    $db = new mysqli($ip, $user, $pw, $db) or die($db->connect_error);
?>