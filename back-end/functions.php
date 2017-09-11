<?php
	function initDB(){
		$conn = mysqli_connect('localhost', 'digivers_vgUser', 'HX3Z@S[@;_~D', 'digivers_vglawyers');
		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_query($conn, "SET CHARACTER SET 'utf8'");
		return $conn;
	}

	function getPageElements($page){
		$connect = initDB();
		$result = mysqli_query($connect,"SELECT * FROM `PAGES` WHERE `PAGE_ID` LIKE '$page'");
		//echo "SELECT * FROM `PAGES` WHERE `PAGE_ID` LIKE $page";
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		return $row;
	}

	function updatePage($page, $metatitle_el, $metatitle_en, $metadesc_el, $metadesc_en, $metakey_el, $metakey_en, $title_el, $title_en, $keimeno_el, $keimeno_en, $tab1_el, $tab1_en, $tab2_el, $tab2_en, $tab3_el, $tab3_en, $tab4_el, $tab4_en){
		
		$connect = initDB();
		mysqli_query($connect,"UPDATE `PAGES` SET `METATITLE_EL`='$metatitle_el',`METATITLE_EN`='$metatitle_en',`METADESC_EL`='$metadesc_el',`METADESC_EN`='$metadesc_en',`METAKEY_EL`='$metakey_el',`METAKEY_EN`='$metakey_en',`TITLE_EL`='$title_el',`TITLE_EN`='$title_en',`KEIMENO_EL`='$keimeno_el',`KEIMENO_EN`='$keimeno_en',`TAB1_EL`='$tab1_el',`TAB1_EN`='$tab1_en',`TAB2_EL`='$tab2_el',`TAB2_EN`='$tab2_en',`TAB3_EL`='$tab3_el',`TAB3_EN`='$tab3_en',`TAB4_EL`='$tab4_el',`TAB4_EN`='$tab4_en' WHERE `PAGE_ID`='$page'");

	}

	function updateLawyer($id, $name_el, $name_en, $surname_el, $surname_en, $email, $cv_el, $cv_en, $expert1_el, $expert1_en, $expert2_el, $expert2_en, $expert3_el, $expert3_en, $expert4_el, $expert4_en, $metatitle_el, $metatitle_en, $metadesc_el, $metadesc_en, $metakey_el, $metakey_en, $title_el, $title_en){
		$connect = initDB();
		mysqli_query($connect,"UPDATE `LAWYERS` SET `NAME_EL`='$name_el',`NAME_EN`='$name_en',`SURNAME_EL`='$surname_el',`SURNAME_EN`='$surname_en',`EMAIL`='$email',`CV_EL`='$cv_el',`CV_EN`='$cv_en',`EXPERT1_EL`='$expert1_el',`EXPERT1_EN`='$expert1_en',`EXPERT2_EL`='$expert2_el',`EXPERT2_EN`='$expert2_en',`EXPERT3_EL`='$expert3_el',`EXPERT3_EN`='$expert3_en',`EXPERT4_EL`='$expert4_el',`EXPERT4_EN`='$expert4_en',`METATITLE_EL`='$metatitle_el',`METATITLE_EN`='$metatitle_en',`METADESC_EL`='$metadesc_el',`METADESC_EN`='$metadesc_en',`METAKEY_EL`='$metakey_el',`METAKEY_EN`='$metakey_en',`TITLE_EL`='$title_el',`TITLE_EN`='$title_en' WHERE `LAWYER_ID` = '$id' ");
	}

	function updateExpertise($exp_id, $explain_el, $explain_en, $keimeno_el, $keimeno_en, $metatitle_el, $metatitle_en, $metadesc_el, $metadesc_en, $metakey_el, $metakey_en, $title_el, $title_en){
		$connect = initDB();
		mysqli_query($connect,"UPDATE `EXPERTISE` SET `METATITLE_EL`='$metatitle_el',`METATITLE_EN`='$metatitle_en',`METADESC_EL`='$metadesc_el',`METADESC_EN`='$metadesc_en',`METAKEY_EL`='$metakey_el', `METAKEY_EN`='$metakey_en', `TITLE_EL`='$title_el', `TITLE_EN`='$title_en',`EXPLAIN_EL`='$explain_el',`EXPLAIN_EN`='$explain_en',`KEIMENO_EL`='$keimeno_el',`KEIMENO_EN`='$keimeno_en' WHERE `ID` = '$exp_id' ");
		echo "UPDATE `EXPERTISE` SET `METATITLE_EL`='$metatitle_el',`METATITLE_EN`='$metatitle_en',`METADESC_EL`='$metadesc_el',`METADESC_EN`='$metadesc_en',`METAKEY_EL`='$metakey_el', `METAKEY_EN`='$metakey_en', `TITLE_EL`='$title_el', `TITLE_EN`='$title_en',`EXPLAIN_EL`='$explain_el',`EXPLAIN_EN`='$explain_en',`KEIMENO_EL`='$keimeno_el',`KEIMENO_EN`='$keimeno_en' WHERE `ID` = '$exp_id'";
	}

	function getLawyers(){
		$connect = initDB();
		$result = mysqli_query($connect, "SELECT * FROM `LAWYERS`");
		return $result;
	}
	function getExpertises(){
		$connect = initDB();
		$result = mysqli_query($connect, "SELECT * FROM `EXPERTISE`");
		return $result;
	}
	function getPublications(){
		$connect = initDB();
		$result = mysqli_query($connect, "SELECT * FROM `PUBLICATIONS`");
		return $result;
	}
	function getImageLoc($loc){
		$connect = initDB();
		$result = mysqli_query($connect, "SELECT `LOCATION` FROM `IMAGES` WHERE `PAGE_POS` LIKE '$loc' ");
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		return $row['LOCATION'];
	}
	function setImageLoc($pagePos, $loc){
		$connect = initDB();
		mysqli_query($connect, "UPDATE `IMAGES` SET `LOCATION`= '$loc' WHERE `PAGE_POS` LIKE '$pagePos' ");
		//echo "UPDATE `IMAGES` SET `LOCATION`= '$loc' WHERE `PAGE_POS` LIKE '$pagePos'";
	}




	function getDealerInfo(){
		$connect = initDB();
		$result = mysql_query("SELECT * FROM `serv_headerinfo`",$connect);
		$rows = mysql_num_rows($result);	
		return $result;
	}
	function getDealerByID($id){
		$connect = initDB();
		$result = mysql_query("SELECT * FROM `serv_headerinfo` WHERE `INFO_ID` = ".$id ,$connect);
		$rows = mysql_num_rows($result);	
		return $result;
	}

	function updateDealerById($dealer_id, $name, $code, $ekthesi, $synergy, $address1, $address2, $fir, $firlink, $sec, $seclink, $map, $about1, $about2, $facebook, $twitter, $instagram, $google, $youtube, $services, $latest, $google_review, $logo){
		$connect = initDB();
		//echo "UPDATE `serv_headerinfo` SET `NAME`='".$name."',`DEALER_CODE`='".$code."',`EKTHESI_TEL`='".$ekthesi."',`SYNERGY_TEL`='".$synergy."',`PAGE_FIR`='".$fir."',`PAGE_FIR_LINK`='".$firlink."',`PAGE_SEC`='".$sec."',`PAGE_SEC_LINK`='".$seclink."' WHERE `INFO_ID` =".$dealer_id;
		mysql_query("UPDATE `serv_headerinfo` SET `NAME`='".$name."',`DEALER_CODE`='".$code."',`EKTHESI_TEL`='".$ekthesi."',`SYNERGY_TEL`='".$synergy."',`ADDRESS1`='".$address1."',`ADDRESS2`='".$address2."',`PAGE_FIR`='".$fir."',`PAGE_FIR_LINK`='".$firlink."',`PAGE_SEC`='".$sec."',`PAGE_SEC_LINK`='".$seclink."' ,`MAP`='".$map."',`ABOUT1`='".$about1."',`ABOUT2`='".$about2."',`FACEBOOK`='".$facebook."',`TWITTER`='".$twitter."',`INSTAGRAM`='".$instagram."',`GOOGLE`='".$google."',`YOUTUBE`='".$youtube."' ,`LATEST`='".$latest."' ,`SERVICES`='".$services."' ,`GOOGLE_REVIEW`='".$google_review."' ,`LOGO`='".$logo."' WHERE `INFO_ID` =".$dealer_id ,$connect);
	}

	function getSliders(){
		$connect = initDB();
		$result = mysql_query("SELECT * FROM `serv_sliders`",$connect);
		$rows = mysql_num_rows($result);	
		return $result;
	}

	function getSlideByID($id){
		$connect = initDB();
		$result = mysql_query("SELECT * FROM `serv_sliders` WHERE `SLIDER_ID` = ".$id ,$connect);
		$rows = mysql_num_rows($result);	
		return $result;
	}

	function updateSlideById($slide_id, $title, $caption, $button, $display, $img, $link, $styling ){
		$connect = initDB();
		echo "UPDATE `serv_headerinfo` SET `NAME`='".$name."',`DEALER_CODE`='".$code."',`EKTHESI_TEL`='".$ekthesi."',`SYNERGY_TEL`='".$synergy."',`PAGE_FIR`='".$fir."',`PAGE_FIR_LINK`='".$firlink."',`PAGE_SEC`='".$sec."',`PAGE_SEC_LINK`='".$seclink."' WHERE `INFO_ID` =".$dealer_id;
		mysql_query("UPDATE `serv_sliders` SET `TITLE`='".$title."',`CAPTION`='".$caption."',`BUTTON`='".$button."',`DISPLAY`='".$display."',`IMG_LOC`='".$img."',`LINK_LOC`='".$link."',`STYLING`='".$styling."' WHERE `SLIDER_ID` =".$slide_id ,$connect);
	}

	function getPromoBoxes(){
		$connect = initDB();
		$result = mysql_query("SELECT * FROM `serv_images`",$connect);
		$rows = mysql_num_rows($result);	
		return $result;
	}
	function getPromoByID($id){
		$connect = initDB();
		$result = mysql_query("SELECT * FROM `serv_images` WHERE `ID` = ".$id ,$connect);
		$rows = mysql_num_rows($result);	
		return $result;
	}
	function updatePromoById($promo_id, $display, $location, $link ){
		$connect = initDB();
		//echo "UPDATE `serv_headerinfo` SET `NAME`='".$name."',`DEALER_CODE`='".$code."',`EKTHESI_TEL`='".$ekthesi."',`SYNERGY_TEL`='".$synergy."',`PAGE_FIR`='".$fir."',`PAGE_FIR_LINK`='".$firlink."',`PAGE_SEC`='".$sec."',`PAGE_SEC_LINK`='".$seclink."' WHERE `INFO_ID` =".$dealer_id;
		mysql_query("UPDATE `serv_images` SET `DISPLAY`='".$display."',`LOCATION`='".$location."',`LINK`='".$link."' WHERE `ID` =".$promo_id ,$connect);
	}

	function getAllCars(){
		$connect = initDB();
		$result = mysql_query("SELECT * FROM `serv_cars` ORDER BY `ORDERED`",$connect);
		$rows = mysql_num_rows($result);	
		return $result;
	}
	function getCarByID($id){
		$connect = initDB();
		$result = mysql_query("SELECT * FROM `serv_cars` WHERE `CAR_ID` = ".$id ,$connect);
		$rows = mysql_num_rows($result);	
		return $result;
	}

	function updateCarById($car_id, $carOrder, $name, $code, $price, $fuel, $cate, $new, $img, $link, $carAppear){
		$connect = initDB();
		//echo "UPDATE `serv_headerinfo` SET `NAME`='".$name."',`DEALER_CODE`='".$code."',`EKTHESI_TEL`='".$ekthesi."',`SYNERGY_TEL`='".$synergy."',`PAGE_FIR`='".$fir."',`PAGE_FIR_LINK`='".$firlink."',`PAGE_SEC`='".$sec."',`PAGE_SEC_LINK`='".$seclink."' WHERE `INFO_ID` =".$dealer_id;
		mysql_query("UPDATE `serv_cars` SET `ORDERED`='".$carOrder."', `CARNAME`='".$name."',`DISPLAY`='".$code."',`PRICE`='".$price."',`FUEL`='".$fuel."',`CATEGORY`='".$cate."',`NEW`='".$new."',`IMAGE`='".$img."',`LINK`='".$link."',`APPEAR`='".$carAppear."' WHERE `CAR_ID` =".$car_id ,$connect);
	}

	function getCarsNum(){
		$connect = initDB();
		$result = mysql_query("SELECT * FROM `serv_cars`");
		$rows = mysql_num_rows($result);	
		return $rows;
	}

	function getSlidersNum(){
		$connect = initDB();
		$result = mysql_query("SELECT * FROM `serv_sliders`");
		$rows = mysql_num_rows($result);	
		return $rows;
	}
	function getPromosNum(){
		$connect = initDB();
		$result = mysql_query("SELECT * FROM `serv_images` WHERE `DISPLAY` != '' ");
		$rows = mysql_num_rows($result);	
		return $rows;
	}

?>