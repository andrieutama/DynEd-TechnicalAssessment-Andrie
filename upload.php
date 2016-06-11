<?php
	session_start();
	include 'assets/action/doConnect.php';

	if(empty($_SESSION['nama']))
	{
		header("Location:index.php?error=Silahkan Login Untuk Mengakses Halaman Lain!!");
	}

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
				<a class="navbar-brand" href="upload.php" align="center"><b>Quiz<br/>Uploader</b></a>
			</div>

			<div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="menuItem"><a href="assets/action/doLogout.php">Keluar</a></li>
				</ul>
			</div>
		   
		</div>
	</nav> 
	
	<!-- Kirim Jawaban -->
	<div id="kirimjawaban" class="content-section-b" style="border-top: 0">
		<div class="container containerbody">

			<div class="col-md-6 col-md-offset-3 text-center wrap_title">
				<h3>Masukkan Jawaban</h3>
				<h4>Tidak Boleh Kosong dan HARUS Huruf Kapital</h4>
			</div>
			
			<div class="row wow bounceInUp">
				<div class="col-md-6 col-md-offset-3">
				<?php
					if($error!="")
					{
				?>
						<p align="center"><b><?php echo $error;?></b></p>
				<?php
					}
				?>
					<form role="form" action="assets/action/doUpload.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<div id="jawabansoal"> <!-- kolom mengisi jawaban dapat ditambah dan dikurangi (bisa untuk 24 jawaban) -->
								<div id="jawaban1">
									<label for="jawaban">Jawaban Soal 1</label>
									<div class="input-group">
										<input type="text" class="form-control" name="jawaban[1]" id="jawaban[1]" required>
										<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
									</div>
								</div>
							</div>
							<p align="right"><b><a id="tambah">Tambah Kolom</a> &laquo; &raquo; <a id="hapus">Hapus Kolom</a></b></p> <!-- tombol untuk menambah dan mengurangi kolom -->
						</div>
						<input type="submit" name="submit" id="submit" value="Kirim" class="btn wow tada btn-embossed btn-primary">
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

	<!-- Add Input-->
	<script src="assets/js/jquery-1.12.3.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){ //fungsi untuk menambah dan mengurangi kolom jawaban yang akan dikirim
			var i=2;
			$("#tambah").click(function(){
				if(i>24)
				{
					alert("Maksimal 24 Jawaban.");
					return false;
				}
				var jwb = $(document.createElement('div')).attr("id",'jawaban'+ i);
				jwb.after().html('<label for="jawaban">Jawaban Soal '+i+'</label>'+'<div class="input-group"><input type="text" class="form-control" name="jawaban['+i+']" id="jawaban['+i+']" required /><span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>');
				jwb.appendTo("#jawabansoal");
				i++;
			});
			$("#hapus").click(function(){
				if(i==2)
				{
					alert("Minimal 1 Jawaban");
					return false;
				}
				i--;
				$("#jawaban"+i).remove();
			});
		});
	</script>
</body>

</html>
