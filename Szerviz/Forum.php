<?php 
print '<body> <div class="forum">
<h1>Fórum<h1>
</div>';
if(isset($_SESSION['fiokId']))
{
print '
<div class="bejir">
<form method="post" action="bejegyzesrogzit.php" id="bejegyzesform">
    
            <div>
                <h1>Bejegyzés írása</h1>
            </div>
      
            <div class="">
      <textarea class="szovegdoboz" name="bejegyzes" placeholder="Gépeld ide a bejegyzésed." form="bejegyzesform"></textarea>
      </div>          
      <button type="submit" name="submit">Bejegyzés beküldése</button>
</form>
</div>
<center>';
}
else
{ 
    print '<center><h1 class="forum-bej">Bejegyzés, hozzászólás írásához kérem jelentkezzen be.</h1></center>';
}
$dbkapcs= mysqli_connect("localhost","root","","szervizadatbazis");
include 'funkciok.php';
$sql="SELECT * from bejegyzes LEFT JOIN komment ON bejegyzes.idbejegyzes = komment.bejegyzes_idbejegyzes GROUP BY bejegyzes ORDER BY datumbej DESC;";
$eredmeny=mysqli_query($dbkapcs,$sql);
if (mysqli_num_rows($eredmeny)>0)
 {
    while ($row=mysqli_fetch_assoc($eredmeny)) 
    {      
      print '<div class="bejegyzes">';
      print '<center>';
      print '<table>';
      print '<tr class="bejegyzes-nev">';
      print '<td>';
      print 'Felhasználó: ';
      print nevkiszed($row['fiok_idfiok']);//felhnev
      print '<p>';
      print $row['datumbej'];
      print '</p>';
      print '</td>';
      print '</tr>';
      print '<tr class="bejegyzes-szoveg">';
      print '<td>';
      print 'Bejegyzés: <br>';
      print $row['bejegyzes'];//bejegyzes
      print '</td>';
      print '</tr>';
      print '<tr>';
      print '<td>Kommentek:</td><br>';
      print '</tr>';
      if(isset($_SESSION['fiokId']))
      {
      print '<td><form method="post" action="kommentrogzit.php">';
      print '<input type="hidden" name="idbej" value="' . $row['idbejegyzes'] . '">';
      print '<textarea class="kommentszoveg" type="text" name="komment" placeholder="Komment"></textarea>';
      print '<button class="komgomb" type="submit" name="submit">Küldés</button></div>';
      print '</form></td>';
      }
     
      $dbkapcs2= mysqli_connect("localhost","root","","szervizadatbazis");
      $idbejegyzes = $row['bejegyzes_idbejegyzes'];
      $sql2 = "SELECT fnev, komment, datumkom FROM komment INNER JOIN fiok ON komment.fiok_idfiokkom = fiok.idfiok WHERE komment.bejegyzes_idbejegyzes = $idbejegyzes ORDER BY datumkom DESC;";
      $eredmeny2 = mysqli_query($dbkapcs2,$sql2);
      if(empty($eredmeny2))
      {
        print '<table><tr><td>Nincs még komment.</td></td></table>';
      }
      else 
      {
      if (mysqli_num_rows($eredmeny2) > 0) 
      {

          while($row2 = mysqli_fetch_assoc($eredmeny2)) 
          {
            $visszakom = '<table><tr class="bejegyzes-komment"><td>' . $row2['fnev'] . '</td></tr><tr class="bejegyzes-komment"><td>' . $row2['komment'] . '</td></tr><tr><td>' . $row2['datumkom'] .'</td></tr></table>';
            print $visszakom;
          }
      }
      }

      print '</table>';
   }
}
print '</center>
</body>';
?>