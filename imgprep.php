<?php

// This is part of the MCLD SlideGen project
// See https://github.com/MCLD/SlideGen for details

// File upload

if(isset($_FILES['image'])){
		$errors= array();
		$file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

		$expensions= array("jpeg","jpg","png");
		if(in_array($file_ext,$expensions)=== false){
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
		if($file_size > 2097152){
		$errors[]='File size must be less than 2 MB';
		}
		if(empty($errors)==true){
			move_uploaded_file($file_tmp,"images/".$file_name);
			echo "Slide created:";
		}else{
			print_r($errors);
		}
	}

exec("convert images/$file_name -resize 780x2000 resized.jpg");

header("Location:crop.php");

exit;
?>
