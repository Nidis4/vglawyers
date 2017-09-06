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

$pageElements = getPageElements('lawyers');
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

$lawyers = getLawyers();

$lawyers_num = mysqli_num_rows($lawyers);


$i=0;
while ($lawyer = mysqli_fetch_array($lawyers,MYSQLI_ASSOC)) {
	$i++;
	$lname_el[$i] = $lawyer['NAME_EL'];
	$lname_en[$i] = $lawyer['NAME_EN'];
	$lsurname_el[$i] = $lawyer['SURNAME_EL'];
	$lsurname_en[$i] = $lawyer['SURNAME_EN'];
	$lemail[$i] = $lawyer['EMAIL'];
	$lcv_el[$i] = $lawyer['CV_EL'];
	$lcv_en[$i] = $lawyer['CV_EN'];
	$lexpert1_el[$i] = $lawyer['EXPERT1_EL'];
	$lexpert1_en[$i] = $lawyer['EXPERT1_EN'];
	$lexpert2_el[$i] = $lawyer['EXPERT2_EL'];
	$lexpert2_en[$i] = $lawyer['EXPERT2_EN'];
	$lexpert3_el[$i] = $lawyer['EXPERT3_EL'];
	$lexpert3_en[$i] = $lawyer['EXPERT3_EN'];
	$lexpert4_el[$i] = $lawyer['EXPERT4_EL'];
	$lexpert4_en[$i] = $lawyer['EXPERT4_EN'];	
	$lmetatitle_el[$i] = $lawyer['METATITLE_EL'];
	$lmetatitle_en[$i] = $lawyer['METATITLE_EN'];
	$lmetadesc_el[$i] = $lawyer['METADESC_EL'];
	$lmetadesc_en[$i] = $lawyer['METADESC_EN'];
	$lmetakey_el[$i] = $lawyer['METAKEY_EL'];
	$lmetakey_en[$i] = $lawyer['METAKEY_EN'];
	$ltitle_el[$i] = $lawyer['TITLE_EL'];
	$ltitle_en[$i] = $lawyer['TITLE_EN'];

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<title></title>
	<link rel="stylesheet" href="css/style.css?version=4">

</head>
<body>
	<?php
		include 'header.php';
	?>
	<div id="main-area">
		<nav>
			<img src='images/metadata_on.png' class="metadata">
			<img src='images/title_off.png' class="title">
			<img src='images/tabs/lawyers_list_off.png' class="lawyerslist">
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
			<div class="sub-butt lawyers_save">
				ΑΠΟΘΗΚΕΥΣΗ
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

			<div class="sub-butt lawyers_save">
				ΑΠΟΘΗΚΕΥΣΗ
			</div>

		</div> <!-- Title -->

		<div id="lawyerslist">

			<div class="lawyers">
				<?php
					for ($i = 1; $i <= $lawyers_num; $i++) {
					    echo "<div class='lawyer_".$i."'>";
					    if ($i==1){
					    	echo "<img src='images/tabs/lawyer_".$i."_on.png' />";
					    }
					    else{
					    	echo "<img src='images/tabs/lawyer_".$i."_off.png' />";
					    }
						
						echo "</div>";
					}
				?>
			</div>
			<?php
				$i=0;
				$lawyers = getLawyers();
				while ($lawyer = mysqli_fetch_array($lawyers,MYSQLI_ASSOC)) {
					$i++;
					echo "<div id='lawyer_".$i."' class='lawyer_area'>";
					echo "<div class='actions'>";
					echo "<img src='images/tabs/metadata_on.png' class='lawyer".$i."_metadata'/>";
					echo "<img src='images/tabs/title_off.png' class='lawyer".$i."_title'/>";
					echo "<img src='images/tabs/details_off.png' class='lawyer".$i."_details'/>";
					echo "<img src='images/tabs/cv_off.png' class='lawyer".$i."_cv'/>";
					echo "</div>";

					echo "<div id='lawyer".$i."_metadata'>";
					echo "<div class='section-title'>";
					echo "META TITLE - <span> Ο τίτλος της σελίδας για τις μηχανές αναζήτησης</span>";
					echo "</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='metatitle_el_".$i."' id='metatitle_el_".$i."' placeholder='Meta Title' value='$lmetatitle_el[$i]' ></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='metatitle_en_".$i."' id='metatitle_en_".$i."' placeholder='Meta Title' value='$lmetatitle_en[$i]' ></div>";
					echo "</div>";
					echo "<div class='inputs-info'>";
					echo "<strong>RULES & TIPS</strong> <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
					echo "</div>";
					echo "</div>";

					echo "<div class='section-title'>";
					echo "META DESCRIPTION - <span> Η περιγραφή της σελίδας για τις μηχανές αναζήτησης</span>";
					echo "</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='metadesc_el_".$i."' id='metadesc_el_".$i."' placeholder='Meta Title' value='$lmetadesc_el[$i]' ></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='metadesc_en_".$i."' id='metadesc_en_".$i."' placeholder='Meta Title' value='$lmetadesc_en[$i]' ></div>";
					echo "</div>";
					echo "<div class='inputs-info'>";
					echo "<strong>RULES & TIPS</strong> <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
					echo "</div>";
					echo "</div>";

					echo "<div class='section-title'>META KEYWORDS - <span> Οι λέξεις κλειδιά της σελίδας για τις μηχανές αναζήτησης</span></div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='metakey_el_".$i."' id='metakey_el_".$i."' placeholder='Meta Title' value='$lmetakey_el[$i]' ></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='metakey_en_".$i."' id='metakey_en_".$i."' placeholder='Meta Title' value='$lmetakey_en[$i]' ></div>";
					echo "</div>";
					echo "<div class='inputs-info'>";
					echo "<strong>RULES & TIPS</strong> <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
					echo "</div>";
					echo "</div>";
					echo "</div>";

					echo "<div id='lawyer".$i."_title'>";
					echo "<div class='section-title'>Ο τίτλος της σελίδας για τους χρήστες</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='title_el_".$i."' id='title_el_".$i."' placeholder='Title' value='$ltitle_el[$i]'></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='title_en_".$i."' id='title_en_".$i."' placeholder='Title' value='$ltitle_en[$i]' ></div>";
					echo "</div>";
					echo "<div class='inputs-info'>";
					echo "<strong>RULES & TIPS</strong> <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
					echo "</div>";
					echo "</div>";
					echo "</div>";

					echo "<div id='lawyer".$i."_details' class='lawyer-details'>";
					echo "<div class='section-title'>Το όνομα του συγκεκριμένου δικηγόρου</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='name_el_".$i."' id='name_el_".$i."' placeholder='Όνομα' value='$lname_el[$i]'></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='name_en_".$i."' id='name_en_".$i."' placeholder='Name' value='$lname_en[$i]'></div>";
					echo "</div>";
					echo "</div>";
					echo "<div class='two-sections'>";
					echo "<div class='first-sec'>";
					echo "<div class='section-title'>Το επίθετο του συγκεκριμένου δικηγόρου</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='surname_el_".$i."' id='surname_el_".$i."' placeholder='Επίθετο' value='$lsurname_el[$i]'></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='surname_en_".$i."' id='surname_en_".$i."' placeholder='Surname' value='$lsurname_en[$i]'></div>";
					echo "</div>";
					echo "</div>";
					echo "</div>";
					echo "<div class='sec-sec'>";
					echo "<div class='section-title'>Το e-mail του συγκεκριμένου δικηγόρου</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><input name='email_".$i."' id='email_".$i."' placeholder='e-mail' value='$lemail[$i]'></div>";
					echo "</div>";
					echo "</div>";
					echo "</div>";
					echo "</div>";
					echo "<div class='section-title expert'>Πεδία εξιδίκευσης του συγκεκριμένου δικηγόρου</div>";
					echo "<div class='section-form expert'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='expert1_el_".$i."' id='expert1_el_".$i."' placeholder='Expert 1' value='$lexpert1_el[$i]'></div>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='expert2_el_".$i."' id='expert2_el_".$i."' placeholder='Expert 2' value='$lexpert2_el[$i]'></div>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='expert3_el_".$i."' id='expert3_el_".$i."' placeholder='Expert 3' value='$lexpert3_el[$i]'></div>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='expert4_el_".$i."' id='expert4_el_".$i."' placeholder='Expert 4' value='$lexpert4_el[$i]'></div>";
					echo "</div>";
					echo "</div>";
					echo "<div class='section-form expert'>";
					echo "<div class='inputs'>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='expert1_en_".$i."' id='expert1_en_".$i."' placeholder='Expert 1' value='$lexpert1_en[$i]'></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='expert2_en_".$i."' id='expert2_en_".$i."' placeholder='Expert 2' value='$lexpert2_en[$i]'></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='expert3_en_".$i."' id='expert3_en_".$i."' placeholder='Expert 3' value='$lexpert3_en[$i]'></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='expert4_en_".$i."' id='expert4_en_".$i."' placeholder='Expert 4' value='$lexpert4_en[$i]'></div>";
					echo "</div>";
					echo "</div>";

					echo "</div>";

					echo "<div id='lawyer".$i."_cv' class='textar'>";
					echo "<div class='section-title'>Το βιογραφικό</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><textarea col=20 name='cv_el_".$i."' id='cv_el_".$i."'>$lcv_el[$i]</textarea></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><textarea col=20 name='cv_en_".$i."' id='cv_en_".$i."'>$lcv_en[$i]</textarea></div>";
					echo "</div>";
					echo "</div>";
					echo "</div>";

					echo "<div class='sub-butt lawyer_save' id='save_".$i."'>ΑΠΟΘΗΚΕΥΣΗ</div>";

					echo "</div>";
	
				}
			?>


		</div>



	</div>

	<?php
		include 'footer.php';
	?>
</body>
</html>