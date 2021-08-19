<?php
// +------------------------------------------------------------------------+
// | author Deen Zhareiv
// | author_url : http://codecanyon.net/user/zhareiv
// +------------------------------------------------------------------------+
// | EdenPHP - Data and information management system
// | Copyright (c) 2019 EdenPHP. All rights reserved.
// +------------------------------------------------------------------------+
// This function is part of the EdenPHP system
// This function is for image management and editing

	function F_Resize_Crop_Image($max_width, $max_height, $source_file, $dst_dir, $quality = 80) {
		$imgsize = getimagesize($source_file);
		$width   = $imgsize[0];
		$height  = $imgsize[1];
		$mime    = $imgsize['mime'];
		switch ($mime) {
			case 'image/gif':
				$image_create = "imagecreatefromgif";
				$image        = "imagegif";
				break;
			case 'image/png':
				$image_create = "imagecreatefrompng";
				$image        = "imagepng";
				break;
			case 'image/jpeg':
				$image_create = "imagecreatefromjpeg";
				$image        = "imagejpeg";
				break;
			default:
				return false;
				break;
		}
		$dst_img    = imagecreatetruecolor($max_width, $max_height);
		$src_img    = $image_create($source_file);
		$width_new  = $height * $max_width / $max_height;
		$height_new = $width * $max_height / $max_width;
		if ($width_new > $width) {
			$h_point = (($height - $height_new) / 2);
			imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
		} else {
			$w_point = (($width - $width_new) / 2);
			imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
		}
		imagejpeg($dst_img, $dst_dir, $quality);
		if ($dst_img)
			imagedestroy($dst_img);
		if ($src_img)
			imagedestroy($src_img);
	}

	function F_CompressImage($source_url, $destination_url, $quality) {
		$info = getimagesize($source_url);
		if ($info['mime'] == 'image/jpeg') {
			$image = imagecreatefromjpeg($source_url);
			imagejpeg($image, $destination_url, $quality);
		} elseif ($info['mime'] == 'image/gif') {
			$image = imagecreatefromgif($source_url);
			imagegif($image, $destination_url, $quality);
		} elseif ($info['mime'] == 'image/png') {
			$image = imagecreatefrompng($source_url);
			imagepng($image, $destination_url);
		}
	}
//-->
	function F_ShareFile($data = array(), $type = 0) {
		$allowed = '';
		if (!file_exists('upload/photos/' . date('Y'))) {
			mkdir('upload/photos/' . date('Y'), 0777, true);
		}
		if (!file_exists('upload/photos/' . date('Y') . '/' . date('m'))) {
			mkdir('upload/photos/' . date('Y') . '/' . date('m'), 0777, true);
		}
		if (!file_exists('upload/videos/' . date('Y'))) {
			mkdir('upload/videos/' . date('Y'), 0777, true);
		}
		if (!file_exists('upload/videos/' . date('Y') . '/' . date('m'))) {
			mkdir('upload/videos/' . date('Y') . '/' . date('m'), 0777, true);
		}
		if (isset($data['file']) && !empty($data['file'])) {
			$data['file'] = $data['file'];
		}
		if (isset($data['name']) && !empty($data['name'])) {
			$data['name'] = PHP_Secure($data['name']);
		}
		if (isset($data['name']) && !empty($data['name'])) {
			$data['name'] = PHP_Secure($data['name']);
		}
		if (empty($data)) {
			return false;
		}
		$allowed           = 'jpg,png,jpeg,gif,mp4,mov,webm,mpeg,3gp,mkv,mk3d,mks';
		if (!empty($data['allowed'])) {
			$allowed  = $data['allowed'];
		}
		$new_string        = pathinfo($data['name'], PATHINFO_FILENAME) . '.' . strtolower(pathinfo($data['name'], PATHINFO_EXTENSION));
		$extension_allowed = explode(',', $allowed);
		$file_extension    = pathinfo($new_string, PATHINFO_EXTENSION);
		if (!in_array($file_extension, $extension_allowed)) {
			return array(
				'error' => 'File format not supported'
			);
		}
		if ($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png' || $file_extension == 'gif') {
			$folder   = 'photos';
			$fileType = 'image';
		} else {
			$folder   = 'videos';
			$fileType = 'video';
		}
		if (empty($folder) || empty($fileType)) {
			return false;
		}
		$ar = array(
			'video/mp4',
			'video/mov',
			'video/3gp',
			'video/3gpp',
			'video/mpeg',
			'video/flv',
			'video/avi',
			'video/webm',
			'audio/wav',
			'audio/mpeg',
			'video/quicktime',
			'audio/mp3',
			'image/png',
			'image/jpeg',
			'image/gif',
			'video/x-msvideo',
			'video/msvideo',
			'video/x-ms-wmv',
			'video/x-flv',
			'video/x-matroska',
			'video/webm'
		);

		if (!in_array($data['type'], $ar)) {
			return array(
				'error' => 'File format not supported'
			);
		}
		$dir         = "upload/{$folder}/" . date('Y') . '/' . date('m');
		$filename    = $dir . '/' . PHP_GetKey() . '_' . date('d') . '_' . sha1(time()) . "_{$fileType}.{$file_extension}";
		$second_file = pathinfo($filename, PATHINFO_EXTENSION);
		if (move_uploaded_file($data['file'], $filename)) {
			if ($second_file == 'jpg' || $second_file == 'jpeg' || $second_file == 'png' || $second_file == 'gif') {
				if ($type == 1) {
					F_CompressImage($filename, $filename, 50);
					$explode2  = end(explode('.', $filename));
					$explode3  = explode('.', $filename);
					$last_file = $explode3[0] . '_small.' . $explode2;
					F_Resize_Crop_Image(400, 400, $filename, $last_file, 60);
				}else {
					if ($second_file != 'gif') {
						if (!empty($data['crop'])) {
							$crop_image = F_Resize_Crop_Image($data['crop']['width'], $data['crop']['height'], $filename, $filename, 60);
						}
						F_CompressImage($filename, $filename, 90);
					}
				}
			} else{
				 
			}
 
			return $filename;
		}
	}
//--
	function F_UploadLogo($data = array()) {
		if (isset($data['file']) && !empty($data['file'])) {
			$data['file'] = PHP_Secure($data['file']);
		}
		if (isset($data['name']) && !empty($data['name'])) {
			$data['name'] = PHP_Secure($data['name']);
		}
		if (isset($data['name']) && !empty($data['name'])) {
			$data['name'] = PHP_Secure($data['name']);
		}
		if (empty($data)) {
			return false;
		}
		$allowed           = 'png';
		$new_string        = pathinfo($data['name'], PATHINFO_FILENAME) . '.' . strtolower(pathinfo($data['name'], PATHINFO_EXTENSION));
		$extension_allowed = explode(',', $allowed);
		$file_extension    = pathinfo($new_string, PATHINFO_EXTENSION);
		if (!in_array($file_extension, $extension_allowed)) {
			return false;
		}
		$logo_name = empty($data['logo_name'])?'image_name_error':$data['logo_name'];
		 
		$dir      = "themes/default/img/";
		$filename = $dir . "$logo_name.png";
		if (move_uploaded_file($data['file'], $filename)) {
			return true;
		}
	}
