<?php   
      session_start();   
      $bejegyzes = $_POST['bejegyzes'];
      $datum = date('Y-m-d H:i:s');
      $fiokid = $_SESSION['fiokId'];

      $dbkapcs= mysqli_connect("localhost","root","","szervizadatbazis");
        $sqlbeir="INSERT INTO bejegyzes (bejegyzes, datumbej, fiok_idfiok) VALUES ('$bejegyzes', '$datum', '$fiokid');";
        mysqli_query($dbkapcs, $sqlbeir);
        header("Location: index.php?menu=Forum");
?>