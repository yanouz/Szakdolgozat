<body>
    <div class="formok">
        <form method="post" action="Regisztraciofeldolgoz.php">
		
            <div>
                <h1>Regisztráció:</h1>
            </div>
			
            <div class="form-kulso">
			<input class="form-belso" type="email" name="email" placeholder="E-mail">
			</div>
			
			<div class="form-kulso">
			<input class="form-belso" type="text" name="fnev" placeholder="Felhasználónév">
			</div>
			
			<div class="form-kulso">
			<input class="form-belso" type="password" name="jelszo" placeholder="Jelszó"/>
			</div>

			<center>

			<div class="form-kulso">
			<button class="button" type="submit" name="submit">Regisztráció</button>
			</div>
			<?php
				if(isset($_GET["hiba"]))
				{
					if($_GET["hiba"] == "ures")
					{
						echo "<p>Töltsön ki minden mezőt!<p>";
					}
					else if ($_GET["hiba"] == "rosszemailcim")
					{
						echo "<p>Rossz e-mail formátum!<p>";
					}
					else if ($_GET["hiba"] == "rosszfelhasznalonev")
					{
						echo "<p>Nem megengedett karakterek a felhasználónévben!<p>";
					}
					else if ($_GET["hiba"] == "folgaltfelhasznalonev")
					{
						echo "<p>Foglalt felhasználónév, vagy e-mail cím!<p>";
					}
					else if ($_GET["hiba"] == "utasitashiba")
					{
						echo "<p>Valami nem sikerült, próbálja meg újra!<p>";
					}
					else if ($_GET["hiba"] == "Sikeres")
					{
						echo "<p>Sikeres regisztráció!<p>";
					}
				}
			?>
			</center>
        </form>
    </div>
</body>
