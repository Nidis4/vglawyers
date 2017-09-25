<?
//------------------------------------------------------------------------------------------------------------------------------------------------------//
require_once("inc.php");
//------------------------------------------------------------------------------------------------------------------------------------------------------//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?=SITENAME?> <?=$l['pt-1']?></title>
<?=css()?>
<link href="js/jquery/plugins/coin-slider/coin-slider-styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#scrollable{height:490px;width:440px;overflow:hidden;}
#cs-buttons-photos-cont{display:none;}
-->
</style>
<?=js()?>
<script type="text/javascript" language="javascript" src="js/jquery/plugins/coin-slider/coin-slider.js"></script>
<script type="text/javascript" language="javascript">
<!--
$(document).ready(function(){	
	
	pageAnimationCallBack=function(){
		//setTimeout(performPageAnimation,5000);
		performPageAnimation();
	}
	
	performPageAnimation=function(){
		$("#page-loader").addClass("dn");
		
    $(".company-txt-cont").delay(1000).animate({height: '530'}, 500, function() { });
		$(".company-motto").delay(1000).fadeIn(500);		
		$(".photos-cont")	.delay(1000).fadeIn(500);
	}
	
	$(".w-main").find('img').batchImageLoad({
		loadingCompleteCallback: pageAnimationCallBack
	});	
	
	$('#photos-cont').coinslider({ 			
		width: 449, // width of slider panel
		height: 286, // height of slider panel
		spw: 1, // squares per width
		sph: 1, // squares per height
		delay: 60000, // delay between images in ms
		sDelay: 30, // delay beetwen squares in ms
		opacity: 0.7, // opacity of title and navigation
		titleSpeed: 100, // speed of title appereance in ms
		effect: 'straight', // random, swirl, rain, straight
		navigation: false, // prev next and buttons
		links : false, // show images as links 
		hoverPause: false // pause on hover			
	});
	
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
	$('.jScrollPaneContainer').css('width','456px');
	$('#scrollable').css('width','440px');
});
-->
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
  	<span class="company-motto webfont"><?=$l['motto-company']?></span>
    <div class="company-txt-cont">
  		<div class="company-txt">
				<div id="scrollable"><?=$l['txt-company']?></div>
      </div>     
    </div>
    <div class="photos-cont">
    	<div id="photos-cont" class="coin-slider" style="position:absolute;top:0px;left:0px;" >
        <a href="#"><img src="imgs/company/company11.jpg" alt="" border="0" /></a>
			</div>
    </div>
	</div>
  <img src="imgs/bg/gradients/left.png" width="0" height="0" class="dn" alt="" />
</div>
<?=foot()?>
</body>
</html>
