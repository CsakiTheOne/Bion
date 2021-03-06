<?php
include "../php/db/connection.php";
include "../php/db/execute.php";

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function register()
{
$email = trim($_POST['regemail']);
$username = trim($_POST['felhnev']);
$password = trim($_POST['regpw']);
$password2 = trim($_POST['regpw2']);

if(!$email == "" || !$username == "" || !$password == "" || !$password2 == "")
{
    if($password == $password2)
    {
        $data = callProc("UserGetByEmail","'{$email}'");
        if($data!=null)
        {
            alert("A megadott email már létezik!");
            return;
        }
        $data = null;
        $data = callProc("UserGetByUsername","'{$username}'");
        if($data!=null)
        {
            alert("A megadott felhaszálónév már létezik!");
            return;
        }
        $data = null;
        do{
            $uniq = uniqid("",true);
            $data = callProc("UserGetByUniqId","'{$uniq}'");
        }
        while($data);

        $registerPassword = hash("sha256",$password);

        $userId = callProc("UserCreate","'{$uniq}','{$username}','{$registerPassword}','{$email}'");
        if($userId!=null)
        {
            $_SESSION['id'] = $uniq;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['admin'] = 0;
            echo "<script> window.location.assign('../index.php'); </script>";
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
