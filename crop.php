<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$targ_w = 740;
	$targ_h = 175;
	$jpeg_quality = 90;

	$src = 'resized.jpg';
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);

	// header('Content-type: image/jpeg');
	header("Location: eventdata.php");
	imagejpeg($dst_r,null,$jpeg_quality);
	imagejpeg($dst_r, 'headercrop.jpg');
	
		
	
	
	exit;
}

// If not a POST request, display page below:

?>

<html lang="en">
<head>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="css/main.css" type="text/css" />
  <link rel="stylesheet" href="css/demos.css" type="text/css" />
  <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
  
  <script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
      setSelect: [ 0, 0, 740, 175 ],
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script>
<style type="text/css">
  #target {
    background-color: #ccc;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
  }


</style>

</head>
<body>

<div class="container">
<div class="row">
<div class="span12">
<div class="jc-demo-box">

<div class="page-header">

<h1>Crop image &ndash;</h1>
</div>

		<!-- This is the image we're attaching Jcrop to -->
		<img src="resized.jpg" id="cropbox" />

		<!-- This is the form that our event handler fills -->
		<form action="crop.php" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
		</form>


	</div>
	</div>
	</div>
	</div>
	</body>

</html>
