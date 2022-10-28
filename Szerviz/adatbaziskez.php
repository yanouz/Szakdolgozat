<?php 
	$dbszerver="localhost";
	$dbfnev="root";
	$dbjelszo="";
	$dbnev="szervizadatbazis";

	$dbkapcs= mysqli_connect($dbszerver, $dbfnev, $dbjelszo, $dbnev);

	if(!$dbkapcs)
	{
		die("Kapcsohat nem sikerült az adatbázissal" .mysqli_connect_error());
	}
 ?>