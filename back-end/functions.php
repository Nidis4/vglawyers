<?php
	function initDB(){
		$conn = mysql_connect('localhost', 'digivers_vgUser', 'HX3Z@S[@;_~D');
		$db   = mysql_select_db('digivers_vglawyers', $conn);
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET CHARACTER SET 'utf8'");
		return $conn;
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
		//echo "UPDATE `serv_headerinfo` SET `NAME`='".$name."',`DEALER_CODE`='".$code."',`EKTHESI_TEL`='".$ekthesi."',`SYNERGY_TEL`='".$synergy."',`PAGE_FIR`='".$fir."',`PAGE_FIR_LINK`='".$firlink."',`PAGE_SEC`='".$sec."',`PAGE_SEC_LINK`='".$seclink."' WHERE `INFO_ID` =".$dealer_id;
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
	function getDealersNum(){
		$connect = initDB();
		$result = mysql_query("SELECT * FROM `serv_headerinfo`");
		$rows = mysql_num_rows($result);	
		return $rows;
	}

	function createCar($title, $link){
		$connect = initDB();
		mysql_query("INSERT INTO `serv_cars`(`CARNAME`, `DISPLAY`, `PRICE`, `FUEL`, `CATEGORY`, `NEW`, `IMAGE`, `LINK`, `APPEAR`) VALUES ('$title','$title','0','','','0','','/models/$link/','0')");
	}

	function push_pages($host,$db_name, $db_user, $db_pass, $title, $content, $link) { 
		$conn = mysql_connect($host, $db_user, $db_pass);
		$db   = mysql_select_db($db_name, $conn);
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET CHARACTER SET 'utf8'");

		// Get the next ID
		$result = mysql_query("SHOW TABLE STATUS LIKE 'wpm_posts'");
		$data = mysql_fetch_assoc($result);
		$next_id = $data['Auto_increment'];
		//$guid = $url."?p=".$id;

		//mysql_query("INSERT INTO `wpm_posts`(`post_title`, `post_type`, `post_content`, `post_status`,`post_name`,`post_author`,`post_parent`, `post_date`,`post_date_gmt`,`post_modified`,`post_modified_gmt`) VALUES ('$title','page','$content','publish','$link','1','240',now(),now(),now(),now())"); 

		//mysql_query("INSERT INTO `wpm_postmeta`(`post_id`, `meta_key`, `meta_value`) VALUES ('$next_id', '_wp_page_template', '100-width.php') ");
		//mysql_query("INSERT INTO `wpm_postmeta`(`post_id`, `meta_key`, `meta_value`) VALUES ('$next_id', 'pyre_page_title_breadcrumbs_search_bar', 'breadcrumbs') ");
		//mysql_query("INSERT INTO `wpm_postmeta`(`post_id`, `meta_key`, `meta_value`) VALUES ('$next_id', 'pyre_page_title_text', 'no') ");
		//mysql_query("INSERT INTO `wpm_postmeta`(`post_id`, `meta_key`, `meta_value`) VALUES ('$next_id', 'pyre_page_title_height', '50px') ");
		//mysql_query("INSERT INTO `wpm_postmeta`(`post_id`, `meta_key`, `meta_value`) VALUES ('$next_id', 'fusion_builder_status', 'active') ");
	}


	function push_posts($host,$db_name, $db_user, $db_pass, $title, $content, $link,$imglink, $url) { 
		$conn = mysql_connect($host, $db_user, $db_pass);
		$db   = mysql_select_db($db_name, $conn);
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET CHARACTER SET 'utf8'");
		
		// Get the next ID
		$result = mysql_query("SHOW TABLE STATUS LIKE 'wpm_posts'");
		$data = mysql_fetch_assoc($result);
		$id = $data['Auto_increment'];
		$guid = $url."?p=".$id;

		// Insert Post
		//mysql_query("INSERT INTO `wpm_posts`(`ID`,`post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES ($id, 1,now(),now(),'$content','$title','','publish','closed','closed','','$link','','',now(),now(),'',0,'$guid',0,'post','',0)");
	
		//mysql_query("INSERT INTO `wpm_posts`(`post_title`, `post_type`, `post_content`, `post_status`,`post_name`,`post_author`,`post_date`,`post_date_gmt`,`post_modified`,`post_modified_gmt`) VALUES ('$title','post','$content','publish','$link','1',now(),now(),now(),now())"); 

		// Insert Category
		//mysql_query("INSERT INTO `wpm_term_relationships`(`object_id`, `term_taxonomy_id`) VALUES ('$id','1')"); 


		// Insert Featured Image
		$img_id = $id+1;
		$img_title = $link."_img";
		//mysql_query("INSERT INTO `wpm_posts`(`ID`,`post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES ($img_id, 1,now(),now(),'$content','$img_title','','inherit','closed','closed','','$img_title','','',now(),now(),'',0,'$imglink',0,'attachment','image/jpeg',0)");
		//echo "INSERT INTO `wpm_posts`(`ID`,`post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES ($img_id, 1,now(),now(),'$content','$img_title','','inherit','closed','closed','','$img_title','','',now(),now(),'',0,'$imglink',0,'attachment','image/jpeg',0)";

		//Insert other Details and Featured Image
		//mysql_query("INSERT INTO `wpm_postmeta`(`post_id`, `meta_key`, `meta_value`) VALUES ($id,'_edit_last',1), ($id,'_edit_lock','1491816679:1'), ('$id','_thumbnail_id','-1'), ($id,'fusion_builder_status',''), ($id,'sbg_selected_sidebar','a:1:{i:0;s:1:\"0\";}'), ($id,'sbg_selected_sidebar_replacement','a:1:{i:0;s:12:\"Blog Sidebar\";}'), ($id,'sbg_selected_sidebar_2','a:1:{i:0;s:1:\"0\";}'), ($id,'sbg_selected_sidebar_2_replacement','aa:1:{i:0;s:0:\"\";}'), ($id,'pyre_show_first_featured_image','no'), ($id,'fifu_image_url','$imglink'), ($id,'fifu_image_alt','$imglink')"); 



	}

?>