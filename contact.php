<?
//------------------------------------------------------------------------------------------------------------------------------------------------------//
require_once("inc.php");
//------------------------------------------------------------------------------------------------------------------------------------------------------//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="<?=$l['address']?>, <?=$l['location']?> ( <?=(LANG=='el'?'σταθμός μετρό σύνταγμα':'syntagma metro station')?> )" />
<style type="text/css">
  #map_canvas {}
</style>
<title><?=SITENAME?> <?=$l['pt-4']?> > <?=(LANG=='el'?'Στοιχεία Επικοινωνίας &amp; Χάρτης':'Contact Details &amp; Map')?></title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
<!--
function initialize() {
	var myLatlng = new google.maps.LatLng(37.972903, 23.732998);
	var myOptions = {
		zoom: 14,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var VGLocation = new google.maps.LatLng(37.972903, 23.732998);
	
	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);		
	var image = 'imgs/map_icon.png';
	
	var VG = new google.maps.Marker({
		position: new google.maps.LatLng(37.972903, 23.732998), 
		map: map,
		icon: image,	
		title: "<?=$l['office']?>",	
	});		
		
	google.maps.event.addListener(VG, 'click', function() {
		map.setCenter(VGLocation);
		map.setZoom(18);
	});
}	
// -->
</script>
<?=css()?>
<?=js()?>
<script type="text/javascript">
<!--
$(document).ready(function() {
		
	$(".contact-left-cont").delay(1200).animate({height: '330'}, 500, function() { });
	$("#map-bg")	.delay(1200).animate({height: '530'}, 500, function() { });
	$("#content")	.delay(1200).animate({height: '530'}, 500, function() { });
	
	$("#img")			.delay(1200).fadeIn(500, function() {});
	$("#texts")		.delay(1200).fadeIn(500, function() {});

});
-->
</script>
<?=favicon()?>
<?=google_analytics()?>
</head>
<body onload="initialize();">
<?=head()?>
<div class="w-main">
	<div class="shdw-head"></div> 
  <div class="shdw-foot"></div>  
  <div class="bg" id="indexbg"></div>
	<div class="w" style="z-index:100;">
  	<div id="content" class="content">
    	<div id="texts" class="texts">
        <span class="webfont" style="top:70px;"><?=$l['address']?></span>
        <span class="webfont" style="top:100px;"><?=$l['location']?></span>
        <span class="webfont" style="top:130px;font-size:18px;"><?=(LANG=='el'?'σταθμός μετρό σύνταγμα':'syntagma metro station')?></span>
        <span class="webfont" style="top:170px;"><?=(LANG=='el'?'ΤΗΛ':'TEL')?>: <?=$l['telephone']?></span>
        <span class="webfont" style="top:200px;">FAX: <?=$l['fax']?></span>        
        <span style="bottom:30px;"><a class="webfont" href="mailto:info@vglawyers.gr" style="color:#FFF;text-decoration:none;">info@vglawyers.gr</a></span>
        <span style="bottom:0px;"><a class="webfont" href="contact-form.php" style="color:#FFF;text-decoration:none;"><?=(LANG=='el'?'Φόρμα Επικοινωνίας':'Contact Form')?></a></span>
      </div>
      <div id="map_canvas" class="map"></div>
    </div>
    <img id="img" class="deco-img" src="imgs/contact/building.jpg" alt="" border="0" width="220" height="460" />
    <div id="map-bg" class="map-bg"></div>
    <div class="contact-left-cont"></div>      
  </div>
</div>
<?=foot()?>
</body>
</html>
