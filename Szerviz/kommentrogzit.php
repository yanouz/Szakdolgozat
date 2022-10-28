<?php   
      session_start();   
      $komment = $_POST['komment'];
      $datum = date('Y-m-d H:i:s');
      $bejid = $_POST['idbej'];
      $fiokid = $_SESSION['fiokId'];

      $dbkapcs= mysqli_connect("localhost","root","","szervizadatbazis");
        $sqlbeir="INSERT INTO komment (komment, datumkom, bejegyzes_idbejegyzes, fiok_idfiokkom) VALUES ('$komment', '$datum', '$bejid', '$fiokid');";
        mysqli_query($dbkapcs, $sqlbeir);
        header("Location: index.php?menu=Forum");
?>