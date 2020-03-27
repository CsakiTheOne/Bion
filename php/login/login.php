<?php
include "../db/connection.php";
include "../db/execute.php";

function login()
{
    if ($_POST['email'] != "" || $_POST['password'] != "") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data = callProc("UserGetByCredentials","{$email},{$password}") -> fetch_array();
        if($data==null)
        {
            alert("Hibás bejelentkezési adatok!");
        }
        else
        {
            $_SESSION['id'] = $data['users.uniqId'];
            $_SESSION['username'] = $data['users.username'];
            alert("Sikeres bejelentkezés");
        }
    }
    else
    {
        alert("Minden mező kitöltése kötelező!");
    }
}
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
