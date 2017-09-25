<?
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function set_lang(){
	$default='el'; // Default Language
	$langs=array('el','el');
	if(isset($_REQUEST['lang']) && in_array($_REQUEST['lang'],$langs)) {
		$_SESSION['lang']=$_REQUEST['lang'];
	}elseif(!isset($_SESSION['lang'])){
		$_SESSION['lang']=$default; 
	}
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//





//------------------------------------------------------------------------------------------------------------------------------------------------------//
/**
 * Returns the "filename" of the current page.
 *
 * @param boolean $ext
 * @return string
 * @example get_pagename(); // return "filename" 
 * @example get_pagename(true); // return "filename.php"
 */
function get_pagename($ext=false){
	$pagename=explode('.',basename($_SERVER['PHP_SELF']));
	if(!$ext){
		unset($pagename[count($pagename)-1]);
	}
	return implode('.',$pagename);
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//





//--//
//  //
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function str_cut($string,$words_count='40',$suffix='...'){
	$string=explode(' ',$string,$words_count+1);
	unset($string[$words_count]);
	return implode(' ',$string).(count($string)>=$words_count?$suffix:'');
}
//------------------------------------------------------------------------------------------------------------------------------------------------------//
?>