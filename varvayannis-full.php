<?
//------------------------------------------------------------------------------------------------------------------------------------------------------//
require_once("inc.php");
//------------------------------------------------------------------------------------------------------------------------------------------------------//
$r=@$_REQUEST;
	$sql="SELECT * FROM `lawyers` WHERE `enabled`='1';";
	$mysqli->query($sql);
	$lawyersData=$mysqli->fetch_all();
	//print_r($lawyersData);
if($r['id']){
	settype($r['id'], 'integer'); //SANITIZE INPUT!
	$sql="SELECT * FROM `lawyers` WHERE `id`='".$r['id']."';";
	$lawyerData=$mysqli->fetchq($sql);
	//print_r($lawyerData);
	
	// Get the areas of expertise for each lawyer...
	settype($r['id'], 'integer'); //SANITIZE INPUT!
	$sql="SELECT * FROM `lawyer_expertise` WHERE `lawyer_id`='".$r['id']."' ORDER BY `order` ASC;";
	$mysqli->query($sql);
	$lawyerExpertiseData=$mysqli->fetch_all();
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?=$lawyerData['meta_keywords_'.LANG]?>" />
<meta name="description" content="<?=$lawyerData['meta_description_'.LANG]?>" />
<title><?=SITENAME.' '.$l['pt-2']?> > Έλενα Βαρβαγιάννη - Αναλυτικό Βιογραφικό</title>
<?=css()?>
<style type="text/css">
<!--
#page-loader{position:relative;left:450px;top:235px;width:60px;height:60px;}
#scrollable{height:430px;width:720px;overflow:hidden;}
-->
</style>
<?=js()?>
<script type="text/javascript" language="javascript" src="js/jquery/plugins/jquery.hoverIntent.minified.js"></script>

<script type="text/javascript" language="javascript">
$(document).ready(function(){	
	
	pageAnimationCallBack=function(){
		//setTimeout(performPageAnimation,5000);
		performPageAnimation();
	}
	
	performPageAnimation=function(){
		$("#page-loader").addClass("dn");
		
		$(".lawyer-menu").removeClass("dn");
		
		$(".lawyer-menu")			.delay(1000).animate({height: '40'}, 480, function() { });
		$(".ul")							.delay(1000).animate({top: '-100px'}, 480, function() { });
		$(".ul img")					.delay(1000).animate({opacity:'0'}, 480, function() { });
		$(".ul span")					.delay(1000).animate({top: '7px'}, 480, function() { });
		
		$(".lawyer-cv")				.delay(1000).animate({height: '480'}, 480, function() { });
		$(".lawyer-img-small").delay(1000).animate({bottom: '290px',opacity:'1'}, 480, function() { });
		$(".expertise")				.delay(1000).animate({height: '270'}, 480, function() { });
	}
	
	$(".w-main").find('img').batchImageLoad({
		loadingCompleteCallback: pageAnimationCallBack
	});


	/* Lawyer(s) Menu - Start */
	$(".lawyer-menu").hoverIntent({
			over: tclmEnter, 
			timeout: 1000, 
			out: tclmLeave
	});

	function tclmEnter(){
		$(".lawyer-menu")			.delay(500).animate({height: '150'}, 480, function() { });
		$(".ul")							.delay(500).animate({top: '13px'}, 480, function() { });
		$(".ul img")					.delay(500).animate({opacity:'1'}, 480, function() { });
		$(".ul span")					.delay(500).animate({top: '-1px'}, 480, function() { });
		$(".lawyer-cv")				.delay(500).animate({height: '380'}, 480, function() { });
		$(".lawyer-img-small").delay(500).animate({bottom: '190px'}, 480, function() { });
		$(".expertise")				.delay(500).animate({height: '170'}, 480, function() { });
	}
	function tclmLeave(){
		$(".lawyer-menu")			.delay(500).animate({height: '40'}, 480, function() { });
		$(".ul")							.delay(500).animate({top: '-100px'}, 480, function() { });
		$(".ul img")					.delay(500).animate({opacity:'0'}, 480, function() { });
		$(".ul span")					.delay(500).animate({top: '7px'}, 480, function() { });
		$(".lawyer-cv")				.delay(500).animate({height: '480'}, 480, function() { });
		$(".lawyer-img-small").delay(500).animate({bottom: '290px'}, 480, function() { });
		$(".expertise")				.delay(500).animate({height: '270'}, 480, function() { });
	}
	/* Lawyer(s) Menu - End */
		
	$('#scrollable').jScrollPane({
		showArrows: true,
		scrollbarMargin:0,
		scrollbarWidth:13
	});
	
	$('.jScrollPaneDrag').css('height','13px');
	$('.jScrollPaneDrag').css('height','13px');
	$('.jScrollPaneDrag').css('width','13px');
	$('.jScrollArrowUp').css('width','13px');
	$('.jScrollArrowDown').css('width','13px');
	$('.jScrollPaneContainer').css('width','736px');
	$('#scrollable').css('width','720px');
		
});
</script>
<?=favicon()?>
<?=google_analytics()?>
</head>
<body>
<?=head()?>
<div class="w-main">
	<div class="shdw-head"></div> 
	<div class="shdw-foot"></div>  
	<div class="bg"></div>
	<div class="w">
  	<div id="page-loader"><img src="imgs/preloader-inner.gif" alt="preloader" width="60" height="60" border="0" /></div>
    <?
		if(!empty($lawyersData)){
			echo '<div class="lawyer-menu dn">
							<ul class="no-mp no-lst ul">';
			for($i=0;$i<count($lawyersData);$i++){
				echo '<li>
								<a href="lawyer-info.php?id='.$lawyersData[$i]['id'].'">
									<img src="imgs/lawyers/'.$lawyersData[$i]['pic_small'].'" width="100" height="100" border="0" alt="" />
									<br />
									<span class="webfont">'.$lawyersData[$i]['short_name_'.LANG].'</span>
								</a>
							</li>';
			}
			echo '	</ul>
						</div>';
		}
		?>
  	
    <div class="lawyer-cv">
  		<div class="cv-txt">
        <div id="scrollable">
        
          <p style="font-size:16px;margin-bottom:10px;"><b>Έλενα Βαρβαγιάννη - Αναλυτικό Βιογραφικό</b></p>

          <p style="margin-bottom:10px;">				
            <b>ΕΠΑΓΓΕΛΜΑΤΙΚΗ ΣΤΑΔΙΟΔΡΟΜΙΑ:</b><br />
            <b>Ιανουάριος 2001 – Σήμερα:</b> Senior Partner στη Δικηγορική Εταιρεία "VG LAWYERS".<br />
            <b>Μάρτιος 1996 – Ιανουάριος 2001:</b> Junior Associate και αργότερα Senior Associate στο Δικηγορικό Γραφείο "Κ.Φ. Καλαβρός &amp; Συνεργάτες".<br />
            <b>Νοέμβριος 1993 – Ιανουάριος 1996:</b> Junior Associate στο Δικηγορικό Γραφείο "Βαϊνανίδης, Σχοινά, Οικονόμου".
          </p>

          <p style="margin-bottom:10px;">				
            <b>ΕΠΑΓΓΕΛΜΑΤΙΚΗ ΕΜΠΕΙΡΙΑ:</b>
            <ul style="margin-left:14px;margin-top:-10px;padding:0;">
              <li>Ενασχόληση με ζητήματα που αφορούν όλο τον κύκλο εργασιών Ανωνύμων Εταιρειών και Εταιρειών Περιορισμένης Ευθύνης.</li>
              <li>Συγχωνεύσεις Εταιρειών.</li>
              <li>Συμβάσεις στα πλαίσια εκτέλεσης Δημοσίων Έργων στην Ελλάδα και το εξωτερικό.</li>
              <li>Σύνταξη Νομοσχεδίου για την απελευθέρωση της αγοράς των Ταξί στην Ελλάδα.</li>
              <li>Ενασχόληση με ζητήματα που αφορούν το Δίκαιο Τροφίμων &amp; Ποτών.</li>
              <li>Ενασχόληση με ζητήματα που αφορούν την προστασία Δικαιωμάτων Πνευματικής Ιδιοκτησίας &amp; Σημάτων.</li>
              <li>Συμβάσεις Διανομέων &amp; Εμπορικών Αντιπροσώπων.</li>
              <li>Συμμετοχή στην ομάδα Νομικών Συμβούλων του ΟΤΕ για την πρώτη εισαγωγή των μετοχών του τόσο στο Χρηματιστήριο Αξιών Αθηνών όσο και στο New York Stock Exchange.</li>
              <li>Συμμετοχή στην ομάδα Νομικών Συμβούλων του ΟΤΕ όπου μαζί με διεθνή Στρατηγικό Σύμβουλο εργάστηκε για το σχεδιαζόμενο "Pay TV &amp; Broadband Services Project" του Οργανισμού.</li>
              <li>Συμμετοχή στην ομάδα Νομικών Συμβούλων του ΟΤΕ για την ίδρυση της εταιρείας κινητής τηλεφωνίας "COSMOTE".</li>
              <li>Συμμετοχή στην ομάδα Νομικών Συμβούλων του ΟΤΕ για την ίδρυση και λειτουργία της θυγατρικής του εταιρείας θαλασσίων τηλεπικοινωνιών "MARITEL S.A."</li>
              <li>Παροχή νομικών συμβουλών και διαπραγματεύσεις για λογαριασμό του Επίσημου Διανομέα ("Distributor") της "MINOLTA" στην Ελλάδα με τη μητρική εταιρεία της "ΜINOLTA" Ιαπωνίας.</li>
              <li>Νομικοί Έλεγχοι σε Ανώνυμες Εταιρείες για την εισαγωγή των μετοχών τους στο Χρηματιστήριο Αξιών Αθηνών.</li>
              <li>Παροχή νομικών υπηρεσιών σε μεγάλες πολυεθνικές και ημεδαπές Φαρμακευτικές Επιχειρήσεις, όπως: "NOVARTIS HELLAS", "MERCK USA", "Π.Ν. ΓΕΡΟΛΥΜΑΤΟΣ Α.Ε.Β.Ε.", "FARAN LABORATORIES S.A."</li>
              <li>Συμμετοχή στην ομάδα εκπροσώπησης του Συνδέσμου Φαρμακευτικών Επιχειρήσεων Ελλάδας ("Σ.Φ.Ε.Ε.") με σκοπό την "αντικειμενικοποίηση" των τιμών των Φαρμακευτικών Ιδιοσκευασμάτων στην Ελλάδα.</li>
              <li>Μέλος τριμελούς ομάδας, η οποία εκπροσωπώντας τον Σ.Φ.Ε.Ε. και σε συνεργασία με τον European Federation of Pharmaceutical Industries and Associations ("EFPIA"), παρέστη ενώπιον του αρμοδίου Κοινοτικού Επιτρόπου για την επιδίωξη δικαιότερης τιμολόγησης των Φαρμακευτικών Ιδιοσκευασμάτων στην Ελλάδα.</li>
              <li>Μέλος τριμελούς ομάδας, η οποία εκπροσωπώντας τον Σ.Φ.Ε.Ε. και σε συνεργασία με τον EFPIA, διαχειρίστηκε ζήτημα Καταγγελίας στην Ευρωπαϊκή Επιτροπή για την τιμολόγηση των Φαρμακευτικών Ιδιοσκευασμάτων στην Ελλάδα.</li>
              <li>Μέλος τριμελούς ομάδας, η οποία εκπροσωπώντας τον Σ.Φ.Ε.Ε. συνέταξε Αίτησης Αναστολής και Αίτησης Ακυρώσεως ενώπιον του Συμβουλίου της Επικρατείας για την κατάργηση της πρώτης "Λίστας Συνταγογραφούμενων Ιδιοσκευασμάτων".</li>
              <li>Σύνταξη συμβάσεων με το "Εθνικό Κέντρο Φυσικών Επιστημών και Έρευνας - Δημόκριτος" και το Εθνικό &amp; Καποδιστριακό Πανεπιστήμιο Αθηνών για "in vitro" έρευνες Φαρμακευτικών Ουσιών.</li>
              <li>Επιμέλεια "Informed Consents" προς χρήση σε κλινικές μελέτες στην Ελλάδα.</li>
              <li>Υποβολή Φακέλων στον Οργανισμό Βιομηχανικής Ιδιοκτησίας ("Ο.Β.Ι.") για την απόκτηση Διπλωμάτων Ευρεσιτεχνίας ("Πατέντες") για Φαρμακευτικά Ιδιοσκευάσματα.</li>
              <li>Υποβολή Φακέλων στον Εθνικό Οργανισμό Φαρμάκων ("Ε.Ο.Φ.") για την αδειοδότηση της κυκλοφορίας Φαρμακευτικών Ιδιοσκευασμάτων στην εγχώρια αγορά.</li>
              <li>Μέλος τριμελούς ομάδας, η οποία για λογαριασμό του Εμπορικού και Βιομηχανικού Επιμελητηρίου Αθηνών ("Ε.Β.Ε.Α."), επεξεργάστηκε την τροποποίηση, μεταγλώττιση στη δημοτική και κωδικοποίηση του Νόμου 703/1977 “Περί Ελέγχου Μονοπωλίων και Ολιγοπωλίων και Προστασίας του Ελεύθερου Ανταγωνισμού”. Εκπονήθηκε πλήρες Σχέδιο Νόμου και Εισηγητική Έκθεση, τα οποία υπεβλήθησαν στον τότε Υπουργό Εμπορίου Κωνσταντίνο Σημίτη.</li>
              <li>Μέλος τριμελούς ομάδας, η οποία για λογαριασμό του Ε.Β.Ε.Α., επεξεργάστηκε την τροποποίηση, μεταγλώττιση στη δημοτική και κωδικοποίηση του Νόμου 146/1914 "Περί Αθέμιτου Ανταγωνισμού".  Εκπονήθηκε πλήρες Σχέδιο Νόμου και Εισηγητική Έκθεση, τα οποία υπεβλήθησαν στον τότε Υπουργό Εμπορίου Κωνσταντίνο Σημίτη.</li>
              <li>Συμμετοχή σε διμελή ομάδα, η οποία προέβη ενώπιον της Ελληνικής Επιτροπής Ανταγωνισμού στην πρώτη Προηγούμενη Γνωστοποίηση Συγκέντρωσης Επιχειρήσεων ("Prior Notification of Concentration") -Εξαγορά Εταιρείας δραστηριοποιούμενης στο χώρο της υγείας.</li>
            </ul>
          </p>

          <p style="margin-bottom:10px;">
            <b>ΜΟΡΦΩΣΗ:</b><br />
            <b>Σεπτέμβριος 2012 – Ιούνιος 2014:</b> ΙΑΤΡΙΚΗ ΣΧΟΛΗ ΤΟΥ ΕΘΝΙΚΟΥ ΚΑΙ ΚΑΠΟΔΙΣΤΡΙΑΚΟΥ ΠΑΝΕΠΙΣΤΗΜΙΟΥ ΑΘΗΝΩΝ - ΠΡΟΓΡΑΜΜΑ ΜΕΤΑΠΤΥΧΙΑΚΩΝ ΣΠΟΥΔΩΝ <b>MSc. (Master's Degree) στη "ΔΙΕΘΝΗ ΙΑΤΡΙΚΗ – ΔΙΑΧΕΙΡΙΣΗ ΚΡΙΣΕΩΝ ΥΓΕΙΑΣ"</b><br />
            Βαθμός Πτυχίου: Λίαν Καλώς, 8,23<br />
            <b>Σεμινάρια &amp; Κύκλοι Μαθημάτων:</b>
            <ul style="margin-left:14px;margin-top:-10px;padding:0;">
              <li>Επιδημιολογία Πεδίου &amp; Δημόσια Υγεία.</li>
              <li>Ιατρική Κοινότητας.</li>
              <li>Διεθνής – Ανθρωπιστική Ιατρική.</li> 
              <li>Ιατρική Καταστροφών.</li>
              <li>Advanced Course in Disaster Medicine.</li>
              <li>Μετατραυματικό Σύνδρομο ("PTSD") σε Κρίσεις &amp; Καταστροφές.</li>
              <li>Project Cycle Management (Οργάνωση Αποστολής).</li>
              <li>Διαχείριση Κρίσεων Υγείας &amp; ΜΜΕ.</li>
              <li>Hospital Disaster Preparedness (Διαχείριση Κρίσεων σε Νοσοκομειακό Περιβάλλον).</li>
              <li>Ιατρική στη Θάλασσα &amp; Ιατρική Καταδύσεων.</li>
              <li>Ιατρική Βουνού και Ιατρική σε Αντίξοες Συνθήκες.</li>
            </ul>            

            <b>Σεπτέμβριος 1991 – Οκτώβριος 1992:</b> UNIVERSITY OF KENT AT CANTERBURY, <b>"LL.M. (Master's Degree) in International Commercial Law".</b><br />
            <b>Κύκλοι Μαθημάτων:</b>
            <ul style="margin-left:14px;margin-top:0px;padding:0;">
              <li>EEC LAW</li>
              <li>INTELLECTUAL PROPERTY</li>
              <li>INTERNATIONAL BUSINESS TRANSACTIONS</li>
            </ul>
            <b>Οκτώβριος 1984 – Ιούνιος 1991:</b> ΣΧΟΛΗ ΝΟΜΙΚΩΝ ΠΟΛΙΤΙΚΩΝ ΚΑΙ ΟΙΚΟΝΟΜΙΚΩΝ ΕΠΙΣΤΗΜΩΝ ΤΟΥ ΕΘΝΙΚΟΥ ΚΑΙ ΚΑΠΟΔΙΣΤΡΙΑΚΟΥ ΠΑΝΕΠΙΣΤΗΜΙΟΥ ΑΘΗΝΩΝ - ΤΜΗΜΑ ΝΟΜΙΚΟ<br />
            Βαθμός Πτυχίου: Λίαν Καλώς, 7,2
            <br /><br />
            <b>Σεπτέμβριος 1978 – Ιούνιος 1984:</b> ΙΟΝΙΟΣ ΣΧΟΛΗ<br />
            Βαθμός Απολυτηρίου: Άριστα 19 &amp; 3/10
            <br /><br />
            <b>Εργασίες &amp; Δημοσιεύσεις στα πλαίσια των Μεταπτυχιακών Σπουδών:</b>
            <ul style="margin-left:14px;margin-top:0px;padding:0;">
              <li>"Κέντρο Έρευνας και Εκπαίδευσης στην Ιατρική των Καταστροφών στη Νοτιοανατολική Μεσόγειο – Η Σύσταση του Κέντρου Έρευνας" (Διπλωματική Διατριβή δημοσιευθείσα στη Βιβλιοθήκη της Ιατρικής Σχολής του Εθνικού και Καποδιστριακού Πανεπιστημίου Αθηνών, Ιούνιος 2014).</li>
              <li>"A Centre for Modern Research and Education in Disaster Medicine in Southeastern Mediterranean" (Διμελής Ομάδα Εργασίας), Μάιος 2013.</li>
              <li>"21 Δεκεμβρίου 2012, Ημερολόγιο των Μάγια: Θεωρίες Καταστροφής του Κόσμου" (Ομαδική Εργασία), Ιανουάριος 2013.</li>
              <li>Ερευνητικό Πρωτόκολλο: "Παράγοντες Κινδύνου για Νόσηση από Χολέρα στην Αϊτή κατά την Επιδημία του 2010" (Ομαδική Εργασία), Ιανουάριος 2013.</li>
              <li>"Copyright Protection for Satellite Broadcasting in the Community", Διπλωματική Διατριβή δημοσιευθείσα στη Βιβλιοθήκη του "University of Kent at Canterbury", Οκτώβριος 1992.</li>
              <li>"The Supremacy of EEC LAW and the Judicial Practice".</li>
              <li>"Copyright Protection for Satellite Broadcasting in the Community - "The Proposal for a Council Directive" (Distinction).</li>
              <li>"EEIG a New Form of Company within EEC".</li>
              <li>"Patent Protection for Animals – The Onco-Mouse in the European Patent Office".</li>
              <li>"Theoretical Implications for the Satellite Broadcasting – The Bogsch Theory' (Distinction).</li>
              <li>"Franchise Agreements under the EC Competition Rules" (Distinction).</li>
              <li>"F.O.B. - Over the Ship's Rail in View of Modern Practices".</li>
              <li>"Factoring and its Application to Modern Businesses".</li>
            </ul>
          </p>

          <p style="margin-bottom:10px;">
            <b>ΛΟΙΠΕΣ ΔΗΜΟΣΙΕΥΣΕΙΣ:</b><br />
            <ul style="margin-left:14px;margin-top:-10px;padding:0;">
              <li>Παρατηρήσεις στην Πρόταση του Υπουργείου Εμπορίου για την Τροποποίηση του Ν. 703/77, "Η ΝΑΥΤΕΜΠΟΡΙΚΗ", Παρασκευή 22 Ιουλίου 1994.</li>
              <li>Ανταποκρίτρια του Περιοδικού "Corporate Acquisitions and Mergers – Newsletter", Kluwer Law International, 1994 – 1995, σε θέματα σχετικά με την εφαρμογή του δικαίου της Ευρωπαϊκής Ένωσης στον τομέα του εμπορικού δικαίου στην Ελλάδα.</li>
              <li>"Competition Laws of Europe – Chapter IX", Butterworths, 1995.</li>
              <li>"Greek Business Law: An Update", vol. 6, issue 11, 1995, European Business Law Review, Kluwer Law International.</li>
              <li>Ανταποκρίτρια του Περιοδικού "European Business Law Review", Kluwer Law International [Graham &amp; Trotman], 1994 – 1995, σε θέματα σχετικά με τις νομοθετικές και νομολογιακές εξελίξεις στον τομέα του εμπορικού δικαίου στην Ελλάδα.</li>
              <li>Ανταποκρίτρια του Περιοδικού "International Trade Law &amp; Regulation", Sweet Maxwell/ESC Publishing, 1994 – 1995, σε θέματα σχετικά με την εφαρμογή των κανόνων εμπορικού δικαίου στην Ελλάδα.</li>
              <li>Δημοσιεύσεις στο Περιοδικό “European Competition Law Review”, Sweet &amp; Maxwell/ESC Publishing, σε θέματα σχετικά με την τελευταία τροποποίηση του Ν. 703/77 και σχετικές εφαρμοστικές αποφάσεις της Ελληνικής Επιτροπής Ανταγωνισμού.</li>
            </ul>
          </p>

          <p style="margin-bottom:10px;">
            <b>ΞΕΝΕΣ ΓΛΩΣΣΕΣ:</b><br />
            Αγγλικά: Άριστα<br />
            Ιταλικά: Ικανοποιητικά<br />
            Γαλλικά: Βασική Κατανόηση
          </p>

          <p style="margin-bottom:10px;">
            <b>ΗΛΕΚΤΡΟΝΙΚΟΙ ΥΠΟΛΟΓΙΣΤΕΣ:</b><br />
            Επεξεργασία Κειμένου: Άριστη Γνώση MS Word, Open Office, LibreOffice<br /> 
            Διαδίκτυο: Άριστη Γνώση Internet Explorer, Google Chrome, Mozilla Firefox.<br /> 
            Ηλεκτρονικό Ταχυδρομείο: Άριστη Γνώση Microsoft MS Outlook, Thunderbird.
          </p>
          
          <p style="margin-bottom:10px;">
            <b>ΜΕΛΟΣ:</b><br />
            Σύνδεσμος Ελλήνων Εμπορικολόγων, Εταιρεία Μελετών Δικαίου Τεχνολογίας &amp; Κατασκευών, University of Kent at Canterbury Society, British Graduates Society, Metropolitan Museum of Art, New York, USA.
          </p>

          <p style="margin-bottom:10px;">
            <b>ΣΥΝΔΡΟΜΗΤΡΙΑ:</b><br />
            "SCIENTIFIC AMERICAN MIND", Scientific American, a trading name of Nature America Inc., New York, U.S.A., ΝΟΜΙΚΟ ΒΗΜΑ, ΚΩΔΙΚΑΣ ΝΟΜΙΚΟΥ ΒΗΜΑΤΟΣ, ΣΥΝΗΓΟΡΟΣ.
          </p>
          
        </div>
      </div>     
    </div>  	
  	<img src="imgs/lawyers/3m.jpg" width="180" height="180" border="0" alt="" class="lawyer-img-small" />


    <div class="expertise">
      <div class="expertise-title"><span class="webfont">Έλενα<br /><br />Βαρβαγιάννη</span></div>
      <div class="expertise-fields">
        <span class="webfont">Δίκαιο Ανταγωνισμού</span><br />
        <span class="webfont">Διανομείς &amp; Εμπ. Αντιπρόσωποι</span><br />
        <span class="webfont">Δίκαιο Τηλεπικοινωνιών</span><br />
        <span class="webfont">Δίκαιο Φαρμάκων</span>
      </div>
      <div class="expertise-mail"><span><a class="webfont" href="mailto:hvarvayannis@vglawyers.gr">hvarvayannis@vglawyers.gr</a></span></div>
    </div>  
  
	
  </div>
  <img src="imgs/bg/gradients/lawyers-top.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/lawyer-left.png" width="0" height="0" class="dn" alt="" />
</div>
<?=foot()?>
</body>
</html>
