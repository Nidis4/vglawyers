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

$pageElements = getPageElements('expertise');
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

$expertises = getExpertises();
$expertises_num = mysqli_num_rows($expertises);

$i=0;
while ($expertise = mysqli_fetch_array($expertises,MYSQLI_ASSOC)) {
	$i++;
	$lkeimeno_el[$i] = $expertise['KEIMENO_EL'];
	$lkeimeno_en[$i] = $expertise['KEIMENO_EN'];
	$lexplain_el[$i] = $expertise['EXPLAIN_EL'];
	$lexplain_en[$i] = $expertise['EXPLAIN_EN'];
	$lmetatitle_el[$i] = $expertise['METATITLE_EL'];
	$lmetatitle_en[$i] = $expertise['METATITLE_EN'];
	$lmetadesc_el[$i] = $expertise['METADESC_EL'];
	$lmetadesc_en[$i] = $expertise['METADESC_EN'];
	$lmetakey_el[$i] = $expertise['METAKEY_EL'];
	$lmetakey_en[$i] = $expertise['METAKEY_EN'];
	$ltitle_el[$i] = $expertise['TITLE_EL'];
	$ltitle_en[$i] = $expertise['TITLE_EN'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<title></title>
	<?php
		include 'css.php';
	?>
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
			<img src='images/tabs/expertise_list_off.png' class="exeidikeuseis">
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
					<div class="greek"><img src='images/flag_el.jpg' /><input name='metadesc_el' id='metadesc_el' placeholder="Meta Description" value="<?php echo $metadesc_el ?>"></div>
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
					<div class="greek"><img src='images/flag_el.jpg' /><input name='metakey_el' id='metakey_el' placeholder="Meta Keywords" value="<?php echo $metakey_el ?>"></div>
					<div class="english"><img src='images/flag_en.jpg' /><input name='metakey_en' id='metakey_en' placeholder="Meta Keywords" value="<?php echo $metakey_en ?>"></div>
				</div>
				<div class="inputs-info">
				<!--<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.-->
				</div>
			</div>

			<div class="sub-butt expertises_save">
				ΑΠΟΘΗΚΕΥΣΗ
			</div>
		</div> <!-- Meta Data -->

		<div id="title">
			<div class="section-title">
				Ο τίτλος της σελίδας για τους χρήστες
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><input name='title_el' id='title_el' placeholder="Title" value="<?php echo $title_el ?>"></div>
					<div class="english"><img src='images/flag_en.jpg' /><input name='title_en' id='title_en' placeholder="Title" value="<?php echo $title_en ?>"></div>
				</div>
				<div class="inputs-info">
				<!--<strong>RULES & TIPS</strong> <br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit<br><br>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.-->
				</div>
			</div>
			<div class="sub-butt expertises_save">
				ΑΠΟΘΗΚΕΥΣΗ
			</div>
		</div> <!-- Title -->

		<div id="keimeno" class="textar">
			<!--<div class="description">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
			</div>-->

			<div class="section-title">
				Το κεντρικό κείμενο της συγκεκριμένης σελίδας
			</div>
			<div class="section-form">
				<div class="inputs">
					<div class="greek"><img src='images/flag_el.jpg' /><textarea col=20 name='keimeno_el' id='keimeno_el'><?php echo $keimeno_el ?></textarea></div>
					<div class="english"><img src='images/flag_en.jpg' /><textarea col=20 name='keimeno_en' id='keimeno_en'><?php echo $keimeno_en ?></textarea></div>
				</div>

			</div>
			<div class="sub-butt expertises_save">
				ΑΠΟΘΗΚΕΥΣΗ
			</div>
		</div> <!-- Keimeno -->

		<div id="exeidikeuseis">
			<div class="expertises">
				<?php
					for ($i = 1; $i <= $expertises_num; $i++) {
					    echo "<div class='expertise_".$i."'>";
					    if ($i==1){
					    	echo "<img src='images/tabs/expertise_".$i."_on.png' />";
					    }
					    else{
					    	echo "<img src='images/tabs/expertise_".$i."_off.png' />";
					    }
						
						echo "</div>";
					}
				?>
			</div>

			<?php
				$i=0;
				$expertises = getExpertises();

				while ($expertise = mysqli_fetch_array($expertises,MYSQLI_ASSOC)) {
					$i++;
					echo "<div id='expertise_".$i."' class='expertise_area'>";
					echo "<div class='actions'>";
					echo "<img src='images/tabs/metadata_on.png' class='expertise".$i."_metadata'/>";
					echo "<img src='images/tabs/details_off.png' class='expertise".$i."_details'/>";
					echo "</div>";

					echo "<div id='expertise".$i."_metadata'>";
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

					echo "<div id='expertise".$i."_details' class='expertise-details'>";
					
					echo "<div class='two-sections'>";
					echo "<div class='first-sec'>";
					echo "<div class='section-title'>Ο τίτλος της συγκεκριμένης εξειδίκευσης</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='title_el_".$i."' id='title_el_".$i."' placeholder='Τίτλος' value='$ltitle_el[$i]'></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='title_en_".$i."' id='title_en_".$i."' placeholder='Title' value='$ltitle_en[$i]'></div>";
					echo "</div>";
					echo "</div>";
					echo "</div>";
					echo "<div class='sec-sec'>";
					echo "<div class='section-title'>H επεξήγηση της συγκεκριμένης εξειδίκευσης</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='explain_el_".$i."' id='explain_el_".$i."' placeholder='Επεξήγηση' value='$lexplain_el[$i]'></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='explain_en_".$i."' id='explain_en_".$i."' placeholder='Expanation' value='$lexplain_en[$i]'></div>";
					echo "</div>";
					echo "</div>";
					echo "</div>";
					echo "</div>";

					echo "<div class='textar'>";
					echo "<div class='section-title expert'>To κυρίως κείμενο της συγκεκριμένης εξειδίκευσης</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><textarea col=20 name='keimeno_el' id='keimeno_el'>$lkeimeno_el[$i]</textarea></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><textarea col=20 name='keimeno_en' id='keimeno_en'>$lkeimeno_en[$i]</textarea></div>";
					echo "</div>";
					echo "</div>";
					echo "</div>";

					echo "</div>";

					echo "<div class='sub-butt expertise_save' id='save_".$i."'>ΑΠΟΘΗΚΕΥΣΗ</div>";

					echo "</div>";
				}

			?>

		</div> <!-- exeidikeuseis -->



	</div>

	<?php
		include 'footer.php';
	?>
</body>
</html>