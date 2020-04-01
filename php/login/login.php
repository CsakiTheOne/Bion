<?php
include "php/db/connection.php";
include "php/db/execute.php";

    if ($_POST['email'] != "" || $_POST['password'] != "") {
        $email = trim($_POST['email']);
        $password = hash("sha256",trim($_POST['password']));
        $data = callProc("UserGetByCredentials","'{$email}','{$password}'");
        if($data==null)
        {
            alert("Hibás bejelentkezési adatok!");
        }
        else
        {
            $_SESSION['id'] = $data[0]['uniqId'];
            $_SESSION['username'] = $data[0]['username'];
            $_SESSION['email'] = $email;
            alert("Sikeres bejelentkezés");
        }
    }
    else
    {
        alert("Minden mező kitöltése kötelező!");
    }

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
