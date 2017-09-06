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

$pageElements = getPageElements('company');
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
			<img src='images/text_off.png' class="keimeno">
			<img src='images/tabs/foto_off.png' class="photo">
		</nav>

		<div id="metadata">

			<div class="section-title">
				META TITLE - <span> Ο τίτλος της σελίδας για τις μηχανές αναζήτησης</span>
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><input name='metatitle_el' id='metatitle_el' placeholder="Meta Title" value="<?php echo $metatitle_el ?>"></div>
					<div class="english"><img src='images/flag_en.jpg' /><input name='metatitle_en' id='metatitle_en' placeholder="Meta Title" value="<?php echo $metatitle_en ?>"></div>
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
					<div class="greek"><img src='images/flag_el.jpg' /><input name='metadesc_el' id='metadesc_el' placeholder="Meta Description" value="<?php echo $metadesc_el ?>" ></div>
					<div class="english"><img src='images/flag_en.jpg' /><input name='metadesc_en' id='metadesc_en' placeholder="Meta Description" value="<?php echo $metadesc_en ?>"></div>
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
					<div class="greek"><img src='images/flag_el.jpg' /><input name='metakey_el' id='metakey_el' placeholder="Meta Keywords" value="<?php echo $metakey_el ?>" ></div>
					<div class="english"><img src='images/flag_en.jpg' /><input name='metakey_en' id='metakey_en' placeholder="Meta Keywords" value="<?php echo $metakey_en ?>"></div>
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
					<div class="greek"><img src='images/flag_el.jpg' /><input name='title_el' id='title_el' placeholder="Title" value="<?php echo $title_el ?>" ></div>
					<div class="english"><img src='images/flag_en.jpg' /><input name='title_en' id='title_en' placeholder="Title" value="<?php echo $title_en ?>"></div>
				</div>
				<div class="inputs-info">
				<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</div>
			</div>

		</div> <!-- Title -->

		<div id="keimeno" class="textar">


			<div class="section-title">
				Το κείμενο της κεντρικής σελίδας
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><textarea col=20 name='keimeno_el' id='keimeno_el'><?php echo $keimeno_el ?></textarea></div>
					<div class="english"><img src='images/flag_en.jpg' /><textarea col=20 name='keimeno_en' id='keimeno_en' ><?php echo $keimeno_en ?></textarea></div>
				</div>

			</div>

		</div> 

		<div id="photo" class="textar">
			<div class="section-title">
				Το κείμενο της κεντρικής σελίδας
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><textarea col=20></textarea></div>
					<div class="english"><img src='images/flag_en.jpg' /><textarea col=20></textarea></div>
				</div>

			</div>

		</div> 

		<div class="sub-butt" id="company_save">
			ΑΠΟΘΗΚΕΥΣΗ
		</div>


	</div>

	<?php
		include 'footer.php';
	?>
</body>
</html>