<?
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function form_newsletterRegistration(){
	global $l;
	?>
    <div class="newsletter">
      <img src="imgs/newsletter.png" alt="newsletter" class="title" />      
      <form method="post" action="#" id="form-newsletter" class="form">
        <input type="hidden" name="submit" value="submit" />
        <input type="text" id="newsletter-form-email" name="newsletter-form-email" value="<?=$l['newsletter']?>" class="field" />
        <input type="image" id="btn-register4newsltter" src="imgs/btns/<?=LANG?>_news_send.gif" class="button" />
      </form>
      <div id="form-newsletter-ajax-loader" class="dn" style="text-align:center;"><br /><img src="imgs/ajax-loader.gif" alt="" border="0" /></div>
      <script type="text/javascript">
      <!--
      var frmvalidator = new Validator('form-newsletter');
      frmvalidator.addValidation("newsletter-form-email","req","Παρακαλώ συμπληρώστε το email σας!");
      frmvalidator.addValidation("newsletter-form-email","email","To Email που συμπληρώσατε δεν ειναι έγκυρο!");
      
      frmvalidator.setAddnlValidationFunction("register4newsletter"); 
      
      function register4newsletter(){
        $('#form-newsletter').addClass('dn');
        $('#form-newsletter-ajax-loader').removeClass('dn');
  
        $.ajax({
          type: "POST",
          url: "ajax-newsletter.php",
          data: "email="+$('#newsletter-form-email').val()+'&t='+(new Date()).getTime(),
          success: function(result){
            if(result=='registered'){
              alert("Ευχαριστούμε για την εγγραφή σας.");
              $('#newsletter-form-email').val('');
            }else{
              alert("Παρουσιάστικε κάποιο σφάλμα κατά την διάρκεια της εγγραφής σας!\nΠαρακαλώ δοκιμάστε ξανά...");
            }
            $('#form-newsletter-ajax-loader').addClass('dn');
            $('#form-newsletter').removeClass('dn');
          }
        });
        return false;
      }
      -->
      </script>
  	</div>
  <?
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function form_contact($r=array()){
	global $l;
	?>
    <div class="w-form">
      <span class="explanatory color-1 webfont" style="font-size:22px;"><?=$l['ifyouwish']?></span>
      <form method="post" action="contact-form.php" id="form_contact" class="form-contact">
        <input type="hidden" name="submit" value="sendContactMail" />
    
        <div style="margin-bottom:10px;margin-top:30px;">
          <table width="960" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
              <td width="90" height="20" align="right" valign="middle"><label class="label" for="cf_f_name"><?=$l['f-firstname']?>:</label></td>
              <td width="206"><input type="text" id="cf_f_name" name="cf_f_name" value="<?=@$r['cf_f_name']?>" class="ff-206" onfocus="this.className='ff-206 ff-206-selected';" onblur="this.className='ff-206';" /></td>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
              <td width="118" height="20" align="right" valign="middle"><label class="label" for="cf_l_name"><?=$l['f-lastname']?>:</label></td>
              <td width="206"><input type="text" id="cf_l_name" name="cf_l_name" value="<?=@$r['cf_l_name']?>" class="ff-206" onfocus="this.className='ff-206 ff-206-selected';" onblur="this.className='ff-206';" /></td>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
              <td width="90" height="20" align="right" valign="middle"><label class="label b" for="cf_email"><?=$l['f-email']?>:</label></td>
              <td width="206"><input type="text" id="cf_email" name="cf_email" value="<?=@$r['cf_email']?>" class="ff-206" onfocus="this.className='ff-206 ff-206-selected';" onblur="this.className='ff-206';" /></td>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
            </tr>
          </table>
        </div>
    
        <div style="margin-bottom:10px;">
          <table width="960" cellpadding="0" cellspacing="0" border="0">
            <tr>  
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
              <td width="90" height="20" align="right" valign="middle"><label class="label" for="cf_job"><?=$l['f-profession']?>:</label></td>
              <td width="206"><input type="text" id="cf_job" name="cf_job" value="<?=@$r['cf_job']?>" class="ff-206" onfocus="this.className='ff-206 ff-206-selected';" onblur="this.className='ff-206';" /></td>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
              <td width="118" height="20" align="right" valign="middle"><label class="label" for="cf_address"><?=$l['f-address']?>:</label></td>
              <td width="206"><input type="text" id="cf_address" name="cf_address" value="<?=@$r['cf_address']?>" class="ff-206" onfocus="this.className='ff-206 ff-206-selected';" onblur="this.className='ff-206';" /></td>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
              <td width="90" align="right" height="20" valign="middle"><label class="label" for="cf_pc"><?=$l['f-postalcode']?>:</label></td>
              <td width="206"><input type="text" id="cf_pc" name="cf_pc" value="<?=@$r['cf_pc']?>" class="ff-206" onfocus="this.className='ff-206 ff-206-selected';" onblur="this.className='ff-206';" /></td>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
            </tr>
          </table>
        </div>
    
        <div style="margin-bottom:10px;">
          <table width="960" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
              <td width="90" height="20" align="right" valign="middle"><label class="label" for="cf_tel"><?=$l['f-telephone']?>:</label></td>
              <td width="206"><input type="text" id="cf_tel" name="cf_tel" value="<?=@$r['cf_tel']?>" class="ff-206" onfocus="this.className='ff-206 ff-206-selected';" onblur="this.className='ff-206';" /></td>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
              <td width="118" height="20" align="right" valign="middle"><label class="label" for="cf_mob"><?=$l['f-cellphone']?>:</label></td>
              <td width="206"><input type="text" id="cf_mob" name="cf_mob" value="<?=@$r['cf_mob']?>" class="ff-206" onfocus="this.className='ff-206 ff-206-selected';" onblur="this.className='ff-206';" /></td>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
              <td width="90" height="20" align="right" valign="middle"><label class="label" for="cf_fax"><?=$l['f-fax']?>:</label></td>
              <td width="206"><input type="text" id="cf_fax" name="cf_fax" value="<?=@$r['cf_fax']?>" class="ff-206" onfocus="this.className='ff-206 ff-206-selected';" onblur="this.className='ff-206';" /></td>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
            </tr>
          </table>
        </div>
    
        <div style="margin-bottom:20px;">
          <table width="960" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
              <td width="90" height="20" align="right" valign="middle"><label class="label b" for="cf_txt"><?=$l['f-message']?>:</label></td>
              <td width="848"><textarea id="cf_txt" name="cf_txt" rows="1" cols="1" class="ff-848" onfocus="this.className='ff-848 ff-848-selected';" onblur="this.className='ff-848';" style="width:830px;height:72px;"><?=@$r['cf_txt']?></textarea></td>
              <td width="11" style="background:url(imgs/bg/ff/sep.gif) repeat-y"></td>
            </tr>
          </table>
        </div>
    
        <div style="margin:6px 0 22px 0;">
          <table width="960" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td width="550" align="right"><label class="label b" for="cf_captcha"><?=$l['captcha']?></label></td>
              <td width="10"></td>
              <td width="96" valign="top"><img src="cimage.php?r=249&amp;g=249&amp;b=244" alt="CAPTCHA" class="captchaimg" /></td>
              <td width="8"></td>
              <td width="96" valign="top"><input type="text" id="cf_captcha" name="cf_captcha" maxlength="4" class="captchafield" /></td>
              <td width="200"></td>
            </tr>
          </table>
        </div>
    
        <table width="960" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td width="30"></td>
            <td width="10" style="border-top:1px solid #FFF;"></td>
            <td width="460" style="padding-bottom:3px;border-top:1px solid #FFF;"><div class="white" style="text-align:left;"><label for="cf_copy" class="white"><?=$l['messagecopy']?></label><input type="checkbox" id="cf_copy" name="cf_copy" style="position:relative;top:3px;" /></div></td>
            <td width="270" height="23" colspan="6" align="right" valign="middle" class="white" style="border-top:1px solid #FFF;padding-right:10px;"><?=$l['obligatory']?></td>
            <td width="150" height="36" valign="top" style="border-top:1px solid #FFF;">
              <div class="btn-bg-off" onmouseover="this.className='btn-bg-off btn-bg-on';" onmouseout="this.className='btn-bg-off';">
                <input type="image" id="cf_submit" value="submit" src="imgs/btns/form-150.gif" class="cp btn" />
                <span class="btn-txt webfont"><?=$l['btn-send']?></span>
              </div>
            </td>
            <td width="10" style="border-top:1px solid #FFF;"></td>
            <td width="30"></td>
          </tr>
        </table>
    
    </form>
    <script language="javascript" type="text/javascript">
		<!--
		var frmvalidator = new Validator('form_contact');
		frmvalidator.addValidation("cf_email",		"req",		"<?=$l['v-t-mail']?>!");
		frmvalidator.addValidation("cf_email",		"email",	"<?=$l['v-i-mail']?>!");
		frmvalidator.addValidation("cf_txt",			"req",		"<?=$l['v-t-msg']?>!");
		frmvalidator.addValidation("cf_captcha",	"req",		"<?=$l['v-t-captcha']?>!");		
		-->
    </script>
    
    </div>
  <?
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function form_subscribeUser(){
	global $l;
	?>
    <div class="w-form">
      <span class="explanatory"><?=$l['subscribe']?></span>    
      <form method="post" action="subscribe.php" id="form_subscribe">
        <input type="hidden" name="submit" value="UserRegistration" />
       
        <div class="color-1" style="border-bottom:solid 1px #999;padding:0 0 5px 10px;margin-bottom:10px;"><?=$l['title-personal-details']?></div>
        <div style="margin-bottom:20px;">
          <table width="640" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td height="20" valign="middle"><label class="label b" for="sf_f_name"><?=$l['f-firstname']?>:</label></td>
            <td width="10"></td>
            <td height="20" valign="middle"><label class="label b" for="sf_l_name"><?=$l['f-lastname']?>:</label></td>
          </tr>
          <tr>
            <td><input type="text" id="sf_f_name" name="sf_f_name" value="<?=@$r['sf_f_name']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
            <td></td>
            <td><input type="text" id="sf_l_name" name="sf_l_name" value="<?=@$r['sf_l_name']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
          </tr>
          </table>
        </div>      
                
        <div class="color-1" style="border-bottom:solid 1px #999;padding:0 0 5px 10px;margin-bottom:10px;"><?=$l['title-contact-details']?></div>      
        <div style="margin-bottom:20px;">
          <table width="640" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="20" valign="middle"><label class="label" for="sf_address"><?=$l['f-address']?>:</label></td>
              <td width="10"></td>
              <td height="20" valign="middle"><label class="label" for="sf_pc"><?=$l['f-postalcode']?>:</label></td> 
              <td width="10"></td>
              <td height="20" valign="middle"><label class="label" for="sf_city-area"><?=$l['f-city']?>:</label></td> 
            </tr>
            <tr>
              <td><input type="text" id="sf_address" name="sf_address" value="<?=@$r['sf_address']?>"	class="ff-245" onfocus="this.className='ff-245 ff-245-selected';" onblur="this.className='ff-245';" /></td>
              <td></td>
              <td><input type="text" id="sf_pc" name="sf_pc" value="<?=@$r['sf_pc']?>" class="ff-130" onfocus="this.className='ff-130 ff-130-selected';" onblur="this.className='ff-130';" /></td>
              <td></td>
              <td><input type="text" id="sf_city-area" name="sf_city-area" value="<?=@$r['sf_city-area']?>" class="ff-245" onfocus="this.className='ff-245 ff-245-selected';" onblur="this.className='ff-245';" /></td>
            </tr>
          </table>
          <br />
          <table width="640" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="20" valign="middle"><label class="label" for="sf_tel"><?=$l['f-telephone']?>:</label></td>
              <td width="10"></td>
              <td height="20" valign="middle"><label class="label" for="sf_mob"><?=$l['f-cellphone']?>:</label></td>
            </tr>
            <tr>
              <td><input type="text" id="sf_tel" name="sf_tel" value="<?=@$r['sf_tel']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
              <td></td>
              <td><input type="text" id="sf_mob" name="sf_mob" value="<?=@$r['sf_mob']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
            </tr>
          </table>
        </div>
           
        <div class="color-1" style="border-bottom:solid 1px #999;padding:0 0 5px 10px;margin-bottom:10px;"><?=$l['title-account-details']?></div>      
        <div style="margin-bottom:10px;">
          <table width="640" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="20" valign="middle"><label class="label b" for="sf_mail"><?=$l['f-email']?>:</label></td>
              <td width="10"></td>
              <td height="20" valign="middle"><label class="label b" for="sf_mail-conf"><?=$l['f-email-conf']?>:</label></td>
            </tr>
            <tr>
              <td><input type="text" id="sf_mail" name="sf_mail" value="<?=@$r['sf_mail']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
              <td></td>
              <td><input type="text" id="sf_mail-conf" name="sf_mail-conf" value="<?=@$r['sf_mail-conf']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
            </tr>
          </table> 
          <br />
          <table width="640" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="20" valign="middle"><label class="label b" for="sf_pass"><?=$l['f-password']?>:</label></td>
              <td width="10"></td>
              <td height="20" valign="middle"><label class="label b" for="sf_pass-conf"><?=$l['f-password-conf']?>:</label></td>
            </tr>
            <tr>
              <td><input type="text" id="sf_pass" name="sf_pass" value="<?=@$r['sf_pass']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
              <td></td>
              <td><input type="text" id="sf_pass-conf" name="sf_pass-conf" value="<?=@$r['sf_pass-conf']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
            </tr>
          </table>        
        </div>  
                   
        <div style="margin:20px 0 20px 0;">              
          <table width="640" cellpadding="0" cellspacing="0" border="0">
            <tr>                  
              <td width="380" valign="middle" align="right"><label class="label b" for="sf_captcha"><?=$l['captcha']?></label></td>
              <td width="10"></td>
              <td width="96" valign="top"><img src="cimage.php?r=249&amp;g=249&amp;b=244" alt="CAPTCHA" class="captchaimg" /></td>
              <td width="8"></td>
              <td width="96" valign="top"><input type="text" id="sf_captcha" name="sf_captcha" maxlength="4" class="captchafield" /></td>
              <td width="50"></td>
            </tr>
          </table>
        </div>
              
        <table width="640" cellpadding="0" cellspacing="0" border="0" style="background:url(imgs/bg/form-bar.jpg);">
          <tr>
            <td width="460"><div class="white" style="padding-left:40px;"><?=$l['obligatory']?></div></td>
            <td width="150" height="36" valign="top">
              <div class="btn-bg-off" onmouseover="this.className='btn-bg-off btn-bg-on';" onmouseout="this.className='btn-bg-off';">
                <input type="image" id="sf_submit" value="submit" src="imgs/btns/form-150.gif" class="cp btn" />
                <span class="btn-txt"><?=$l['btn-subscribe']?></span>
              </div>
            </td>
            <td width="30"></td>
          </tr>
        </table>
              
      </form>
		<script language="javascript" type="text/javascript">
		<!--
		var frmvalidator = new Validator('form_subscribe');
		frmvalidator.addValidation("sf_firstname",			"req",		"<?=$l['v-t-firstname']?>!");
		frmvalidator.addValidation("sf_lastname",				"req",		"<?=$l['v-t-lastname']?>!");
		frmvalidator.addValidation("sf_email",					"email",	"<?=$l['v-t-mail']?>!");
		frmvalidator.addValidation("sf_email-conf",			"email",	"<?=$l['v-t-mail']?>!");
		frmvalidator.addValidation("sf_password",				"req",		"<?=$l['v-t-password']?>!");
		frmvalidator.addValidation("sf_password-conf",	"req",		"<?=$l['v-t-password']?>!");
		frmvalidator.addValidation("sf_captcha",				"req",		"<?=$l['v-t-captcha']?>!");		
		-->
    </script>
  </div>  
  <?
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function form_settingsUserAccount(){
	global $l;
	?>
    <div class="w-form">
      <span class="explanatory"><?=$l['modify']?></span>    
      <form method="post" action="subscribe.php" id="form_subscribe">
        <input type="hidden" name="submit" value="UserRegistration" />
                
        <div class="color-1" style="border-bottom:solid 1px #999;padding:0 0 5px 10px;margin-bottom:10px;"><?=$l['title-modify-personal-details']?></div>
        <div style="margin-bottom:20px;">            
          <table width="640" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="20" valign="middle"><label class="label b" for="sf_f_name"><?=$l['f-firstname']?>:</label></td>
              <td width="10"></td>
              <td height="20" valign="middle"><label class="label b" for="sf_l_name"><?=$l['f-lastname']?>:</label></td>
            </tr>
            <tr>
              <td><input type="text" id="sf_f_name" name="sf_f_name" value="<?=@$r['sf_f_name']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
              <td></td>
              <td><input type="text" id="sf_l_name" name="sf_l_name" value="<?=@$r['sf_l_name']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
            </tr>
          </table>
        </div>

        <div class="color-1" style="border-bottom:solid 1px #999;padding:0 0 5px 10px;margin-bottom:10px;"><?=$l['title-modify-contact-details']?></div>
        <div style="margin-bottom:20px;">            
          <table width="640" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="20" valign="middle"><label class="label" for="sf_address"><?=$l['f-address']?>:</label></td>
              <td width="10"></td>
              <td height="20" valign="middle"><label class="label" for="sf_pc"><?=$l['f-postalcode']?>:</label></td> 
              <td width="10"></td>
              <td height="20" valign="middle"><label class="label" for="sf_city-area"><?=$l['f-city']?>:</label></td> 
            </tr>
            <tr>
              <td><input type="text" id="sf_address" name="sf_address" value="<?=@$r['sf_address']?>"	class="ff-245" onfocus="this.className='ff-245 ff-245-selected';" onblur="this.className='ff-245';" /></td>
              <td></td>
              <td><input type="text" id="sf_pc" name="sf_pc" value="<?=@$r['sf_pc']?>" class="ff-130" onfocus="this.className='ff-130 ff-130-selected';" onblur="this.className='ff-130';" /></td>
              <td></td>
              <td><input type="text" id="sf_city-area" name="sf_city-area" value="<?=@$r['sf_city-area']?>" class="ff-245" onfocus="this.className='ff-245 ff-245-selected';" onblur="this.className='ff-245';" /></td>
            </tr>
          </table>
          <br />
          <table width="640" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="20" valign="middle"><label class="label" for="sf_tel"><?=$l['f-telephone']?>:</label></td>
              <td width="10"></td>
              <td height="20" valign="middle"><label class="label" for="sf_mob"><?=$l['f-cellphone']?>:</label></td>
            </tr>
            <tr>
              <td><input type="text" id="sf_tel" name="sf_tel" value="<?=@$r['sf_tel']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
              <td></td>
              <td><input type="text" id="sf_mob" name="sf_mob" value="<?=@$r['sf_mob']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
            </tr>
          </table>
        </div>

        <div class="color-1" style="border-bottom:solid 1px #999;padding:0 0 5px 10px;margin-bottom:10px;"><?=$l['title-modify-account-details']?></div>
        <div style="margin-bottom:10px;">            
          <table width="640" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="20" valign="middle"><label class="label b" for="sf_pass"><?=$l['f-password']?>:</label></td>
              <td width="10"></td>
              <td height="20" valign="middle"><label class="label b" for="sf_pass-conf"><?=$l['f-password-conf']?>:</label></td>
            </tr>
            <tr>
              <td><input type="text" id="sf_pass" name="sf_pass" value="<?=@$r['sf_pass']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
              <td></td>
              <td><input type="text" id="sf_pass-conf" name="sf_pass-conf" value="<?=@$r['sf_pass-conf']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
            </tr>
          </table>
        </div>

        <div style="margin:20px 0 20px 0;">              
          <table width="540" cellpadding="0" cellspacing="0" border="0">
            <tr>                  
              <td width="330" valign="middle" align="right"><label class="label b" for="sf_captcha"><?=$l['captcha']?></label></td>
              <td width="10"></td>
              <td width="96" valign="top"><img src="cimage.php?r=249&amp;g=249&amp;b=244" alt="CAPTCHA" class="captchaimg" /></td>
              <td width="8"></td>
              <td width="96" valign="top"><input type="text" id="sf_captcha" name="sf_captcha" maxlength="4" class="captchafield" /></td>
            </tr>
          </table>
        </div>
            
        <table width="640" cellpadding="0" cellspacing="0" border="0" style="background:url(imgs/bg/form-bar.jpg);">
          <tr>
            <td width="460"><div class="white" style="padding-left:40px;"><?=$l['obligatory']?></div></td>
            <td width="150" height="36" valign="top">
              <div class="btn-bg-off" onmouseover="this.className='btn-bg-off btn-bg-on';" onmouseout="this.className='btn-bg-off';">
                <input type="image" id="sf_submit" value="submit" src="imgs/btns/form-150.gif" class="cp btn" />
                <span class="btn-txt"><?=$l['btn-save']?></span>
              </div>
            </td>
            <td width="30"></td>
          </tr>
        </table>
              
      </form>
		<script language="javascript" type="text/javascript">
			<!--
				var frmvalidator = new Validator('form_subscribe');
					frmvalidator.addValidation("sf_firstname",			"req",		"<?=$l['v-t-firstname']?>!");
					frmvalidator.addValidation("sf_lastname",				"req",		"<?=$l['v-t-lastname']?>!");
					frmvalidator.addValidation("sf_email",					"email",	"<?=$l['v-t-mail']?>!");
					frmvalidator.addValidation("sf_email-conf",			"email",	"<?=$l['v-t-mail']?>!");
					frmvalidator.addValidation("sf_password",				"req",		"<?=$l['v-t-password']?>!");
					frmvalidator.addValidation("sf_password-conf",	"req",		"<?=$l['v-t-password']?>!");
					frmvalidator.addValidation("sf_captcha",				"req",		"<?=$l['v-t-captcha']?>!");		
			-->
    </script>
  </div>  
  <?
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function form_reminderUserPassword(){
	global $l;
	?>
    <div class="w-form">
      <span class="explanatory"><?=$l['reminder']?></span>    
      <form method="post" action="subscribe.php" id="form_subscribe">
        <input type="hidden" name="submit" value="UserRegistration" />
            
        <div style="margin-bottom:20px;width:640px;">
          <table width="315" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="20" valign="middle"><label class="label b" for="sf_f_name"><?=$l['f-email']?>:</label></td>
            </tr>
            <tr>
              <td><input type="text" id="sf_f_name" name="sf_f_name" value="<?=@$r['sf_f_name']?>" class="ff-315" onfocus="this.className='ff-315 ff-315-selected';"	onblur="this.className='ff-315';" /></td>
            </tr>
          </table>
        </div>

        <table width="640" cellpadding="0" cellspacing="0" border="0" style="background:url(imgs/bg/form-bar.jpg);">
          <tr>
            <td width="460"><div class="white" style="padding-left:40px;"><?=$l['obligatory']?></div></td>
            <td width="150" height="36" valign="top">
              <div class="btn-bg-off" onmouseover="this.className='btn-bg-off btn-bg-on';" onmouseout="this.className='btn-bg-off';">
                <input type="image" id="sf_submit" value="submit" src="imgs/btns/form-150.gif" class="cp btn" />
                <span class="btn-txt"><?=$l['btn-send']?></span>
              </div>
            </td>
            <td width="30"></td>
          </tr>
        </table>
              
      </form>
		<script language="javascript" type="text/javascript">
			<!--
				var frmvalidator = new Validator('form_subscribe');
					frmvalidator.addValidation("sf_firstname",			"req",		"<?=$l['v-t-firstname']?>!");
					frmvalidator.addValidation("sf_lastname",				"req",		"<?=$l['v-t-lastname']?>!");
					frmvalidator.addValidation("sf_email",					"email",	"<?=$l['v-t-mail']?>!");
					frmvalidator.addValidation("sf_email-conf",			"email",	"<?=$l['v-t-mail']?>!");
					frmvalidator.addValidation("sf_password",				"req",		"<?=$l['v-t-password']?>!");
					frmvalidator.addValidation("sf_password-conf",	"req",		"<?=$l['v-t-password']?>!");
					frmvalidator.addValidation("sf_captcha",				"req",		"<?=$l['v-t-captcha']?>!");		
			-->
    </script>
  </div>  
  <?
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function form_loginUser(){
	global $l;
	?>
    <div id="login-form" class="loginform dn">
      <p class="login-password-reminder"><a href="reminder.php"><?=$l['login-reminder']?></a></p>
    	<form method="post" action="#" id="">
        <label for="l_mail"><span class="login-mail-label" style=""><?=$l['login-email']?>:</span></label>        
        <input type="text" id="l_mail" name="l_mail" value="" class="login-mail-field" style="" />        
        <label for="l_password"><span class="login-password-label" style=""><?=$l['login-password']?>:</span></label>        
        <input type="text" id="l_password" name="l_password" value="" class="login-password-field" style="" />        
        <span class="login-button"><a href="#"><?=$l['login']?></a></span>
            	</form>
    </div>
  <?
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//


?>
