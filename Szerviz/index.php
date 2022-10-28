<?php 
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="eszkozok/css/Styles.css">
<link rel="stylesheet" href="eszkozok/css/Forms.css">
<meta name="nezet" content="width=device-width, initial-scale=1.0">
<title>Számítógép szerviz</title>
</head>
<body>
<div class="header">
<p>Számítógép szerviz Hajdúszoboszló</p>
</div>
<ul class="navigacio">	
  <li><a href="index.php?menu=Kezdolap">Kezdőlap</a></li>
  <li><a href="index.php?menu=Szerviz">Számítógép Szerviz</a></li>
  <li><a href="index.php?menu=Forum">Fórum</a></li>
  <?php 	
  	if(isset($_SESSION['fiokId']))
  	{  		
  		echo '<li class="bejmenu"><a href="index.php?menu=Kijelentkezes">Kijelentlezes</a></li>';
  	}
  	else
  	{
  		echo '<li class="bejmenu"><a href="index.php?menu=Bejelentkezes">Bejelentkezés</a></li>';
  	}
  	if(isset($_SESSION['jog']) && $_SESSION['jog'] == 1)
  	{
  		echo '<li class="bejmenu"><a href="index.php?menu=Adminpanel">Adminpanel</a></li>';
  	}
  ?>
</ul>
</div>
<article>
    <?php
		if (isset($_GET["menu"]))
		{
			$oldal=$_GET["menu"];		
			if (file_exists($oldal.".php")) include ($oldal.".php");
		}
	?>
    </article>  
	</body>
	</html>