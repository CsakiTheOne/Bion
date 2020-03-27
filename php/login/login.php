<?php

    if ($_POST['email'] != "" || $_POST['password'] != "") {
        $email = $_POST['email'];
        $password = hash("sha256",$_POST['password']);
        $data = callProc("UserGetByCredentials","'{$email}','{$password}'");
        if($data==null)
        {
            alert("Hibás bejelentkezési adatok!");
        }
        else
        {
            $_SESSION['id'] = $data[0]['uniqId'];
            $_SESSION['username'] = $data[0]['username'];
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
