<?php

// This is part of the MCLD SlideGen project
// See https://github.com/MCLD/SlideGen for details


date_default_timezone_set("America/Phoenix");

// Set up variables for the event's title, date, branch, and the colour of the bar.

$title = $_POST['title'];
$date = $_POST['date'];
$branch = $_POST['branch'];
$bar = $_POST['bar'];
$tstamp = date("Ymd-His");

if($branch == 'Anderson Branch Library'):
	$bname = 'an';
	elseif ($branch == 'Encanto Branch Library'):
	$bname = 'en';
	elseif ($branch == 'Fairpoint Branch Library'):
	$bname = 'fa';
	elseif ($branch == 'Freemont Branch Library'):
	$bname = 'fr';
	elseif ($branch == 'Garfield Branch Library'):
	$bname = 'ga';
	elseif ($branch == 'Godot Branch Library'):
	$bname = 'go';
	elseif ($branch == 'Great Lake Branch Library'):
	$bname = 'gr';
	elseif ($branch == 'Henderson Branch Library'):
	$bname = 'he';
	elseif ($branch == 'Lincoln Branch Library'):
	$bname = 'li';
	elseif ($branch == 'Nirian Branch Library'):
	$bname = 'ni';
	elseif ($branch == 'North Town Branch Library'):
	$bname = 'nt';
	elseif ($branch == 'Patagonia Branch Library'):
	$bname = 'pa';
	elseif ($branch == 'Quinn Branch Library'):
	$bname = 'qu';
	elseif ($branch == 'Randall Branch Library'):
	$bname = 'ra';
	elseif ($branch == 'South Town Branch Library'):
	$bname = 'so';
	elseif ($branch == 'Susan Branch Library'):
	$bname = 'su';
	else:
	$bname = 'wt';
endif;

$slidename = "slide-{$bname}-{$tstamp}.png";


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

// Create slide using ImageMagick

exec("convert -background none -fill white -font \"FreeSerif\" -size 318x70 -gravity West caption:\"".$title."\" eventtitle.png");

exec("convert -background none -fill white -font \"FreeSans\" -size 300x23 -gravity East caption:\"".$date."\" eventdate.png");

exec("convert -background none -fill white -font \"FreeSans\" -size 289x23 -gravity East caption:\"".$branch."\" eventbranch.png");

exec("convert -size 740x250 xc:#a4343a -page +0+0 headercrop.jpg -page +0+175 $bar.png -page +632+175 logo.png -page +15+176 eventtitle.png -page +320+191 eventdate.png -page +330+212 eventbranch.png -layers flatten $slidename");

unlink('resized.jpg');

echo $slidename;

?>

<br>
<img src="<?=$slidename?>">
