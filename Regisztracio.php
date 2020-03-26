<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/Regisztracio.css">

	<link rel="icon" href="../kepek/pushy.png" type="image/gif" sizes="16x16">

  <title>Persely</title>
</head>

<body>
	<form method="POST" action="">
		<h2 class="text-success">Regisztráció</h2>
		<p>
			<label for="Email" class="floatLabel text-success">E-mail</label>
			<input id="Email" name="Email" type="text">
			<span id="span_email">Az email cím nem megfelelő</span>
		</p>
		<p>
			<label for="jelszo" class="floatLabel text-success">Jelszó</label>
			<input id="jelszo" name="jelszo" type="password">
			<span id="span1">A jelszavak nem egyeznek</span>
		</p>
		<p>
			<label for="jelszo2" class="floatLabel text-success">Jelszó megerősítése</label>
			<input id="jelszo2" name="jelszo2" type="password">
			<span id="span2">A jelszavak nem egyeznek</span>
		</p>
		<p>
			<input type="submit" name="regisztracio" class="btn btn-outline-success" value="Regisztráció" id="submit">
		</p>
		<p>
			<input type="button" class="btn btn-outline-success" onclick="vissza()" value="Vissza a kezdőlapra">
		</p>
		<p>
	<?php

	function ellenorzes($email, $jelszo, $jelszo2)
	{
		if (empty($email) || empty($jelszo) || empty($jelszo2)) 
		{
			return false;
		} 
		else if ($jelszo != $jelszo2) 
		{
			return false;
		}
		else if(strlen($jelszo) < 8 || strlen($jelszo2) < 8)
		{
			return false;
		}
		else 
		{
			return true;
		}
	}

	function letezik($email)
	{
		$query = "SELECT Email FROM felhasznalo WHERE Email = '{$email}'";

		include "../php/db_kapcsolat.php";

		$eredmeny = $db->query($query) or die($db->error);

		if ($eredmeny->num_rows != 0) {
			return false;
		} else {
			return true;
		}
	}

	function regisztral($email, $jelszo, $jelszo2)
	{
		$urese = ellenorzes($email, $jelszo, $jelszo2);
		$vane = letezik($email);

		if ($urese && $vane) {
			include "../php/db_kapcsolat.php";
			include "../php/sozas.php";

			$so = sozas(2);
			$jelszo .= $so;

			$query = "INSERT INTO felhasznalo VALUES ('','{$email}','" . hash("sha256", $jelszo) . "','{$so}')";

			$db->query($query) or die($db->error);

			echo "<div id='hibasAdatok' class='alert alert-success'>
            <a id='hibax'>
            Sikeres regisztráció!
            <img src='../kepek/x.png' alt='Bezárás' style='height:20px' class='float-right'>
            </a>
            </div>";
		}
		else {
			echo "<div id='hibasAdatok' class='alert alert-danger'>
            <a id='hibax'>
            Nem megfelelő adatok!
            <img src='../kepek/x.png' alt='Bezárás' style='height:20px' class='float-right'>
            </a>
            </div>";
		}
	}

	if(isset($_POST["regisztracio"])) :
		regisztral($_POST["Email"], $_POST["jelszo"], $_POST["jelszo2"]);
	endif;

	include 'components/bootstrap.php';
	?>
		</p>
	</form>
	<script src="../js/Regisztracio.js"></script>
</body>

</html>