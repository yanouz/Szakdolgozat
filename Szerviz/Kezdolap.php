<body>
<div class="kezdolap">
<?php
  	if(isset($_SESSION["fnev"]))
  	{
  		echo "<p>Üdvözlöm az oldalamon ". $_SESSION['fnev'] . "!</p>";
  	}
  ?>
  	<h1>Kezdőlap</h1>
  	<div class="szetoszt">

  		<div>
  			<h2>Az oldal</h2>
        <ul>
          <li>
            <p>Az oldalam olyan embereknek szeretne segítséget nyújtani akik számítógépes problémával, hibával rendelkeznek.</p>
          </li>
          <li>
            <p>A nagyobb hibákra ajánlom a Számítógép Szerviz használatát ahol a szakemberreknek lehet beküldeni a hibát, és ők felveszik önnel a kapcsolatot minél hamarabb.</p>
          </li>
          <li>
            <p>A fórum az oldalon arrra szolgál, hogy kisebb problémákat kibeszéljenek, és akár ott is megtaláljak számukra a megfelelő megoldást, választ a probrémára.</p>
          </li>
      </ul>
			<h2>Szerviz működése:</h2>
      <ul>
			<li>
        <p>
           Egy szerviz beküldéséhez meg kell adnia a nevét, hibáját, a helyes email-címét és telefonszámát.
        </p>
      </li>
			<li>
        <p>
           A telefonszám, és az email helyességére mindenképp figyeljenek, mert azok nélkül nem tudjuk felvenni önökkel a kapcsolatot.
        </p>
      </li>	
      </ul>
      <h2>Regisztráció:</h2>
      <ul>
      <li>
        <p>
           A regisztrációnál adja meg az e-mail címét, felhasználónevét, és jelszavát.
        </p>
      </li>
      <li>
        <p>
           A felhasználónév csak nagy és kisbetűt tartalmazhat, meg számot!
        </p>
      </li>
      </ul>
      <h2>Fórum:</h2>
      <ul>
      <li>
        <p>
           Bejelentkezés után már azonnal használhatja a fórum felületét, bejegyzéseket, és kommenteket írhat.
        </p>
      </li>
      </ul>
  		</div>

  		<div> 
			<img alt="Egy laptop képe" src="eszkozok/img/kep.jpg"/>
  		</div>

  	</div>
</div>
</body>