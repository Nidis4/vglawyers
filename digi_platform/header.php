	<?php
	echo "
	<header>
		<div class='logo'>
			<a href='index.php'><img src='images/logo.png' alt=''></a>
		</div>
		<div class='pages'>";
		if (strpos($_SERVER['REQUEST_URI'], 'home') !== false){
			echo "<a href='home.php'><img src='images/kentriki_on.png' /></a>";
		}
		else{
			echo "<a href='home.php'><img src='images/kentriki_off.png' /></a>";
		}
		if (strpos($_SERVER['REQUEST_URI'], 'company') !== false){
			echo "<a href='company.php'><img src='images/etairia_on.png' /></a>";
		}
		else{
			echo "<a href='company.php'><img src='images/etairia_off.png' /></a>";
		}
		if (strpos($_SERVER['REQUEST_URI'], 'lawyers') !== false){
			echo "<a href='lawyers.php'><img src='images/dikigoroi_on.png' /></a>";
		}
		else{
			echo "<a href='lawyers.php'><img src='images/dikigoroi_off.png' /></a>";
		}
		if (strpos($_SERVER['REQUEST_URI'], 'expertise') !== false){
			echo "<a href='expertise.php'><img src='images/ekseidikeusi_on.png' /></a>";
		}
		else{
			echo "<a href='expertise.php'><img src='images/ekseidikeusi_off.png' /></a>";
		}
		if (strpos($_SERVER['REQUEST_URI'], 'publications') !== false){
			echo "<a href='publications.php'><img src='images/dimosieuseis_on.png' /></a>";
		}
		else{
			echo "<a href='publications.php'><img src='images/dimosieuseis_off.png' /></a>";
		}

		echo "</div>
		<div class='logout'>
			<a href='logout.php'><img src='images/logout_off.png' alt=''></a>
		</div>
		<div class='phil'>
			<img src='images/philsek_logo.png' alt=''>
		</div>
	</header>";
	?>