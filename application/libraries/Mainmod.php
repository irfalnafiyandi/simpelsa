<?php


class mainmod{

	function nama_saya(){
		echo "Nama saya adalah malasngoding !";
	}

	function getext($filename,$fileid,$specialprefix=null){
		//This function will return array that contain the name of file and sign it as each size
		$fext = $filename;
		$sitename = "Surat BPJSTK";

		if($specialprefix){
			$site_name=permalink($sitename,0).'_'.$specialprefix;
		}else{
			$site_name=permalink($sitename,0);
		}

		$fext=strtolower(end(explode('.',$filename)));
		$filename=str_replace(".","",$filename);
		$filename=strtolower(codegen(5)).'_'.$fileid;

		$original = strtolower($site_name."_".$filename);
		$medium   = strtolower($site_name."_".$filename.'_m');
		$small    = strtolower($site_name."_".$filename.'_s');
		$result   = array("l"=>$original,"m"=>$medium,"s"=>$small,"ext"=>$fext);

		return $result;
	}


	function uploadit($fname,$tmpfile,$subdir,$fileid,$sw,$sh,$mw,$mh,$lw=null,$lh=null,$specialprefix=null){
		//this function will upload and at the same time resize the image and return file
		//upload the file to 'images/correct directory/ddmmyyyy'
		//Param $fname is the real name of uploaded file
		//Param $fileid is the record id
		//Param $tmpfile is file temp in php temp dir
		//Param $specialprefix is the prefix name that will added to file name.

		//Populate file name which will be created


		$tmp= $this->getext($fname,$fileid,$specialprefix);
		$lfname=$tmp['l'].'.'.$tmp['ext'];
		$mfname=$tmp['m'].'.'.$tmp['ext'];
		$sfname=$tmp['s'].'.'.$tmp['ext'];

		//Original filename
		$fname=$lfname;

		//Loop to create each file
		for($i=1; $i<=3;$i++){
			//resize the image
			if($i==1){
				$max_width=$lw;
				$max_height=$lh;
				$fname=$fname;
			}

			if($i==2){
				$max_width=$mw;
				$max_height=$mh;
				$fname=$mfname;
				chdir("../../");
			}

			if($i==3){
				$max_width=$sw;
				$max_height=$sh;
				$fname=$sfname;
				chdir("../../");
			}

			$heightWidth=getimagesize($tmpfile);
			$width=$heightWidth[0];
			$height=$heightWidth[1];
			$file=$tmpfile;

			list($firstdir,$nowdir)=explode("/",$subdir);
			if (!$nowdir){
				$nowdir=date('dmY');
				$targetdir= base_url()."assets/" . $firstdir . '/' . $nowdir . '/';
			}else{
				$targetdir= base_url()."assets/" . $subdir . '/';
			}

			//test whether targetdir exists
			if(!@opendir($targetdir) ){
				mkdir($targetdir);
			}

			chdir($targetdir);

			#################################################################
			# SourceCode originally written by phpBuilder.com forum member
			# Little modification done by Dedy (dedy at webby emedia dot net)
			#################################################################
			$x_ratio = $max_width / $width;
			$y_ratio = $max_height / $height;

			if (($width <= $max_width) && ($height <= $max_height)) {
				$tn_width = $width;
				$tn_height = $height;
			}else if (($x_ratio * $height) < $max_height) {
				$tn_height = ceil($x_ratio * $height);
				$tn_width = $max_width;
			}else {
				$tn_width = ceil($y_ratio * $width);
				$tn_height = $max_height;
			}
			##################################################################
			$imagetype=$heightWidth[2];
			//Image type ?
			if($imagetype==1){
				$src = imagecreatefromgif($file);
			}elseif($imagetype==2){
				$src = imagecreatefromjpeg($file);
			}elseif($imagetype==3){
				$src = imagecreatefrompng($file);
			}

			$dst = imagecreatetruecolor($tn_width,$tn_height);

			//Create transparance for gif and png
			if(($imagetype== 1) OR ($imagetype==3)){
				imagealphablending($dst, false);
				imagesavealpha($dst,true);
				$transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
				imagefilledrectangle($dst, 0, 0, $tn_width, $tn_height, $transparent);
			}

			imagecopyresampled($dst, $src, 0, 0, 0, 0,$tn_width,$tn_height,$width,$height);

			//Create image accord to type
			if($imagetype==1){
				imagegif($dst, $fname);
			}elseif($imagetype==2){
				imageinterlace($dst, true); #enable high compress
				imagejpeg($dst, $fname, 100);
			}elseif($imagetype==3){
				imagepng($dst, $fname);
			}

			imagedestroy($src);
			imagedestroy($dst);
			#################################################################
		}

		return array("dir"=>$nowdir,"filename"=>$lfname);
	}


}
