<body>
    <div class="formok">
        <form method="post" action="szervizrogzit.php">
            <div>
                <h1>Szerviz</h1>
				
            <div class="form-kulso">
			
			<div>
			<input class="form-belso" type="text" placeholder="Név" name="nev"><br>
			</div>
			
			<div>
			<input class="form-belso" type="email" placeholder="E-mail" name="email"><br>
			</div>
			
			<div>
			<input class="form-belso" type="number_format" placeholder="Telefonszám 06201234567" name="telefon"><br>
			</div>
			
			<div>
			<input class="form-belso" type="text" placeholder="Hiba/Észrevétel" name="hiba">
			</div>
			

			
			<center>
			<div class="form-kulso">
			<button class="button" type="submit" name="submit">Küldés</button>
			</div>	
			</center>
			<?php
			if(isset($_GET["hiba"]))
			{
				if($_GET["hiba"] == "ures")
				{
						echo "<p>Töltsön ki minden mezőt!<p>";
				}
				else if($_GET["hiba"] == "rosszemailcim")
				{
					echo "Rossz email formátum!";
				}
			}

			if(isset($_GET["Kuldve"]) && $_GET["Kuldve"] == 1)
			{
					echo "<p>Rögzítettük a hibáját.<p>";
			}	
			?>
        </form>
    </div>
</body>

