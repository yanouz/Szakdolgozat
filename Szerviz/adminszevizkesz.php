<?php
$kesz=$_POST['keszgomb'];
$datum = date('Y-m-d H:i:s');
$dbkapcs= mysqli_connect("localhost","root","","szervizadatbazis");
$sql= "UPDATE szerviz SET kesz = '1', datumkesz = '$datum' WHERE idszerviz = '$kesz';";
mysqli_query($dbkapcs,$sql);
header('Location: index.php?menu=Adminpanel');
?>