<body>
<div class="adminpan">
<center>
<h1>Szervíz alatt állók:</h1>
<table>
	<tr class="admintabla">
		<th>Id:</th>
		<th>Név:</th>
		<th>Email:</th>
		<th>Telefon:</th>
		<th>Beérkezés ideje:</th>
		<th>Hiba</th>
	</tr>
<?php
if(isset($_SESSION['jog']) && $_SESSION['jog'] == 1)
{
	
	$dbkapcs= mysqli_connect("localhost","root","","szervizadatbazis");
	include 'funkciok.php';
	$sql = "SELECT * FROM szerviz";
	$eredmeny=mysqli_query($dbkapcs,$sql);
	$eredmeny2=mysqli_query($dbkapcs,$sql);
	$elsosor = 0;
	$elsosorkesz = 0;	
	if (mysqli_num_rows($eredmeny)>0)
	{
		while ($row = mysqli_fetch_assoc($eredmeny)) 
		{							
			if($row['kesz'] == 0)
			{
				print '<tr class="admintabla">';						
			    print '<td>';
			    print $row['idszerviz'];
			    print '</td>';
			    print '<td>';
			    print $row['nev'];
			    print '</td>';
			    print '<td>';
			    print $row['email'];
			    print '</td>';
			    print '<td>';
			    print $row['telefon'];
			    print '</td>';
			    print '<td>';
			    print $row['datumbeerkez'];
			    print '</td>';
			    print '<td>';
			    print $row['hiba'];
			    print '</td>';
			    print '<td style="text-align: center;">';
			    print'<form method="post" action="adminszevizkesz.php">';
			    print '<input type="hidden" name="keszgomb" value="' . $row['idszerviz'] . '">';
			    print '<button>Kész</button>';
			    print'</form>';
			    print '</td>';
			}
		}
		print '
				</table>
				<h1>Elkészült készülékek:</h1>
				<table>
				<tr class="admintabla">
					<th>Id:</th>
					<th>Név:</th>
					<th>Email:</th>
					<th>Telefon:</th>
					<th>Beérkezés ideje</th>
					<th>Elkészülés ideje:</th>
					<th>Hiba</th>
				</tr>';
		while ($row2 = mysqli_fetch_assoc($eredmeny2)) 
		{			
			if($row2['kesz'] == 1)
			{
				print '<tr class="admintabla">';						
			    print '<td>';
			    print $row2['idszerviz'];
			    print '</td>';
			    print '<td>';
			    print $row2['nev'];
			    print '</td>';
			    print '<td>';
			    print $row2['email'];
			    print '</td>';
			    print '<td>';
			    print $row2['telefon'];
			    print '</td>';
			    print '<td>';
			    print $row2['datumbeerkez'];
			    print '</td>';
			    print '<td>';
			    print $row2['datumkesz'];
			    print '</td>';
			    print '<td>';
			    print $row2['hiba'];
			    print '</td>';
			}			
		}

	}
}
else 
{
	echo 'NINCS JOGOSULTSÁGA AZ OLDAL MEGTEKINTÉSÉHEZ!';
}
?>
</table>
</center>
</div>
</body>