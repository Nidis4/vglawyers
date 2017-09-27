<?
//------------------------------------------------------------------------------------------------------------------------------------------------------//
require_once("inc.php");
//------------------------------------------------------------------------------------------------------------------------------------------------------//
$r=@$_REQUEST;
	//$sql="SELECT * FROM `expertise` WHERE `enabled`='1';";
	//$mysqli->query($sql);
	$expertiseData = getExpertises();
	//print_r($expertiseData);
//------------------------------------------------------------------------------------------------------------------------------------------------------//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?=SITENAME?> <?=$l['pt-3']?></title>
<?=css()?>
<style type="text/css">
<!--
#scrollable{height:365px;overflow:hidden;}
-->
</style>
<?=js()?>
<script type="text/javascript" language="javascript">

$(document).ready(function(){	

	pageAnimationCallBack=function(){
		//setTimeout(performPageAnimation,5000);
		performPageAnimation();
	}
	
	performPageAnimation=function(){
		$("#page-loader").addClass("dn");
		
		$(".expertise-fields-cont").delay(1000).removeClass('dn');
		$(".expertise-txt-cont").delay(1000).animate({height: '410'}, 500, function() { });
		$(".expertise-motto").delay(1100).fadeIn(300);
		
		$("#explink1").mouseover(function(){	$("#expert1").animate({height: '75'}, 500, function() { });	});		
		$("#explink2").mouseover(function(){	$("#expert2").animate({height: '75'}, 500, function() { });	});
		$("#explink3").mouseover(function(){	$("#expert3").animate({height: '75'}, 500, function() { });	});
		$("#explink4").mouseover(function(){	$("#expert4").animate({height: '75'}, 500, function() { });	});
		$("#explink5").mouseover(function(){	$("#expert5").animate({height: '51'}, 500, function() { });	});
		$("#explink6").mouseover(function(){	$("#expert6").animate({height: '51'}, 500, function() { });	});
		$("#explink7").mouseover(function(){	$("#expert7").animate({height: '51'}, 500, function() { });	});
		$("#explink8").mouseover(function(){	$("#expert8").animate({height: '51'}, 500, function() { });	});
		
		$("#explink1").mouseout(function(){		$("#expert1").animate({height: '0'}, 500, function() { });	});
		$("#explink2").mouseout(function(){		$("#expert2").animate({height: '0'}, 500, function() { });	});
		$("#explink3").mouseout(function(){		$("#expert3").animate({height: '0'}, 500, function() { });	});
		$("#explink4").mouseout(function(){		$("#expert4").animate({height: '0'}, 500, function() { });	});
		$("#explink5").mouseout(function(){		$("#expert5").animate({height: '0'}, 500, function() { });	});
		$("#explink6").mouseout(function(){		$("#expert6").animate({height: '0'}, 500, function() { });	});
		$("#explink7").mouseout(function(){		$("#expert7").animate({height: '0'}, 500, function() { });	});
		$("#explink8").mouseout(function(){		$("#expert8").animate({height: '0'}, 500, function() { });	});
	}

	$(".w-main").find('img').batchImageLoad({
		loadingCompleteCallback: pageAnimationCallBack
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
  	<span class="expertise-motto webfont"><?=$l['motto-expertise']?></span>
    <div class="expertise-txt-cont">
  		<div class="expertise-txt">
        <div id="scrollable"><?=$l['txt-expertise']?></div> 
      </div>    
    </div>
    
    <div class="expertise-fields-cont dn">    
    	<div class="fields-level-1" style="top:0;height:14px;background:url(imgs/bg/gradients/expertise/exp0-1.png) center bottom no-repeat;">
      	<div style="height:13px;background:url(imgs/bg/gradients/expertise/exp0.png) center top no-repeat;"></div>
        <div style="position:absolute;top:0;left:10px;width:449px;height:13px;border-bottom:solid 1px #A0987C;"></div>
      </div>
      
    	<div class="fields-level-1" style="top:14px;height:75px;background:url(imgs/bg/gradients/expertise/exp1-2.png) center bottom no-repeat;">
      	<div style="height:74px;background:url(imgs/bg/gradients/expertise/exp1.png) center top no-repeat;"></div>
        <a id="explink1" href="expertise-info.php?id=1" style="height:74px;"></a> 
        <div class="txt" style="height:41px;padding:17px 0 17px 0;"><?=getExpertiseTitle(1)?></div>
        <div class="effect" id="expert1"></div>
      </div>
      
    	<div class="fields-level-1" style="top:89px;height:75px;background:url(imgs/bg/gradients/expertise/exp2-3.png) center bottom no-repeat;">
      	<div style="height:74px;background:url(imgs/bg/gradients/expertise/exp2.png) center top no-repeat;"></div>
        <a id="explink2" href="expertise-info.php?id=2" style="height:74px;"></a>
        <div class="txt" style="height:41px;padding:17px 0 17px 0;"><?=getExpertiseTitle(2)?></div>
        <div class="effect" id="expert2"></div>
      </div>
      
    	<div class="fields-level-1" style="top:164px;height:75px;background:url(imgs/bg/gradients/expertise/exp3-4.png) center bottom no-repeat;">
      	<div style="height:74px;background:url(imgs/bg/gradients/expertise/exp3.png) center top no-repeat;"></div>
        <a id="explink3" href="expertise-info.php?id=3" style="height:74px;"></a>
        <div class="txt" style="height:41px;padding:17px 0 17px 0;"><?=getExpertiseTitle(3)?></div>
        <div class="effect" id="expert3"></div>
      </div>
      
    	<div class="fields-level-1" style="top:239px;height:75px;background:url(imgs/bg/gradients/expertise/exp4-5.png) center bottom no-repeat;">
      	<div style="height:74px;background:url(imgs/bg/gradients/expertise/exp4.png) center top no-repeat;"></div>
        <a id="explink4" href="expertise-info.php?id=4" style="height:74px;"></a>
        <div class="txt" style="height:41px;padding:17px 0 17px 0;"><?=getExpertiseTitle(4)?></div>
        <div class="effect" id="expert4"></div>
      </div>
      
    	<div class="fields-level-1" style="top:314px;height:51px;background:url(imgs/bg/gradients/expertise/exp5-6.png) center bottom no-repeat;">
      	<div style="height:50px;background:url(imgs/bg/gradients/expertise/exp5.png) center top no-repeat;"></div>
        <a id="explink5" href="expertise-info.php?id=5" style="height:50px;"></a>
        <div class="txt" style="height:17px;padding:15px 0 18px 0;"><?=getExpertiseTitle(5)?></div>
        <div class="effect" id="expert5"></div>
      </div>
      
    	<div class="fields-level-1" style="top:365px;height:51px;background:url(imgs/bg/gradients/expertise/exp6-7.png) center bottom no-repeat;">
      	<div style="height:50px;background:url(imgs/bg/gradients/expertise/exp6.png) center top no-repeat;"></div>
        <a id="explink6" href="expertise-info.php?id=6" style="height:50px;"></a>
        <div class="txt" style="height:17px;padding:15px 0 18px 0;"><?=getExpertiseTitle(6)?></div>
        <div class="effect" id="expert6"></div>
      </div>
      
    	<div class="fields-level-1" style="top:416px;height:51px;background:url(imgs/bg/gradients/expertise/exp7-8.png) center bottom no-repeat;">
      	<div style="height:50px;background:url(imgs/bg/gradients/expertise/exp7.png) center top no-repeat;"></div>
        <a id="explink7" href="expertise-info.php?id=7" style="height:50px;"></a>
        <div class="txt" style="height:17px;padding:15px 0 18px 0;"><?=getExpertiseTitle(7)?></div>
        <div class="effect" id="expert7"></div>
      </div>
      
    	<div class="fields-level-1" style="top:467px;height:51px;background:url(imgs/bg/gradients/expertise/exp8-9.png) center bottom no-repeat;">
      	<div style="height:50px;background:url(imgs/bg/gradients/expertise/exp8.png) center top no-repeat;"></div>
        <a id="explink8" href="expertise-info.php?id=8" style="height:50px;"></a>
        <div class="txt" style="height:17px;padding:15px 0 18px 0;"><?=getExpertiseTitle(8)?></div>
        <div class="effect" id="expert8"></div>
      </div>
      
    	<div class="fields-level-1" style="top:518px;height:12px;">
      	<div style="height:12px;background:url(imgs/bg/gradients/expertise/exp9.png) center top no-repeat;"></div>
      </div>    
    </div>
   

	</div>
  <img src="imgs/bg/gradients/left.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp0.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp0-1.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp1.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp1-2.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp2.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp2-3.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp3.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp3-4.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp4.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp4-5.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp5.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp5-6.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp6.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp6-7.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp7.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp7-8.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp8.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp8-9.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/expertise/exp9.png" width="0" height="0" class="dn" alt="" />

</div>
<?=foot()?>
</body>
</html>
