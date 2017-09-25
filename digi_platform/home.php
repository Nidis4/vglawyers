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

$pageElements = getPageElements('homepage');
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
	<link rel="stylesheet" href="css/style.css?version=18">

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
			<img src='images/tab1_off.png' class="tab1">
			<img src='images/tab2_off.png' class="tab2">
			<img src='images/tab3_off.png' class="tab3">
			<img src='images/tab4_off.png' class="tab4">
			<img src='images/tabs/foto_off.png' class="photo">
		</nav>

		<div id="metadata">
			<div class="section-title">
				META TITLE - <span> Ο τίτλος της σελίδας για τις μηχανές αναζήτησης</span>
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><input name='metatitle_el' id='metatitle_el' placeholder="Meta Title" value="<?php echo $metatitle_el ?>" ></div>
					<div class="english"><img src='images/flag_en.jpg' /><input name='metatitle_en' id='metatitle_en' placeholder="Meta Title" value="<?php echo $metatitle_en ?>" ></div>
				</div>
				<div class="inputs-info">
				<!--<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.-->
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
				<!--<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.-->
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
				<!--<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.-->
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
				<!--<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.-->
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

		</div> <!-- Keimeno -->

		<div id="tab1" class="textar">
			<div class="section-title">
				Το κείμενο του πρώτου tab
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><textarea col=20 name='tab1_el' id='tab1_el' ><?php echo $tab1_el ?></textarea></div>
					<div class="english"><img src='images/flag_en.jpg' /><textarea col=20 name='tab1_en' id='tab1_en'><?php echo $tab1_en ?></textarea></div>
				</div>

			</div>

		</div> <!-- Tab 1 -->

		<div id="tab2" class="textar">
			<div class="section-title">
				Το κείμενο του δεύτερου tab
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><textarea col=20 name='tab2_el' id='tab2_el' ><?php echo $tab2_el ?></textarea></div>
					<div class="english"><img src='images/flag_en.jpg' /><textarea col=20 name='tab2_en' id='tab2_en'><?php echo $tab2_en ?></textarea></div>
				</div>

			</div>

		</div> <!-- Tab 2 -->

		<div id="tab3" class="textar">
			<div class="section-title">
				Το κείμενο του τρίτου tab
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><textarea col=20 name='tab3_el' id='tab3_el' ><?php echo $tab3_el ?></textarea></div>
					<div class="english"><img src='images/flag_en.jpg' /><textarea col=20 name='tab3_en' id='tab3_en'><?php echo $tab3_en ?></textarea></div>
				</div>

			</div>

		</div> <!-- Tab 3 -->

		<div id="tab4" class="textar">
			<div class="section-title">
				Το κείμενο του τέταρτου tab
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><textarea col=20 name='tab4_el' id='tab4_el'><?php echo $tab4_el ?></textarea></div>
					<div class="english"><img src='images/flag_en.jpg' /><textarea col=20 name='tab4_en' id='tab4_en'><?php echo $tab4_en ?></textarea></div>
				</div>

			</div>

		</div> <!-- Tab 4 -->

		<div id="photo">
			<div class="section-title">
				Φωτογραφία της Κεντρικής Σελίδας
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="selected-image">
						<?php
							$image = getImageLoc('homepage_main');
						?>
						<img src='<?php echo $image?>' />
					</div>
					<a href='uploadImage.php?pageloc=homepage_main'  onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=300,toolbar=1,resizable=0'); return false;">
					<div class="buttons">
						ΑΛΛΑΓΗ ΦΩΤΟΓΡΑΦΙΑΣ
					</div>
					</a>
				</div>
				<div class="inputs-info">
				<!--<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.-->
				</div>
			</div>

		</div> <!-- Tab 4 -->

		<div class="sub-butt" id="home_save">
			ΑΠΟΘΗΚΕΥΣΗ
		</div>


	</div>

	<?php
		include 'footer.php';
	?>
</body>
</html>