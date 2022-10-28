<?php  
if(isset($_POST['submit']))
{ 
      $email = $_POST['email'];  
      $nev = $_POST['nev'];
      $hiba = $_POST['hiba'];
      $telefon = $_POST['telefon'];
      $kesz = 0;
      $datum = date('Y-m-d H:i:s');

      require_once 'adatbaziskez.php';
      require_once 'funkciok.php';

      if(uresszervizmezo($email, $nev, $hiba, $telefon) !== false)
      {
          lognaplo(7);
          header("location: index.php?menu=Szerviz&hiba=ures");
          exit();
      }
      if(rosszemail($email) !== false)
      {   
          lognaplo(8);
          header("location: index.php?menu=Szerviz&hiba=rosszemailcim");
          exit();
      }
      
      $dbkapcs= mysqli_connect("localhost","root","","szervizadatbazis");
      $sqlbeir="INSERT INTO szerviz (email, nev, hiba, telefon, kesz, datumbeerkez) VALUES ('$email', '$nev', '$hiba', '$telefon', '$kesz', '$datum');";
        mysqli_query($dbkapcs, $sqlbeir);
        header("Location: index.php?menu=Szerviz&Kuldve=1");
}
else
{
  header("location: index.php?menu=Szerviz");
  exit();
}
?>