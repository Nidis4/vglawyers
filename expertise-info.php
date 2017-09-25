<?
//------------------------------------------------------------------------------------------------------------------------------------------------------//
require_once("inc.php");
//------------------------------------------------------------------------------------------------------------------------------------------------------//
$r=@$_REQUEST;
//------------------------------------------------------------------------------------------------------------------------------------------------------//
	$sql="SELECT * FROM `expertise` WHERE `enabled`='1';";
	$mysqli->query($sql);
	$expertiseData=$mysqli->fetch_all();
	//print_r($expertiseData);
if($r['id']){
	settype($r['id'], 'integer'); //SANITIZE INPUT!
	$sql="SELECT * FROM `expertise` WHERE `id`='".$r['id']."';";
	$selectedExpertiseData=$mysqli->fetchq($sql);
	//print_r($expertiseData);
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
$r=@$_REQUEST;
//------------------------------------------------------------------------------------------------------------------------------------------------------//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?=$selectedExpertiseData['meta_keywords_'.LANG]?>" />
<meta name="description" content="<?=$selectedExpertiseData['meta_description_'.LANG]?>" />
<title><?=SITENAME.' '.$l['pt-3'].' > '.$selectedExpertiseData['meta_title_'.LANG]?></title>
<?=css()?>
<style type="text/css">
<!--
#scrollable{height:490px;overflow:hidden;}
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
		
    $(".expertise-info-txt-cont").delay(1000).animate({height: '530'}, 500, function() { });
		
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
    <div class="expertise-info-txt-cont">
  		<div class="expertise-info-txt">
        <div id="scrollable"><?=$selectedExpertiseData['txt_'.LANG]?></div>
      </div>
    </div>
    
    <div class="expertise-fields-cont">    
    	<div class="fields-level-1" style="top:0;height:14px;background:url(imgs/bg/gradients/expertise/exp0-1.png) center bottom no-repeat;">
      	<div style="height:13px;background:url(imgs/bg/gradients/expertise/exp0.png) center top no-repeat;"></div>
        <div style="position:absolute;top:0;left:10px;width:449px;height:13px;border-bottom:solid 1px #A0987C;"></div>
      </div>
      
    	<div class="fields-level-1" style="top:14px;height:75px;background:url(imgs/bg/gradients/expertise/exp1-2.png) center bottom no-repeat;">
				<?
        if(@$r['id']=='1'):
          ?>
          <div style="height:50px;"></div>
          <div style="height:74px;position:absolute;top:0;left:10px;width:449px;border-bottom:solid 1px #A0987C;"></div> 
					<?
        else:
          ?>
          <div style="height:74px;background:url(imgs/bg/gradients/expertise/exp1.png) center top no-repeat;"></div>
          <a id="explink1" href="<?=$_SERVER['PHP_SELF']?>?id=1" style="height:74px;"></a> 
					<?
        endif;
        ?>      
        <div class="txt" style="height:41px;padding:17px 0 17px 0;"><?=$expertiseData[0]['title_'.LANG]?></div>
        <div class="effect" id="expert1"></div>
      </div>
      
    	<div class="fields-level-1" style="top:89px;height:75px;background:url(imgs/bg/gradients/expertise/exp2-3.png) center bottom no-repeat;">
				<?
        if(@$r['id']=='2'):
          ?>
          <div style="height:50px;"></div>
          <div style="height:74px;position:absolute;top:0;left:10px;width:449px;border-bottom:solid 1px #A0987C;"></div>
					<?
        else:
          ?>
          <div style="height:74px;background:url(imgs/bg/gradients/expertise/exp2.png) center top no-repeat;"></div>
          <a id="explink2" href="<?=$_SERVER['PHP_SELF']?>?id=2" style="height:74px;"></a>
					<?
        endif;
        ?>      
        <div class="txt" style="height:41px;padding:17px 0 17px 0;"><?=$expertiseData[1]['title_'.LANG]?></div>
        <div class="effect" id="expert2"></div>
      </div>
      
    	<div class="fields-level-1" style="top:164px;height:75px;background:url(imgs/bg/gradients/expertise/exp3-4.png) center bottom no-repeat;">
				<?
        if(@$r['id']=='3'):
          ?>
          <div style="height:50px;"></div>
          <div style="height:74px;position:absolute;top:0;left:10px;width:449px;border-bottom:solid 1px #A0987C;"></div>
					<?
        else:
          ?>
          <div style="height:74px;background:url(imgs/bg/gradients/expertise/exp3.png) center top no-repeat;"></div>
          <a id="explink3" href="<?=$_SERVER['PHP_SELF']?>?id=3" style="height:74px;"></a>
					<?
        endif;
        ?>      
        <div class="txt" style="height:41px;padding:17px 0 17px 0;"><?=$expertiseData[2]['title_'.LANG]?></div>
        <div class="effect" id="expert3"></div>
      </div>
      
    	<div class="fields-level-1" style="top:239px;height:75px;background:url(imgs/bg/gradients/expertise/exp4-5.png) center bottom no-repeat;">
				<?
        if(@$r['id']=='4'):
          ?>
          <div style="height:50px;"></div>
          <div style="height:74px;position:absolute;top:0;left:10px;width:449px;border-bottom:solid 1px #A0987C;"></div>
					<?
        else:
          ?>
          <div style="height:74px;background:url(imgs/bg/gradients/expertise/exp4.png) center top no-repeat;"></div>
          <a id="explink4" href="<?=$_SERVER['PHP_SELF']?>?id=4" style="height:74px;"></a>
					<?
        endif;
        ?>      
        <div class="txt" style="height:41px;padding:17px 0 17px 0;"><?=$expertiseData[3]['title_'.LANG]?></div>
        <div class="effect" id="expert4"></div>
      </div>
      
    	<div class="fields-level-1" style="top:314px;height:51px;background:url(imgs/bg/gradients/expertise/exp5-6.png) center bottom no-repeat;">
				<?
        if(@$r['id']=='5'):
          ?>
          <div style="height:50px;"></div>
          <div style="height:50px;position:absolute;top:0;left:10px;width:449px;border-bottom:solid 1px #A0987C;"></div>
					<?
        else:
          ?>
          <div style="height:50px;background:url(imgs/bg/gradients/expertise/exp5.png) center top no-repeat;"></div>
          <a id="explink5" href="<?=$_SERVER['PHP_SELF']?>?id=5" style="height:50px;"></a>
					<?
        endif;
        ?>        
        <div class="txt" style="height:17px;padding:15px 0 18px 0;"><?=$expertiseData[4]['title_'.LANG]?></div>
        <div class="effect" id="expert5"></div>
      </div>
      
    	<div class="fields-level-1" style="top:365px;height:51px;background:url(imgs/bg/gradients/expertise/exp6-7.png) center bottom no-repeat;">
				<?
        if(@$r['id']=='6'):
          ?>
          <div style="height:50px;"></div>
          <div style="height:50px;position:absolute;top:0;left:10px;width:449px;border-bottom:solid 1px #A0987C;"></div>
					<?
        else:
          ?>
          <div style="height:50px;background:url(imgs/bg/gradients/expertise/exp6.png) center top no-repeat;"></div>
          <a id="explink6" href="<?=$_SERVER['PHP_SELF']?>?id=6" style="height:50px;"></a>
					<?
        endif;
        ?>        
        <div class="txt" style="height:17px;padding:15px 0 18px 0;"><?=$expertiseData[5]['title_'.LANG]?></div>
        <div class="effect" id="expert6"></div>
      </div>
      
    	<div class="fields-level-1" style="top:416px;height:51px;background:url(imgs/bg/gradients/expertise/exp7-8.png) center bottom no-repeat;">
				<?
        if(@$r['id']=='7'):
          ?>
          <div style="height:50px;"></div>
          <div style="height:50px;position:absolute;top:0;left:10px;width:449px;border-bottom:solid 1px #A0987C;"></div>
					<?
        else:
          ?>
          <div style="height:50px;background:url(imgs/bg/gradients/expertise/exp7.png) center top no-repeat;"></div>
          <a id="explink7" href="<?=$_SERVER['PHP_SELF']?>?id=7" style="height:50px;"></a>
					<?
        endif;
        ?>        
        <div class="txt" style="height:17px;padding:15px 0 18px 0;"><?=$expertiseData[6]['title_'.LANG]?></div>
        <div class="effect" id="expert7"></div>
      </div>
      
    	<div class="fields-level-1" style="top:467px;height:51px;background:url(imgs/bg/gradients/expertise/exp8-9.png) center bottom no-repeat;">
				<?
        if(@$r['id']=='8'):
          ?>
          <div style="height:50px;"></div>
          <div style="height:50px;position:absolute;top:0;left:10px;width:449px;border-bottom:solid 1px #A0987C;"></div>
					<?
        else:
          ?>
          <div style="height:50px;background:url(imgs/bg/gradients/expertise/exp8.png) center top no-repeat;"></div>
          <a id="explink8" href="<?=$_SERVER['PHP_SELF']?>?id=8" style="height:50px;"></a>
					<?
        endif;
        ?>      
        <div class="txt" style="height:17px;padding:15px 0 18px 0;"><?=$expertiseData[7]['title_'.LANG]?></div>
        <div class="effect" id="expert8"></div>
      </div>
      
    	<div class="fields-level-1" style="top:518px;height:12px;">
      	<div style="height:12px;background:url(imgs/bg/gradients/expertise/exp9.png) center top no-repeat;"></div>
      </div>    
    </div>
   

	</div>
  <img src="imgs/bg/gradients/left.png" width="0" height="0" class="dn" alt="" />
</div>
<?=foot()?>
</body>
</html>
