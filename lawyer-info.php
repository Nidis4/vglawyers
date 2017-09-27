<?
//------------------------------------------------------------------------------------------------------------------------------------------------------//
require_once("inc.php");
//------------------------------------------------------------------------------------------------------------------------------------------------------//
$r=@$_REQUEST;
	//$sql="SELECT * FROM `lawyers` WHERE `enabled`='1';";
	//$mysqli->query($sql);
	//$lawyersData=$mysqli->fetch_all();
	$lawyersData=getLawyers();
	//print_r($lawyersData);
if($r['id']){
	settype($r['id'], 'integer'); //SANITIZE INPUT!
	$lawyerData=getLawyer($r['id']);
	//print_r($lawyerData);
	$imgCur = getImageLocByID($lawyerData['LAWYER_ID']);
	// Get the areas of expertise for each lawyer...
	settype($r['id'], 'integer'); //SANITIZE INPUT!
	//$sql="SELECT * FROM `lawyer_expertise` WHERE `lawyer_id`='".$r['id']."' ORDER BY `order` ASC;";
	//$mysqli->query($sql);
	//$lawyerExpertiseData=$mysqli->fetch_all();
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?=$lawyerData['meta_keywords_'.LANG]?>" />
<meta name="description" content="<?=$lawyerData['meta_description_'.LANG]?>" />
<title><?=SITENAME.' '.$l['pt-2'].' > '.$lawyerData['meta_title_'.LANG]?></title>
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
			echo '<div class="lawyers-menu dn">
							<ul class="no-mp no-lst ul">';
			while ($lawyer = mysqli_fetch_array($lawyersData,MYSQLI_ASSOC)) {
				$img = getImageLocByID($lawyer['LAWYER_ID']);
				echo '<li>
								<a href="lawyer-info.php?id='.$lawyer['LAWYER_ID'].'">
									<img src="/digi_platform/'.$img.'" width="100" height="100" border="0" alt="" />
									<br />
									<span class="webfont">'.$lawyer['NAME_EL'].'</span>
								</a>
							</li>';
			}
			echo '	</ul>
						</div>';
		}
	 ?>
  	
    <div class="lawyer-cv">
  		<div class="cv-txt">
        <div id="scrollable"><?=$lawyerData['CV_EL']?></div>
      </div>     
    </div>  	
  	<img src="/digi_platform/<?=$imgCur?>" width="180" height="180" border="0" alt="" class="lawyer-img-small" />


		<?
      echo '<div class="expertise">
							<div class="expertise-title"><span class="webfont">'.$lawyerData['NAME_EL'].' '.$lawyerData['SURNAME_EL'].'</span></div>
							<div class="expertise-fields">';
      
        echo '<span class="webfont">'.$lawyerData['EXPERT1_EL'].'</span><br />';
        echo '<span class="webfont">'.$lawyerData['EXPERT2_EL'].'</span><br />';
        echo '<span class="webfont">'.$lawyerData['EXPERT3_EL'].'</span><br />';
		echo '<span class="webfont">'.$lawyerData['EXPERT4_EL'].'</span><br />';
   
      echo '	</div>';
    
    if(!empty($lawyerData['EMAIL'])){
      echo '<div class="expertise-mail"><span><a class="webfont" href="mailto:'.$lawyerData['EMAIL'].'">'.$lawyerData['EMAIL'].'</a></span></div>';
    }
		
			 echo '</div>';

    ?>      
	
  </div>
  <img src="imgs/bg/gradients/lawyers-top.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/lawyer-left.png" width="0" height="0" class="dn" alt="" />
</div>
<?=foot()?>
</body>
</html>
