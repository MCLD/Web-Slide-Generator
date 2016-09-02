<!-- This is part of the MCLD SlideGen project -->
<!-- See https://github.com/MCLD/SlideGen for details -->


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MCLD SlideGen - Event Data</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">

<form action="createslide.php" target="iframe" method="post" enctype="multipart/form-data">
<div>

<h2>SlideGen</h2>

<label>
	<span>Event title:</span> <input type="text" name="title"><br><br>
</label>

<label>
	<span>Event date:</span> <input type="text" name="date"><br><br>
</label>

<label>
	<span>Branch:</span>
	<select name="branch">
	<option value="Anderson Branch Library">Anderson</option>
	<option value="Encanto Branch Library">Encanto</option>
	<option value="Fairpoint Branch Library">Fairpoint</option>
	<option value="Freemont Branch Library">Freemont</option>
	<option value="Garfield Branch Library">Garfield</option>
	<option value="Godot Branch Library">Godot</option>
	<option value="Great Lake Branch Library">Great Lake</option>
	<option value="Henderson Branch Library">Henderson</option>
	<option value="Lincoln Branch Library">Lincoln</option>
	<option value="Nirian Branch Library">Nirian</option>
	<option value="North Town Branch Library">North Town</option>
	<option value="Patagonia Branch Library">Patagonia</option>
	<option value="Quinn Branch Library">Quinn</option>
	<option value="Randall Branch Library">Randall</option>
	<option value="South Town Branch Library">South Town</option>
	<option value="Susan Branch Library">Susan</option>
	<option value="Wildlands Branch Library">Wildlands</option>
	</select>
</label>

<label>
	<span>Bar colour:</span>
	<select name="bar">
	<option value="bluebar">Blue</option>
	<option value="greybar">Grey</option>
	<option value="purplebar">Purple</option>
	<option value="redbar">Red</option>
	</select>
</label>

<script>
function setURL(url){
	document.getElementById('iframe').src = url;
}
</script>
<button type="submit" >Generate Slide</button>
<br><br>
<p style="font-size: 10px;"><a href="index.php">Create a new slide.</a></p>
</div>
</form>

        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<div id="bname"><h1>Your slide will generate here.</h1></div>
                        <iframe name="iframe" width="800" height="400" frameborder="no" border="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</div>


</body>

</html>
