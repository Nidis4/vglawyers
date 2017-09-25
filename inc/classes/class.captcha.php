<?
/**
* Captcha File
* Generates CAPRCHA Numbers Image
* @author Hadar Porat <hpman28@gmail.com>
* @version 1.5
* GNU General Public License (Version 2, June 1991)
*
* This program is free software; you can redistribute
* it and/or modify it under the terms of the GNU
* General Public License as published by the Free
* Software Foundation; either version 2 of the License,
* or (at your option) any later version.
*
* This program is distributed in the hope that it will
* be useful, but WITHOUT ANY WARRANTY; without even the
* implied warranty of MERCHANTABILITY or FITNESS FOR A
* PARTICULAR PURPOSE. See the GNU General Public License
* for more details.
*/

/**
* CaptchaNumbers Class
* @access public
* @author Hadar Porat <hpman28@gmail.com>
* @version 1.51
*/

class CaptchaNumbers {
	var $length = 6;
	//var $font = 'verdana.ttf';
	var $font = 'papyrus.ttf';
	var $size = 17;
	var $type = 'png';
	var $height = 30;
	var $width = 90;
	var $grid = 6;
	var $string = '';
	//var $dots=100;
	var $dots=0;

	/**
	* @return void
	* @param int $length string length
	* @param int $size font size
	* @param String $type image type
	* @desc generate the main image
	*/	
	function CaptchaNumbers($length = '', $size = '', $type = '') {

		if ($length!='') $this -> length = $length;
		if ($size!='') $this -> size = $size;
		if ($type!='') $this -> type = $type;

		$this -> width = $this -> length * $this -> size + $this -> grid;
		$this -> height = $this -> size + (2 * $this -> grid);
		
		$this -> generateString();
	}

	/**
	* @return void
	* @desc display captcha image
	*/		
	function display() {
		$this -> sendHeader();
		$image = $this -> generate();

		switch ($this-> type) {
			case 'jpeg': imagejpeg($image); break;
			case 'png':  imagepng($image);  break;
			case 'gif':  imagegif($image);  break;
			default:     imagepng($image);  break;
		}
	}

	/**
	* @return Image
	* @desc generate the image
	*/		
	function generate() {
		$image = ImageCreate($this -> width, $this -> height) or die("Cannot Initialize new GD image stream");
		
		// colors
		$background_color = ImageColorAllocate($image, 238, 238, 238);
		$net_color = ImageColorAllocate($image, 200, 200, 200);
		$stringcolor = ImageColorAllocate($image, rand(0,100), rand(0,100), rand(0,100));
		//$stringcolor = ImageColorAllocate($image, 0, 0, 0);

		for($i=0;$i<$this->dots;$i++){
			$color = ImageColorAllocate($image, rand(0,255), rand(0,255), rand(0,255));
			imagesetpixel($image,rand(0,$this -> width), rand(0,$this -> height),$color);
		}
		
		// grid
		//for ($i = $this -> grid; $i < $this -> width; $i+=$this -> grid) ImageLine($image, $i, 0, $i, $this -> height, $net_color);
		//for ($i = $this -> grid; $i < $this -> height; $i+=$this -> grid) ImageLine($image, 0, $i, $this -> width, $i, $net_color);

		// make the text
		ImageTTFText($image, $this -> size, 0, 10, 15 + $this -> grid, $stringcolor, $this -> font, $this -> getString());
		
		return $image;
	}

	/**
	* @return String
	* @desc generate the string
	*/	
	function generateString() {
		$string = '';
		
		// USE THIS 4 LETTERS
		for ($i = 0; $i<$this -> length; $i++) {
			$string .= rand(1, 9);
		}
		
		
		/*
		// USE THIS 4 LETTERS & NUMBERS
		$stringZ=array(0=>'C',1=>'D',2=>'F',3=>'G',4=>'J',5=>'L',6=>'Q',7=>'R',8=>'S',9=>'W');
		for ($i = 0; $i<$this -> length; $i++) {
			$decide=rand(1,2);
			if ($decide%2==0) {
				shuffle($stringZ);
				$string.=$stringZ[0];			
			} else {
				$string .= rand(1, 9);
			}				
		}
		*/
		$this -> string = $string;
		return true;
	}

	/**
	* @return void
	* @desc send image header
	*/
	function sendHeader() {
		header('Content-type: image/' . $this -> type);
	}
	
	/**
	* @return String
	* @desc return the string
	*/	
	function getString() {
		return $this -> string;
	}
}

?>