<?php
session_start();
if(isset($_POST["submit"]))
{
	$email = $_POST['email'];
	$jelszo = $_POST['jelszo'];

	require_once 'adatbaziskez.php';
	require_once 'funkciok.php';

	if(uresmezobej($email, $jelszo) !== false)
	{
		header("location: index.php?menu=Bejelentkezes&hiba=uresbej");
		exit();
	}
	lognaplo(1);
	bejel($dbkapcs, $email, $jelszo);
}
else
{
	header("location: index.php?menu=Bejelentkezes");
	exit();
}
?>