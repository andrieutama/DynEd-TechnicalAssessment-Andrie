<?php
	include 'assets/action/doConnect.php';

	$error="";
	if(!empty($_GET))
	{
		$error=$_GET['error'];
	}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Flatfy Free Flat and Responsive HTML5 Template ">
    <meta name="author" content="">

    <title>Quiz Uploader</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet">
 
    <!-- Custom Google Web Font -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
	
    <!-- Custom CSS -->
    <link href="assets/css/general.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/animate.css" rel="stylesheet">

	<!-- Owl Carousel -->
	<link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">
	
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css"> 
</head>

<body id="home">

	<!-- Preloader -->
	<div id="preloader">
		<div id="status"></div>
	</div>
	
	<!-- NavBar-->
	<nav class="navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php" align="center"><b>Quiz<br/>Uploader</b></a>
			</div>
		</div>
	</nav> 
	
	<!-- Login Siswa / Pak Rodin -->
	<div id="login" class="content-section-b" style="border-top: 0">
		<div class="container containerbody">

			<div class="col-md-6 col-md-offset-3 text-center wrap_title">
				<h3>LOGIN</h3>	
			</div>
			
			<div class="row wow bounceInUp">
				<div class="col-md-4 col-md-offset-4">
				<?php
					if($error!="")
					{
				?>
						<p align="center"><b><?php echo $error;?></b></p>
				<?php
					}
				?>
					<form role="form" action="assets/action/doLogin.php" method="post">
						<div class="form-group">
							<label for="identitas">NIM/NIP</label>
							<div class="input-group">
								<input type="text" class="form-control" name="identitas" id="identitas" required>
								<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
							</div>

							<label for="kode">Kode Unik</label>
							<div class="input-group">
								<input type="password" class="form-control" name="kode" id="kode" required>
								<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
							</div>
						</div>
						<input type="submit" name="submit" id="submit" value="Login" class="btn wow tada btn-embossed btn-primary pull-right">
					</form>
				</div>
			</div>

		</div>
	</div>

    <!-- JavaScript -->
    <script src="assets/js/jquery-1.12.3.js"></script>
    <script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/script.js"></script>

	<!-- Owl Carousel -->
	<script src="assets/js/owl.carousel.js"></script>

	<!-- Smoothscroll -->
	<script type="text/javascript" src="assets/js/jquery.corner.js"></script> 
	<script src="assets/js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<script src="assets/js/classie.js"></script>

	<!-- Magnific Popup core JS file -->
	<script src="assets/js/jquery.magnific-popup.js"></script>

	<!-- Modernizr --> 
	<script src="assets/js/modernizr-2.6.2.min.js"></script>   
</body>

</html>
