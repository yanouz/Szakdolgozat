<?php
//Regisztrációs függvények
	function uresmezo($email, $fnev, $jelszo)
	{
		$eredmeny;
		if (empty($email) || empty($fnev) || empty($jelszo)) 
		{
			$eredmeny = true;
		}
		else
		{
			$eredmeny = false;
		}
		return $eredmeny;
	}

	function rosszemail($email)
	{
		$eredmeny;
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$eredmeny = true;
		}
		else
		{
			$eredmeny = false;
		}
		return $eredmeny;
	}

	function rosszfelh($fnev)
	{
		$eredmeny;
		if (!preg_match("/^[a-zA-Z0-9]*$/", $fnev)) 
		{
			$eredmeny = true;
		}
		else
		{
			$eredmeny = false;
		}
		return $eredmeny;
	}

	function letezofelhemail($dbkapcs, $fnev, $email)
	{
		$sql = "SELECT * FROM fiok WHERE fnev = ? OR email = ?;";
		$utasit = mysqli_stmt_init($dbkapcs);
		if (!mysqli_stmt_prepare($utasit, $sql)) 
		{
			header("location: index.php?menu=Regisztracio&hiba=utasitashiba");
			exit();
		}

		mysqli_stmt_bind_param($utasit, "ss", $fnev, $email);
		mysqli_stmt_execute($utasit);

		$eredmenyadat = mysqli_stmt_get_result($utasit);

		if($sor = mysqli_fetch_assoc($eredmenyadat))
		{
			return $sor;
		}
		else
		{
			$eredmeny = false;
			return $eredmeny;
		}

		mysqli_stmt_close($utasit);
	}
		function fiokletrehoz($dbkapcs, $email, $fnev, $jelszo)
	{
		$sql = "INSERT INTO fiok (email, fnev, jelszo) VALUES(?, ?, ?);";
		$utasit = mysqli_stmt_init($dbkapcs);
		if (!mysqli_stmt_prepare($utasit, $sql)) 
		{
			header("location: index.php?menu=Regisztracio&hiba=utasitashiba");
			exit();
		}

		$titkosjelszo = sha1($jelszo); 

		mysqli_stmt_bind_param($utasit, "sss", $email, $fnev, $titkosjelszo);
		mysqli_stmt_execute($utasit);
		mysqli_stmt_close($utasit);
		header("location: index.php?menu=Regisztracio&hiba=Sikeres");
		exit;
	}
//Bejelentkező függvények 
	function uresmezobej($email, $jelszo)
	{
		$eredmeny;
		if (empty($email) || empty($jelszo)) 
		{
			$eredmeny = true;
		}
		else
		{
			$eredmeny = false;
		}
		return $eredmeny;
	}

	function bejel($dbkapcs, $email, $jelszo)
	{
		$felhletezik = letezofelhemail($dbkapcs, $email, $email);

		if($felhletezik == false)
		{
			header("location: index.php?menu=Bejelentkezes&hiba=sikertelen");
			exit();
		}

		$titkosjelszo = $felhletezik["jelszo"];
		if($titkosjelszo === sha1($jelszo))
		{			
			$_SESSION['fiokId'] = $felhletezik['idfiok'];
			$_SESSION['email'] = $felhletezik['email'];
			$_SESSION['fnev'] = $felhletezik['fnev'];
			$_SESSION['jog'] = $felhletezik['jog'];
 			header("location: index.php?menu=Kezdolap");
			exit();
		}
		else
		{
			header("location: index.php?menu=Bejelentkezes&hiba=sikertelen");
			exit();
		}
	}
	//FORUM
	function nevkiszed ($id)
	{	
		$dbkapcs = mysqli_connect("localhost","root","","szervizadatbazis");		
		$sql = "SELECT fnev FROM fiok WHERE idfiok = $id;";
		$eredmeny = mysqli_query($dbkapcs,$sql);
		if (mysqli_num_rows($eredmeny) > 0) 
		{

      	while($row = mysqli_fetch_assoc($eredmeny)) 
      	{
          $vissza = $row['fnev'];         
    	}

		}
		return $vissza;
	}
	function kommentki ($id)
	{
		$dbkapcs = mysqli_connect("localhost","root","","szervizadatbazis");
		$sql = "SELECT fnev, komment FROM komment INNER JOIN fiok ON komment.fiok_idfiok = fiok.idfiok WHERE komment.idkomment = $id ORDER BY datumkom;";
		$eredmeny = mysqli_query($dbkapcs,$sql);
		if (mysqli_num_rows($eredmeny) > 0) 
		{

      		while($row = mysqli_fetch_assoc($eredmeny)) 
      		{
      			$visszakom =  '<table><tr><td>' . $row['fnev'] . '</td></tr><tr><td>' . $row['komment'] . '</td></tr></table>'; 
      			return $visszakom;
    		}
		}
	}
	//Szerviz
	function uresszervizmezo($email, $nev, $hiba, $telefon)
	{
		$eredmeny;
		if (empty($email) || empty($nev) || empty($hiba) || empty($telefon))
		{
			$eredmeny = true;
		}
		else
		{
			$eredmeny = false;
		}
		return $eredmeny;
	}
	//Log/naplózás
	function lognaplo($esemeny, $sqlmuvelet="")
	{
		$dbkapcs = mysqli_connect("localhost","root","","szervizadatbazis");
		$datum = date('Y-m-d H:i:s');
		$ip = $_SERVER["REMOTE_ADDR"];
		$logsql = "INSERT INTO log(logdatum, sqlmuvelet, felhip, esemeny) VALUES ('$datum', '$sqlmuvelet', '$ip', '$esemeny');";
		mysqli_query($dbkapcs,$logsql);
	}	
	//(1): Sikeres bejelentkezés
	//(2): Sikeres regisztráció
	//(3): Üres mező
	//(4): Rossz email formátum
	//(5): Rossz felhasználónév
	//(6): Foglalt felhasználónév
?>