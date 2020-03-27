<?php
include "../db/connection.php";
include "../db/execute.php";

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
function register()
{
$email = $_POST['regemail'];
$username = $_POST['felhnev'];
$password = $_POST['regpw'];
$password2 = $_POST['regpw2'];

if($email == "" || $username == "" || $password == "" || $password2 == "")
{
    if($password == $password2)
    {
        $data = callProc("UserGetByEmail","{$email}") -> fetch_array();
        if($data!=null)
        {
            alert("A megadott email már létezik!");
            return;
        }
        $data = null;
        $data = callProc("UserGetByUsername","{$username}") -> fetch_array();
        if($data!=null)
        {
            alert("A megadott felhaszálónév már létezik!");
            return;
        }
        $data = null;
        do{
            $uniq = uniqid($email,true);
            $data = callProc("UserGetByUniqId","{$uniq}") -> fetch_array();
        }
        while($data);

        $registerPassword = hash("sha256",$password);

        $userId = callProc("UserCreate","{$uniq},{$username},{$registerPassword},{$email}") -> fetch_array();
        if($userId!=null)
        {
            $_SESSION['id'] = $uniq;
            $_SESSION['username'] = $username;
            alert("Sikeres regisztráció!");
        }
        else
        {
            alert("Sikertelen regisztráció!");
        }
    }
    else
    {
        alert("A megadott jelszavak nem egyeznek!");
    }
}
else
{
    alert("Minden mező kitöltése kötelező!");
}
}
