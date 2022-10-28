<?php
if(isset($_POST['submit']))
{
	$email = $_POST["email"];
	$fnev = $_POST["fnev"];
	$jelszo = $_POST["jelszo"];

	require_once 'adatbaziskez.php';
	require_once 'funkciok.php';

	if(uresmezo($email, $fnev, $jelszo) !== false)
	{
		lognaplo(3);
		header("location: index.php?menu=Regisztracio&hiba=ures");
		exit();
	}
	if(rosszemail($email) !== false)
	{
		lognaplo(4);
		header("location: index.php?menu=Regisztracio&hiba=rosszemailcim");
		exit();
	}
		if(rosszfelh($fnev) !== false)
	{
		lognaplo(5);
		header("location: index.php?menu=Regisztracio&hiba=rosszfelhasznalonev");
		exit();
	}
	if(letezofelhemail($dbkapcs, $fnev, $email) !== false)
	{
		lognaplo(6);
		header("location: index.php?menu=Regisztracio&hiba=folgaltfelhasznalonev");
		exit();
	}
	lognaplo(2);
	fiokletrehoz($dbkapcs, $email, $fnev, $jelszo);
}
else
{
	header("location: index.php?menu=Regisztracio");
	exit();
}
?>