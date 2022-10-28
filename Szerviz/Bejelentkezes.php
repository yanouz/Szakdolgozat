<div class="formok">
        <form method="post" action="Belepesfeldolgozas.php">
		
            <div>
                <h1>Bejelentkezés:</h1>
            </div>
			
            <div class="form-kulso">
			<input class="form-belso" type="text" name="email" placeholder="E-mail/Felhasználónév"/>
			</div>

			<div class="form-kulso">
			<input class="form-belso" type="password" name="jelszo" placeholder="Jelszó"/>
			</div>

            <center>

			<div class="form-kulso">
			<button class="button" type="submit" name="submit">Bejelentkezés</button>
			</div>
			<?php
				if(isset($_GET["hiba"]))
				{
					if($_GET["hiba"] == "uresbej")
					{
						echo "<p>Töltsön ki minden mezőt!<p>";
					}
					else if ($_GET["hiba"] == "sikertelen")
					{
						echo "<p>Sikertelen bejelentkezés, próbálja újra!<p>";
					}					
				}
			?>
			</center>

			<a class="regisztracio" href="index.php?menu=Regisztracio">Regisztráció</a>
			
		</form>
</div>



