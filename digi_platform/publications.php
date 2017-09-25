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

$publications = getPublications();
$publications_num = mysqli_num_rows($publications);

$i=0;
while ($publication = mysqli_fetch_array($publications,MYSQLI_ASSOC)) {
	$i++;
	$lmedia_el[$i] = $publication['MEDIA_EL'];
	$lmedia_en[$i] = $publication['MEDIA_EN'];
	$llawyerid[$i] = $publication['LAWYER_ID'];
	$lpdf[$i] = $publication['PDF'];
	$ltitle_el[$i] = $publication['TITLE_EL'];
	$ltitle_en[$i] = $publication['TITLE_EN'];
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
			<img src='images/tabs/dimosieuseis_off.png' class="dimosieuseis">
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
			<div class="sub-butt publications_save">
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
			<div class="sub-butt publications_save">
					ΑΠΟΘΗΚΕΥΣΗ
				</div>	
		</div> <!-- Title -->



		<div id="dimosieuseis">
			<div class="section-title">
				Δημοσιεύσεις
			</div>
			<div class="addPub">
				Προσθήκη δημοσίευσης
			</div>
			<div class="section-form publicationList">
			<?php
				$publications = getPublications();

				while ($publication = mysqli_fetch_array($publications,MYSQLI_ASSOC)) {
					echo "<div class='publ_".$publication['ID']."'>";
					echo $publication['TITLE_EL'];
					echo "</div>";
				}
			?>
			</div>

			<div id="editSection">
			<?php
				$publications = getPublications();
				$i=0;
					while ($publication = mysqli_fetch_array($publications,MYSQLI_ASSOC)) {
					$i++;
					echo "<div class='publicationEdit' id='publ_".$publication['ID']."'>";
					echo "<div class='two-sections'>";
					echo "<div class='first-sec'>";
					echo "<div class='section-title'>Ο τίτλος της συγκεκριμένης εξειδίκευσης</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='title_el_".$i."' id='title_el_".$i."' placeholder='Τίτλος' value='$ltitle_el[$i]'></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='title_en_".$i."' id='title_en_".$i."' placeholder='Title' value='$ltitle_en[$i]'></div>";
					echo "</div>"; // inputs
					echo "</div>"; // section
					echo "</div>"; // first-sec
					echo "<div class='sec-sec'>";
					echo "<div class='section-title'>Που δημοσιεύθηκε</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'><img src='images/flag_el.jpg' /><input name='media_el_".$i."' id='media_el_".$i."' placeholder='' value='$lmedia_el[$i]'></div>";
					echo "<div class='english'><img src='images/flag_en.jpg' /><input name='media_en_".$i."' id='media_en_".$i."' placeholder='' value='$lmedia_en[$i]'></div>";
					echo "</div>"; //inputs
					echo "</div>"; //section
					echo "</div>"; // sec-sec
					echo "</div>"; // two-sections

					echo "<div class='two-sections'>";
					echo "<div class='first-sec'>";
					echo "<div class='section-title'>Δικηγόρος</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'>";
					echo "<select id='llawyerid_".$i."'>";
					$lawyers = getLawyers();
					while ($lawyer = mysqli_fetch_array($lawyers,MYSQLI_ASSOC)) {
						if ($publication['LAWYER_ID']==$lawyer['LAWYER_ID']){
							echo "<option value='".$lawyer['LAWYER_ID']."' selected>".$lawyer['SURNAME_EL']." ".$lawyer['NAME_EL']."</option>";
						}
						else{
							echo "<option value='".$lawyer['LAWYER_ID']."'>".$lawyer['SURNAME_EL']." ".$lawyer['NAME_EL']."</option>";
						}
					}
					echo "</select>";
					echo "</div>";
					echo "</div>"; // inputs
					echo "</div>"; // section
					echo "</div>"; // first-sec
					echo "<div class='sec-sec'>";
					echo "<div class='section-title'>Ψηφιακό αρχείο (pdf)</div>";
					echo "<div class='section-form'>";
					echo "<div class='inputs'>";
					echo "<div class='greek'>ΠΡΟΣΘΗΚΗ ΑΡΧΕΙΟΥ</div>";
					echo "</div>"; //inputs
					echo "</div>"; //section
					echo "</div>"; // sec-sec
					echo "</div>"; // two-sections

					echo "<div class='sub-butt publication_edit' id='save_".$publication['ID']."'>ΑΠΟΘΗΚΕΥΣΗ</div>";	


					echo "</div>"; //publicationEdit
				}
			?>	
				
			</div> <!-- Edit Publication -->

			<div id="addSection">
					<div class='publicationEdit' id='publ_add'>
					<div class='two-sections'>
					<div class='first-sec'>
					<div class='section-title'>Ο τίτλος της συγκεκριμένης εξειδίκευσης</div>
					<div class='section-form'>
					<div class='inputs'>
					<div class='greek'><img src='images/flag_el.jpg' /><input name='addtitle_el' id='addtitle_el' placeholder='Τίτλος '/></div>
					<div class='english'><img src='images/flag_en.jpg' /><input name='addtitle_en' id='addtitle_en' placeholder='Title' ></div>
					</div>
					</div>
					</div>
					<div class='sec-sec'>
					<div class='section-title'>Που δημοσιεύθηκε</div>
					<div class='section-form'>
					<div class='inputs'>
					<div class='greek'><img src='images/flag_el.jpg' /><input name='addmedia_el' id='addmedia_el' placeholder='' ></div>
					<div class='english'><img src='images/flag_en.jpg' /><input name='addmedia_en' id='addmedia_en' placeholder='' ></div>
					</div>
					</div>
					</div>
					</div>

					<div class='two-sections'>
					<div class='first-sec'>
					<div class='section-title'>Δικηγόρος</div>
					<div class='section-form'>
					<div class='inputs'>
					<div class='greek'>
					<select id='addlawyerid'>
						<?php
					$lawyers = getLawyers();
					while ($lawyer = mysqli_fetch_array($lawyers,MYSQLI_ASSOC)) {
						echo "<option value='".$lawyer['LAWYER_ID']."'>".$lawyer['SURNAME_EL']." ".$lawyer['NAME_EL']."</option>";
					}
					?>
					</select>
					</div>
					</div>
					</div>
					</div>
					<div class='sec-sec'>
					<div class='section-title'>Ψηφιακό αρχείο (pdf)</div>
					<div class='section-form'>
					<div class='inputs'>
					<div class='greek'>ΠΡΟΣΘΗΚΗ ΑΡΧΕΙΟΥ</div>
					</div>
					</div>
					</div>
					</div>

					</div>
					
					<div class="sub-butt publications_add">
						ΑΠΟΘΗΚΕΥΣΗ
					</div>
				
			</div> <!-- Add Publication -->

		</div> <!-- dimosieuseis -->



	</div>

	<?php
		include 'footer.php';
	?>
</body>
</html>