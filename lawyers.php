<?
//------------------------------------------------------------------------------------------------------------------------------------------------------//
require_once("inc.php");
//------------------------------------------------------------------------------------------------------------------------------------------------------//
	$r=@$_REQUEST;
	$lawyersData=getLawyers();
	//print_r($lawyersData);
//------------------------------------------------------------------------------------------------------------------------------------------------------//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?=SITENAME?> <?=$l['pt-2']?></title>
<?=css()?>
<style type="text/css">
<!--
#scrollable{height:330px;overflow:hidden;}
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
		
		$(".lawyers-menu")		.delay(1000).animate({height: '150'}, 480, function() { });
		$(".ul")							.delay(1010).fadeIn(470, function() { });
		$(".lawyers-txt-cont").delay(1000).animate({height: '380'}, 250, function() { });	
		$(".lawyers-motto")		.delay(1000).fadeIn(250, function() {});
		$(".lawyers-img")			.delay(1000).animate({height: '286'}, 310, function() { });
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
  
  	
  	<!--<div class="lawyers-menu">
      <ul class="no-mp no-lst ul">
      	<li>
        	<a href="lawyer-info.php?id=1">
          	<img src="imgs/lawyers/1s.jpg" width="100" height="100" border="0" alt="< ?=$l['law-short-name-1']?>" />
            <br />
            <span>< ?=$l['law-short-name-1']?></span>
          </a>
        </li>
      	<li>
        	<a href="lawyer-info.php?id=2">
          	<img src="imgs/lawyers/2s.jpg" width="100" height="100" border="0" alt="< ?=$l['law-short-name-2']?>" />
            <br />
            <span>< ?=$l['law-short-name-2']?></span>
          </a>
        </li>
      	<li>
        	<a href="lawyer-info.php?id=3">
          	<img src="imgs/lawyers/3s.jpg" width="100" height="100" border="0" alt="< ?=$l['law-short-name-3']?>" />
            <br />
            <span>< ?=$l['law-short-name-3']?></span>
          </a>
        </li>
      	<li>
        	<a href="lawyer-info.php?id=4">
          	<img src="imgs/lawyers/4s.jpg" width="100" height="100" border="0" alt="< ?=$l['law-short-name-4']?>" />
            <br />
            <span>< ?=$l['law-short-name-4']?></span>
          </a>
        </li>
      	<li>
        	<a href="lawyer-info.php?id=5">
          	<img src="imgs/lawyers/5s.jpg" width="100" height="100" border="0" alt="< ?=$l['law-short-name-5']?>" />
            <br />
            <span>< ?=$l['law-short-name-5']?></span>
          </a>
        </li>
      	<li>
        	<a href="lawyer-info.php?id=6">
          	<img src="imgs/lawyers/6s.jpg" width="100" height="100" border="0" alt="< ?=$l['law-short-name-6']?>" />
            <br />
            <span>< ?=$l['law-short-name-6']?></span>
          </a>
        </li>
      	<li>
        	<a href="lawyer-info.php?id=6">
          	<img src="imgs/lawyers/7s.jpg" width="100" height="100" border="0" alt="< ?=$l['law-short-name-7']?>" />
            <br />
            <span>< ?=$l['law-short-name-7']?></span>
          </a>
        </li>      
    	</ul>
    </div>   --> 
  	
    <div class="lawyers-txt-cont">
  		<div class="lawyers-txt">
				<div id="scrollable"><?=$l['txt-lawyers']?></div>
      </div>     
    </div>
    
  	<span class="lawyers-motto webfont"><?=$l['motto-lawyers']?></span>
  	<div class="lawyers-img">
    	<img src="imgs/lawyers/lawyers.png" width="469" height="265" border="0" alt="" />
    </div>
  
  	
  
    <!-- <div class="lawyers-txt-cont">
  		<div class="lawyers-txt">
				<div id="scrollable">Η σελίδα θα είναι σύντομα διαθέσιμη.</div>
      </div>     
    </div>-->
	</div>
  <img src="imgs/bg/gradients/lawyers-top.png" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/gradients/left.png" width="0" height="0" class="dn" alt="" />
</div>
<?=foot()?>
</body>
</html>
