<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (isset($_SESSION['user']) && $_SESSION['user']=="vglawyer" ){

}
else{
    header("Location: index.php");
}
include 'functions.php';

$pageElements = getPageElements('publications');
$metatitle_el = $pageElements['METATITLE_EL'];
$metatitle_en = $pageElements['METATITLE_EN'];
$metadesc_el = $pageElements['METADESC_EL'];
$metadesc_en = $pageElements['METADESC_EN'];
$metakey_el = $pageElements['METAKEY_EL'];
$metakey_en = $pageElements['METAKEY_EN'];
$title_el = $pageElements['TITLE_EL'];
$title_en = $pageElements['TITLE_EN'];
$keimeno_el = $pageElements['KEIMENO_EL'];
$keimeno_en = $pageElements['KEIMENO_EN'];
$tab1_el = $pageElements['TAB1_EL'];
$tab1_en = $pageElements['TAB1_EN'];
$tab2_el = $pageElements['TAB2_EL'];
$tab2_en = $pageElements['TAB2_EN'];
$tab3_el = $pageElements['TAB3_EL'];
$tab3_en = $pageElements['TAB3_EN'];
$tab4_el = $pageElements['TAB4_EL'];
$tab4_en = $pageElements['TAB4_EN'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<title></title>
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<?php
		include 'header.php';
	?>
	<div id="main-area">
		<nav>
			<img src='images/metadata_on.png' class="metadata">
			<img src='images/title_off.png' class="title">
			<img src='images/tabs/dimosieuseis_off.png' class="dimosieuseis">
		</nav>

		<div id="metadata">
			<div class="section-title">
				META TITLE - <span> Ο τίτλος της σελίδας για τις μηχανές αναζήτησης</span>
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><input name='metatitle_el' id='metatitle_el' placeholder="Meta Title"></div>
					<div class="english"><img src='images/flag_en.jpg' /><input name='metatitle_en' id='metatitle_en' placeholder="Meta Title"></div>
				</div>
				<div class="inputs-info">
				<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</div>
			</div>

			
			<div class="section-title">
				META DESCRIPTION - <span> Η περιγραφή της σελίδας για τις μηχανές αναζήτησης</span>
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><input name='metadesc_el' id='metadesc_el' placeholder="Meta Description"></div>
					<div class="english"><img src='images/flag_en.jpg' /><input name='metadesc_en' id='metadesc_en' placeholder="Meta Description"></div>
				</div>
				<div class="inputs-info">
				<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</div>
			</div>

			<div class="section-title">
				META KEYWORDS - <span> Οι λέξεις κλειδιά της σελίδας για τις μηχανές αναζήτησης</span>
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><input name='metakey_el' id='metakey_el' placeholder="Meta Keywords"></div>
					<div class="english"><img src='images/flag_en.jpg' /><input name='metakey_en' id='metakey_en' placeholder="Meta Keywords"></div>
				</div>
				<div class="inputs-info">
				<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</div>
			</div>

		</div> <!-- Meta Data -->

		<div id="title">
			<div class="section-title">
				Ο τίτλος της σελίδας για τους χρήστες
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><input name='title_el' id='title_el' placeholder="Title"></div>
					<div class="english"><img src='images/flag_en.jpg' /><input name='title_en' id='title_en' placeholder="Title"></div>
				</div>
				<div class="inputs-info">
				<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</div>
			</div>
		</div> <!-- Title -->



		<div id="dimosieuseis">
			<div class="section-title">
				Ο τίτλος της σελίδας για τους χρήστες
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><input name='' placeholder="Test"></div>
					<div class="english"><img src='images/flag_en.jpg' /><input name='' placeholder="test"></div>
				</div>
				<div class="inputs-info">
				<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</div>
			</div>
		</div> <!-- dimosieuseis -->

		

		<div class="sub-butt" id='publications_save'>
			ΑΠΟΘΗΚΕΥΣΗ
		</div>


	</div>

	<?php
		include 'footer.php';
	?>
</body>
</html>