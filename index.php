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
<title><?=SITENAME?> <?=$l['company-title']?></title>
<?=css()?>
<style type="text/css">
<!--
#scrollable{height:340px;width:460px;overflow:hidden;}
.ennoia-txt{position:absolute;top:55px;left:30px;width:240px;color:#fff;font-size:13px;font-weight:bold;}

	.up{background:url(imgs/scrollbar/scrollbar-arrow-up.png) no-repeat;width:13px;height:9px;}
	.down{background:url(imgs/scrollbar/scrollbar-arrow-down.png) no-repeat;width:13px;height:9px;}

#wIndexTabs,
#wIndexTxt{display:none;}
#imgBuilding{position:absolute;right:0;top:620px; width:449px; height:259px;}



.ww{position:absolute;top:100px;left:0px;width:960px;height:430px;overflow:hidden;						/*background:#CC6;*/}
	.line-1x1-cecdc9{position:absolute;top:50px;left:10px;width:0px;height:1px;background:#cecdc9;}
	.w-main .w .ww .index-motto{display:block;position:absolute;top:20px;left:5px;border:none;height:auto;}	

	.ww .tabs-td{font-size:14px;}
	.on{position:absolute;top:0px;width:132px;height:40px;background:url(imgs/bg/hover-tab.png) bottom left no-repeat;}
	.on-1{left:-1px;}
	.on-2{left:107px;}
	.on-3{left:219px;}
	.on-4{left:331px;}

	
	.www-txt{position:absolute;top:440px;left:0px;width:500px;height:380px;background-image:url(imgs/bg/gradients/left.png);background-position:left top; background-repeat:no-repeat;}
			.www-txt .www-inner-txt{position:absolute;top:20px;left:20px;color:#fff;line-height:18px; width:460px;	overflow:hidden;text-align:justify;height:340px;}
	
	.www-slogans{position:absolute;}
-->
</style>
<?=js()?>

<script type="text/javascript">
<!--
<?
$currentTab=rand(1,4);
echo "var currentTab=".$currentTab.";";
?>
var txt=new Array();
txt[1]="<?=$l['ennoia-txt-1']?>";
txt[2]="<?=$l['ennoia-txt-2']?>";
txt[3]="<?=$l['ennoia-txt-3']?>";
txt[4]="<?=$l['ennoia-txt-4']?>";
function clickTab(id){
	//console.log(id);
	if(currentTab!=id){
		//displace...
		$(".on").removeClass("on-"+currentTab);
		$(".on").addClass("on-"+id);
		//show...
		$("#op-txt").css("display","none");
		$("#op-txt").html(txt[id]);
		$("#op-txt").fadeIn(250);
		currentTab=id;
	}
}


$(document).ready(function() {
	pageAnimationCallBack=function(){
		performPageAnimation();
	}
	
	performPageAnimation=function(){
		$("#page-loader").addClass("dn");
		
		$("#indexbg")				.delay(1000).fadeIn(300);
		$(".on").addClass("on-"+<?=$currentTab?>);
		$(".on").removeClass("dn");
		$("#op-txt").html(txt[<?=$currentTab?>]);
		
		
		
		$(".index-motto").delay(1200).fadeIn(500, function() {});
		
		$(".line-1x1-cecdc9").delay(1200).animate({width:"940"},1200,function (){
			$(".www-txt").animate({top:"60"},500);
			$("#imgBuilding").animate({top:"171"},500);
			$("#wIndexTabs").delay(100).fadeIn(700, function() {});
			$("#wIndexTxt").delay(100).fadeIn(700, function() {});
		});
	}
	
	$(".w-main").find('img').batchImageLoad({
		loadingCompleteCallback: pageAnimationCallBack
	});	

	$('#scrollable').jScrollPane({
		showArrows: true,
		scrollbarMargin:0,
		scrollbarWidth:13
	});
	
	$('.jScrollPaneTrack').css('width','13px');
	$('.jScrollPaneDrag').css('height','13px');
	$('.jScrollPaneDrag').css('width','13px');
	$('.jScrollArrowUp').css('width','13px');
	$('.jScrollArrowDown').css('width','13px');
	$('.jScrollPaneContainer').css('width','460px');
	$('.jScrollPaneContainer').css('height','340px');
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
	<div class="bg" id="indexbg" style="display:none;"></div>
	<div class="w">
  	<div id="page-loader"><img src="imgs/preloader-index.gif" alt="preloader" width="60" height="60" border="0" /></div>
    
    <div class="ww">
    	
      <div class="index-motto webfont" style="display:none"><?=$l['motto-index']?></div>
      <div class="line-1x1-cecdc9"></div>
     
      <div class="www-txt">
        <div class="www-inner-txt"><div id="scrollable" style="width:440px;height:340px;"><?=$l['txt-index']?></div></div>     
      </div>
        
      <div id="wIndexTabs" class="" style="position:absolute;right:0;top:11px;width:453px;height:40px;background:url(imgs/bg/tabs.png) bottom right no-repeat;">
        <div class="on dn"></div>
          <table cellspacing="0" cellpadding="0" style="position:absolute;right:0;bottom:0;" >
            <tr>
              <td id="ct-1" onclick="clickTab(1)" width="112" height="26" align="center" valign="middle" class="tabs-td cp"><span class="webfont" style="padding-left:4px;"><?=$l['ennoia-1']?></span></td>
              <td id="ct-2" onclick="clickTab(2)" width="112" align="center" valign="middle" class="tabs-td cp"><span class="webfont"><?=$l['ennoia-2']?></span></td>
              <td id="ct-3" onclick="clickTab(3)" width="112" align="center" valign="middle" class="tabs-td cp"><span class="webfont"><?=$l['ennoia-3']?></span></td>
              <td id="ct-4" onclick="clickTab(4)" width="113" align="center" valign="middle" class="tabs-td cp"><span class="webfont"><?=$l['ennoia-4']?></span></td>
            </tr>
          </table>
      </div>
      <div id="wIndexTxt" style="position:absolute;right:0;top:51px; width:449px; height:120px; background:#919076;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td height="120" align="left" valign="middle"><p id="op-txt" style="padding:5px 10px;color:#FAFAFA;">&nbsp;</p></td>
          </tr>
        </table>
      </div>
      
      <img src="imgs/building.png" id="imgBuilding" alt="" border="0" style="" />
      
    </div>
    
	</div>
  <img src="imgs/bg/gradients/index.png" width="0" height="0" class="dn" alt="" />
</div>
<?=foot()?>
</body>
</html>
