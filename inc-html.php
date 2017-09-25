<?
//--------//
// GLOBAL //
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function css(){
	?>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&amp;subset=latin,greek' rel='stylesheet' type='text/css'>
  <link href="js/jquery/plugins/jScrollPane/css/jScrollPane.css" rel="stylesheet" type="text/css" />
  <link href="css/base.css" rel="stylesheet" type="text/css" />
  <link href="css/forms.css" rel="stylesheet" type="text/css" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <?
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function js(){
	?>
	<script type="text/javascript" language="javascript" src="js/jquery/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery/plugins/jquery.batchImageLoad.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery/plugins/jScrollPane/jquery.mousewheel.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery/plugins/jScrollPane/jScrollPane-1.2.3.min.js"></script>
	<script type="text/javascript">
		$('.jScrollPaneDrag').css('height','13px');
  </script>
  <?
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function favicon(){
	?>
  <link rel="shortcut icon" href="imgs/favicon.ico" />
  <?
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function google_analytics(){
	?>
  <script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-22130546-1']);
		_gaq.push(['_trackPageview']);
	
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
  <?
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//


//--------//
// HEADER //
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function head(){
	global $l;
	?>
  <div class="w-head">
    <div class="w">
      <a href="index.php" class="logo"><img src="imgs/logo_<?=LANG?>.png" width="338" height="84" alt="" /></a>
      <!--
      <div class="languages" style="width:<?=(LANG=='el'?'90':'93')?>px;">    
        <div style="left:0px;"></div>
        <span style="width:<?=(LANG=='el'?'81':'84')?>px;"><a href="index.php?lang=<?=(LANG=='el'?'en':'el')?>"><?=(LANG=='el'?'English':'Ελληνικά')?></a></span>
        <div style="right:0px;"></div>      
      </div>
      -->
      <div id="mnb" class="mnb" style="width:449px;">
        <div class="mnbsep"	style="left:0px;"></div>
        <?
        if(PAGENAME=='index'):
          ?><div class="mnblink" style="left:<?=(LANG=='el'?'1':'4')?>px;width:<?=(LANG=='el'?'63':'73')?>px;"><img src="imgs/mnb/1_<?=LANG?>_on.png" width="<?=(LANG=='el'?'53':'63')?>" height="30" border="0" alt="" /></div><?
        else:
          ?><a href="index.php" class="mnblink" style="left:<?=(LANG=='el'?'1':'4')?>px;width:<?=(LANG=='el'?'63':'73')?>px;"><img src="imgs/mnb/1_<?=LANG?>.png" width="<?=(LANG=='el'?'53':'63')?>" height="30" border="0" alt="" /></a><?
        endif;
        ?>      
        <div class="mnbsep" style="left:<?=(LANG=='el'?'64':'80')?>px;"></div>
        <?
        if(PAGENAME=='company'):
          ?><div class="mnblink" style="left:<?=(LANG=='el'?'65':'84')?>px;width:<?=(LANG=='el'?'61':'65')?>px;"><img src="imgs/mnb/2_<?=LANG?>_on.png" width="<?=(LANG=='el'?'51':'55')?>" height="30" border="0" alt="" /></div><?
        else:
          ?><a href="company.php" class="mnblink" style="left:<?=(LANG=='el'?'65':'84')?>px;width:<?=(LANG=='el'?'61':'65')?>px;"><img src="imgs/mnb/2_<?=LANG?>.png" width="<?=(LANG=='el'?'51':'55')?>" height="30" border="0" alt="" /></a><?
        endif;
        ?>      
        <div class="mnbsep" style="left:<?=(LANG=='el'?'126':'152')?>px;"></div>
        <?
        if(PAGENAME=='lawyers' || PAGENAME=='lawyer-info'):
          ?><div class="mnblink" style="left:<?=(LANG=='el'?'127':'156')?>px;width:<?=(LANG=='el'?'70':'60')?>px;"><img src="imgs/mnb/3_<?=LANG?>_on.png" width="<?=(LANG=='el'?'60':'50')?>" height="30" border="0" alt="" /></div><?
        else:
          ?><a href="lawyers.php" class="mnblink" style="left:<?=(LANG=='el'?'127':'156')?>px;width:<?=(LANG=='el'?'70':'60')?>px;"><img src="imgs/mnb/3_<?=LANG?>.png" width="<?=(LANG=='el'?'60':'50')?>" height="30" border="0" alt="" /></a><?
        endif;
        ?>      
        <div class="mnbsep" style="left:<?=(LANG=='el'?'197':'219')?>px;"></div>
        <?
        if(PAGENAME=='expertise' || PAGENAME=='expertise-info'):
          ?><div class="mnblink" style="left:<?=(LANG=='el'?'198':'223')?>px;width:<?=(LANG=='el'?'80':'66')?>px;"><img src="imgs/mnb/4_<?=LANG?>_on.png" width="<?=(LANG=='el'?'70':'56')?>" height="30" border="0" alt="" /></div><?
        else:
          ?><a href="expertise.php" class="mnblink" style="left:<?=(LANG=='el'?'198':'223')?>px;width:<?=(LANG=='el'?'80':'66')?>px;"><img src="imgs/mnb/4_<?=LANG?>.png" width="<?=(LANG=='el'?'70':'56')?>" height="30" border="0" alt="" /></a><?
        endif;
        ?>      
        <div class="mnbsep" style="left:<?=(LANG=='el'?'278':'292')?>px;"></div>
        <?
        if(PAGENAME=='contact' || PAGENAME=='contact-form'):
          ?><div class="mnblink" style="left:<?=(LANG=='el'?'279':'296')?>px;width:<?=(LANG=='el'?'80':'57')?>px;"><img src="imgs/mnb/5_<?=LANG?>_on.png" width="<?=(LANG=='el'?'70':'47')?>" height="30" border="0" alt="" /></div><?
        else:
          ?><a href="contact.php" class="mnblink" style="left:<?=(LANG=='el'?'279':'296')?>px;width:<?=(LANG=='el'?'80':'57')?>px;"><img src="imgs/mnb/5_<?=LANG?>.png" width="<?=(LANG=='el'?'70':'47')?>" height="30" border="0" alt="" /></a><?
        endif;
        ?>      
        <div class="mnbsep" style="left:<?=(LANG=='el'?'359':'356')?>px;"></div>
        <?
        if(PAGENAME=='publications'):
          ?><div class="mnblink" style="left:<?=(LANG=='el'?'360':'	360')?>px;width:<?=(LANG=='el'?'88':'86')?>px;"><img src="imgs/mnb/6_<?=LANG?>_on.png" width="<?=(LANG=='el'?'78':'76')?>" height="30" border="0" alt="" /></div><?
        else:
          ?><a href="publications.php" class="mnblink" style="left:<?=(LANG=='el'?'360':'	360')?>px;width:<?=(LANG=='el'?'88':'86')?>px;"><img src="imgs/mnb/6_<?=LANG?>.png" width="<?=(LANG=='el'?'78':'76')?>" height="30" border="0" alt="" /></a><?
        endif;
        ?>      
        <div class="mnbsep" style="left:448px;"></div>
      </div> 
    </div>
  </div>
  <?
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//

//---------//
// CONTENT //
//------------------------------------------------------------------------------------------------------------------------------------------------------//

//------------------------------------------------------------------------------------------------------------------------------------------------------//

//--------//
// FOOTER //
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function foot(){
	global $l;
	?>
  <div class="w-foot">
    <div class="hr"></div>
    <div class="w">
    <?=(PAGENAME!='contact'?'<span class="addresses webfont">'.$l['address'].', '.$l['location'].', '.(LANG=='el'?'ΤΗΛ':'TEL').': '.$l['telephone'].', FAX: '.$l['fax'].', <a href="mailto:info@vglawyers.gr" class="webfont">info@vglawyers.gr</a></span> ':'')?>
    <div class="submenu">
      <div class="copy">&copy; <?=(date('Y')==2010?'2010':'2010 - '.date('Y'))?> vglawyers.gr - All rights reserved - <a href="#">Disclaimer</a></div>
      <div class="mnb">
        <? if(PAGENAME=='index'):
          echo $l['mnb-0'];
        else:
          ?><a href="index.php"><?=$l['mnb-0']?></a><?
        endif;
        ?>
         | 
        <? if(PAGENAME=='company'):
          echo $l['mnb-1'];
        else:
          ?><a href="company.php"><?=$l['mnb-1']?></a><?
        endif;
        ?>
         | 
        <? if(PAGENAME=='lawyers'):
          echo $l['mnb-2'];
        else:	
          ?><a href="lawyers.php"><?=$l['mnb-2']?></a><?
        endif;
        ?>
         | 
        <? if(PAGENAME=='expertise'):
          echo $l['mnb-3'];
        else:
          ?><a href="expertise.php"><?=$l['mnb-3']?></a><?
        endif;
        ?>
         | 
        <? if(PAGENAME=='contact'):
          echo $l['mnb-4'];
        else:
          ?><a href="contact.php"><?=$l['mnb-4']?></a><?
        endif;
        ?>
         | 
        <? if(PAGENAME=='publications'):
          echo $l['mnb-5'];
        else:
          ?><a href="publications.php"><?=$l['mnb-5']?></a><?
        endif;
        ?>      
      </div>
      </div>
    	<? /*
    	<a href="http://www.pixeldot.gr" target="_blank" title="PixelDot :: Προηγμένες Εφαρμογές Διαδικτύου" class="credits"><img src="imgs/pxldt.png" alt="PixelDot" border="0" /></a>
    	*/ ?>
    </div>
  </div>
	<?
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//


//----------------//
// FORM MAIL BODY //
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function template_genericHTML($str=null){
	$mailContent='';
	
	$mailContent.='
	<br />
	<div style="border:solid 1px #0B8989;">
		<div style="border:solid 1px #fff;">
			<div style="border:solid 1px #0B8989;background-color:#fff;">
				<table cellpadding="20" cellspacing="0" border="0" width="100%">
					<tr>
						<td align="left" valign="middle">
							<h3 style="margin:0;padding:0;font-family:Tahoma, Geneva, sans-serif;font-size:18px;font-weight:normal;">VG Lawyers</h3>
						</td>
						<td align="right" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:10px;color:#0B8989;">'.date('j/n/Y').'</span></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<br />
	<br />';
	$mailContent.=$str;
	$mailContent.='
	<br />
	<br />
	<br />
	<br />
	<div style="width:100%;padding:10px 0 0 0;border-top:solid 1px #999;text-align:center;">
		<span style="font-family:Tahoma, Geneva, sans-serif;font-size:10px;color:#999;">&copy; vglaw.gr '.(date('Y')>2010?'2010 - '.date('Y'):'2010').'</span>
	</div>';
	
	return $mailContent;
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
?>
