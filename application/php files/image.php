<?php 

class Image extends CI_Controller{
	
	function resize(){
		
		$mxh = $this->input->get('h');
		$mxw = $this->input->get('w');
		$adrs= base_url().urldecode($this->input->get('l'));
		//~ echo $adrs;
		$type=exif_imagetype($adrs);
		//$ss = '';
		if($type==3){
			$ss ='Content-type: image/png';
		}else if($type==2){
			$ss='Content-type: image/jpeg';
		}
		//~ header($ss);
		
		list($width,$height)=getimagesize($adrs);

		list($new_width,$new_height)=$this->adjust($width,$height,$mxw,$mxh);
		
		//~ $image_p = imagecreatetruecolor($new_width, $new_height);
		$image_p = imagecreatetruecolor($new_width, $new_height);
		
		$image='';
		if($type==IMAGETYPE_PNG){
			header('Content-type: image/png');
			$image = imagecreatefrompng($adrs);
		}else if($type==IMAGETYPE_JPEG){
			header('Content-type: image/jpeg');
			$image = imagecreatefromjpeg($adrs);
		}
	
		imagecopyresized($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

		imagejpeg($image_p, null, 100);
	}
	
	function crop(){
		
		$mxh = $this->input->get('h');
		$mxw = $this->input->get('w');
		$adrs= base_url().urldecode($this->input->get('l'));
		//~ echo $adrs;
		//$type=exif_imagetype($adrs);
	//	$ss = '';
	//	if($type==3){
	//		$ss ='Content-type: image/png';
	//	}else if($type==2){
	//		$ss='Content-type: image/jpeg';
	//	}
	//	header($ss);
		
		list($width,$height)=getimagesize($adrs);

		//~ list($new_width,$new_height)=$this->adjust($width,$height,$mxw,$mxh);
		$mul = min(floor($width/$mxw),floor($height/$mxh));
		$new_width=$mxw*$mul;
		$new_height=$mxh*$mul;
		$offx=($width-$new_width)/2;
		$offy=($height-$new_height)/2;
		//~ $image_p = imagecreatetruecolor($new_width, $new_height);
		$image_p = imagecreatetruecolor($mxw, $mxh);
		
		//~ $image='';
		//~ if($type==IMAGETYPE_PNG){
			//~ header('Content-type: image/png');
			//~ $image = imagecreatefrompng($adrs);
		//~ }else if($type==IMAGETYPE_JPEG){
			header('Content-type: image/jpeg');
			$image = imagecreatefromjpeg($adrs);
		//~ }

		imagecopyresized($image_p, $image, 0, 0, 0, 0, $mxw, $mxh, $new_width, $new_height);

		imagejpeg($image_p, null, 100);
	}
	
	
	function adjust($w, $h,$mxw,$mxh){
		if($w>$mxw){
			$t = $w;
			$w = $mxw;
			$h = ($mxw/$t)*$h;
		}	

		if($h>$mxh){
			$t = $h;
			$h = $mxh;
			$w = ($mxh/$t)*$w;
		}

		return array($w,$h);
	}
	
	
}


?>
