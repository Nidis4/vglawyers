<?
//------------------------------------------------------------------------------------------------------------------------------------------------------//
require_once("inc.php");
//------------------------------------------------------------------------------------------------------------------------------------------------------//
$r=@$_REQUEST;
if(@$r['submit'] && @$r['submit']=='sendContactMail'):
	if(@$r['cf_captcha']==$_SESSION['captcha']){
		$sent=sendContactMail('user',$r);
		$sent=sendContactMail('admin',$r);
		$r=array();
		$msg='<script type="text/javascript" language="javascript"> alert("'.$l['cf-msg-2'].'."); </script>';
	}else{
		$msg='<script type="text/javascript" language="javascript"> alert("'.$l['cf-msg-1'].'!"); </script>';
	}
endif;
//------------------------------------------------------------------------------------------------------------------------------------------------------//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?=SITENAME?> <?=$l['pt-4']?> > <?=(LANG=='el'?'Φόρμα Επικοινωνίας':'Contact Form')?></title>
<?=css()?>
<?=js()?>
<script type="text/javascript">
<!--
$(document).ready(function(){
	
	pageAnimationCallBack=function(){
		//setTimeout(performPageAnimation,5000);
		performPageAnimation();
	}
	
	performPageAnimation=function(){
		$("#page-loader").addClass("dn");
		
		$("#deg-horizontal").delay(1200).animate({height: '475'}, 500, function() { });
		$("#form")					.delay(1200).animate({height: '530'}, 500, function() { });
		$("#backlink")			.delay(1700).fadeIn(300);
	}
	
	$(".w-main").find('img').batchImageLoad({
		loadingCompleteCallback: pageAnimationCallBack
	});	
	
});
-->
</script>
<script type="text/javascript" src="js/lib/validator.js"></script>
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
  	<div id="form" style="position:absolute;bottom:0px;left:0px;width:960px;height:0px;"><?=form_contact()?></div>
    <span id="backlink" style="display:none;position:absolute;text-align:center;width:960px;font-size:22px;left:0px;top:476px;height:20px;"><a class="webfont" href="contact.php" style="color:#FFF;"><?=(LANG=='el'?'Πίσω στα Στοιχεία Επικοινωνίας':'Back to Contact Details')?></a></span>
	</div>
	<div id="deg-horizontal" class="gradient"></div>
  <img src="imgs/bg/ff/form_206_on.gif" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/ff/form_206_off.gif" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/ff/form_848_on.gif" width="0" height="0" class="dn" alt="" />
  <img src="imgs/bg/ff/form_848_off.gif" width="0" height="0" class="dn" alt="" />
</div>
<?=foot()?>
</body>
</html>
<?
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function sendContactMail($for=null,$r=array()){
		
	include_once("./admin/inc/classes/class.phpmailer.php");
	$mail = new phpmailer();
	$mail->IsSMTP();
	$mail->Host     = "localhost";
	$mail->SMTPAuth = false;
	//$mail->SingleTo = true; //Create a single email for each seperate TO: address
	$mail->SetFrom('info@vglawyers.gr', 'VG Lawyers');
	
	$mail->WordWrap = 50;
	$mail->IsHTML(true);
	$mail->CharSet	= "utf-8";
	$mail->Subject  = "Φόρμα Επικοινωνίας";
	
	switch($for){
		case 'user':
			$mail->AddAddress("".@$r['cf_email']."", "VG Lawyers");
			$mail->MsgHTML(constructContactMailBody($for,$r));
			break;
		case 'admin':
		default :
			$mail->AddAddress("info@vglawyers.gr", "VG Lawyers");
			$mail->MsgHTML(constructContactMailBody($for,$r));
			break;
	}
	
	if($mail->Send()){
		return true;
	}else{
		//echo ($mail->ErrorInfo);
		return false;
	}
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function constructContactMailBody($for=null,$r=array()){
	global $l;
	$mailBody='';
	
	$mailBody.='<table cellpadding="3" cellspacing="0" border="0">';
	
	if(@!empty($r['cf_f_name'])){
		$mailBody.= '
		<tr>
			<td align="right" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#555;">'.($for=='user'?$l['cf-fl-firstname']:'Όνομα').':</span></td>
			<td align="left" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#333;">'.@$r['cf_f_name'].'</span></td>
		</tr>';
	}
	
	if(@!empty($r['cf_l_name'])){
		$mailBody.= '
		<tr>
			<td align="right" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#555;">'.($for=='user'?$l['cf-fl-lastname']:'Επώνυμο').':</span></td>
			<td align="left" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#333;">'.@$r['cf_l_name'].'</span></td>
		</tr>';
	}
	
	if(@!empty($r['cf_job'])){
		$mailBody.= '
		<tr>
			<td align="right" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#555;">'.($for=='user'?$l['cf-fl-profession']:'Επάγγελμα').':</span></td>
			<td align="left" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#333;">'.@$r['cf_job'].'</span></td>
		</tr>';
	}
	
	if(@!empty($r['cf_email'])){
		$mailBody.= '
		<tr>
			<td align="right" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#555;">Email:</span></td>
			<td align="left" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#333;">'.@$r['cf_email'].'</span></td>
		</tr>';
	}
	
	if(@!empty($r['cf_address'])){
		$mailBody.= '
		<tr>
			<td align="right" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#555;">'.($for=='user'?$l['cf-fl-address']:'Διεύθυνση').':</span></td>
			<td align="left" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#333;">'.@$r['cf_address'].'</span></td>
		</tr>';
	}
	
	if(@!empty($r['cf_pc'])){
		$mailBody.= '
		<tr>
			<td align="right" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#555;">'.($for=='user'?$l['cf-fl-postalcode']:'T.K.').':</span></td>
			<td align="left" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#333;">'.@$r['cf_pc'].'</span></td>
		</tr>';
	}
	
	if(@!empty($r['cf_tel'])){
		$mailBody.= '
		<tr>
			<td align="right" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#555;">'.($for=='user'?$l['cf-fl-telephone']:'Τηλέφωνο').':</span></td>
			<td align="left" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#333;">'.@$r['cf_tel'].'</span></td>
		</tr>';
	}
	
	if(@!empty($r['cf_mob'])){
		$mailBody.= '
		<tr>
			<td align="right" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#555;">'.($for=='user'?$l['cf-fl-cellphone']:'Κινητό').':</span></td>
			<td align="left" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#333;">'.@$r['cf_mob'].'</span></td>
		</tr>';
	}
	
	if(@!empty($r['cf_fax'])){
		$mailBody.= '
		<tr>
			<td align="right" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#555;">Fax:</span></td>
			<td align="left" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#333;">'.@$r['cf_fax'].'</span></td>
		</tr>';
	}
	
	if(@!empty($r['cf_txt'])){
		$mailBody.= '
		<tr>
			<td align="right" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#555;">'.($for=='user'?$l['cf-fl-message']:'Μήνυμα').':</span></td>
			<td align="left" valign="top"><span style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;color:#333;">'.nl2br(@$r['cf_txt']).'</span></td>
		</tr>';
	}
	$mailBody.='</table>';
	
	return template_genericHTML($mailBody);
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
?>