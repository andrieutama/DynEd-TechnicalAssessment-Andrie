<?php
	session_start();
	include 'assets/action/doConnect.php';

	if(empty($_SESSION['nama']))
	{
		header("Location:index.php?error=Silahkan Login Untuk Mengakses Halaman Lain!!");
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
				<a class="navbar-brand" href="home.php" align="center"><b>Quiz<br/>Uploader</b></a>
			</div>

			<div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="menuItem"><a href="assets/action/doLogout.php">Keluar</a></li>
				</ul>
			</div>

		</div>
	</nav> 
	
	<!-- Home -->
	<div id="home" class="content-section-b" style="border-top: 0">
		<div class="container containerbody">

			<div class="col-md-6 col-md-offset-3 text-center wrap_title">
				<h3>Quiz Report</h3>
				<h5><u>Refresh Halaman Untuk Melihat Perubahan Apabila Ada Data Masuk</u></h5>
			</div>

			<div class="col-md-8 col-md-offset-2">
				<div class="panel-group" id="accordiondropbox">
						<div class="panel panel-default">
							<div class="panel-heading">							
 								<h4 class="panel-title" align="center">
 									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionilaiquiz" href="#nilaiquiz" aria-expanded="true">Data Nilai Quiz Seluruh Siswa</a>
    							</h4>		
							</div>

							<!-- accordion untuk melihat seluruh data nilai siswa pak rodin -->
							<div id="nilaiquiz" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="table-responsive" align="center">
										<table class="table table-bordered table-hover">
											<tr>
	    										<th><b>NO</b></th>
	    										<th><b>NAMA SISWA</b></th>
	    										<th><b>SOAL BENAR</b></th>
	    										<th><b>SOAL SALAH</b></th>
	    										<th><b>NILAI</b></th>
	    									</tr>
											<?php
												$no=1;
												//query untuk mengambil data nilai siswa dari database
												$query=mysql_query("select * from Siswa");
	    										while($hasil=mysql_fetch_array($query))
												{
											?>   					
	 										<tr>
	    											<td><?php echo $no;?></td>
	    											<td><?php echo $hasil['NamaSiswa'];?></td>
	    											<td><?php echo $hasil['Benar'];?></td>
	    											<td><?php echo $hasil['Salah'];?></td>
	    											<td><?php echo $hasil['Nilai'];?></td>
	    									</tr>	
	    									<?php
	    											$no++;
												}
											?>
										</table>
									</div>
								</div><!-- End Panel Body -->
							</div>
						</div>
					</div><!-- End Accordion -->
			</div>
			
			<div class="col-md-6 col-md-offset-3 text-center">
				<?php
					//query untuk menghitung jumlah siswa yang sudah mengirim jawaban
					$query=mysql_query("select * from siswa where StatusUjian like 'Sudah'");
					$rows=mysql_num_rows($query);
					echo "<h4>Jumlah Siswa Yang Sudah Mengikuti Quiz : ".$rows." Orang</h4>";
				?>
			</div>

			<div class="col-md-6 col-md-offset-3 text-center">
				<?php
					//query untuk mencari nilai rata-rata, rata-rata jawaban yang benar, dan standar deviasi nilai
					$query2=mysql_query("select ROUND(AVG(Nilai)) as rataratanilai, ROUND(AVG(Benar)) as rataratabenar, ROUND(STDDEV(Nilai)) as deviasi from siswa where StatusUjian like 'Sudah'");
					$hasil=mysql_fetch_array($query2);
					echo "<h4>Nilai Rata-Rata Quiz : ".$hasil['rataratanilai']."</h4>";
					echo "<h4>Nilai Rata-Rata Jawaban Benar : ".$hasil['rataratabenar']."</h4>";
					echo "<h4>Standar Deviasi Nilai : ".$hasil['deviasi']."</h4>";
				?>
			</div>

			<div class="col-md-6 text-center">
				<?php
					//query untuk mencari nilai tertinggi
					$query3=mysql_query("select MAX(Nilai) as nilaimax from Siswa where StatusUjian like 'Sudah'");
					$hasil2=mysql_fetch_array($query3);
					$max=$hasil2['nilaimax']; //nilai tertinggi disimpan untuk mencari siswa yang mendapatkan nilai tertinggi
					echo "<h4>Siswa Dengan Nilai Tertinggi : ".$max."</h4><br/>";
					//query untuk mencari siapa saja siswa yang mendapatkan nilai tertinggi
					$query4=mysql_query("select * from Siswa where Nilai='$max'");
					while($hasil3=mysql_fetch_array($query4))
					{
						echo $hasil3['NamaSiswa']."<br/>";
					}
				?>
			</div>

			<div class="col-md-6 text-center">
				<?php
					//query untuk mencari nilai terendah
					$query5=mysql_query("select MIN(Nilai) as nilaimin from Siswa where StatusUjian like 'Sudah'");
					$hasil4=mysql_fetch_array($query5);
					$min=$hasil4['nilaimin']; //nilai terendah disimpan untuk mencari siswa yang mendapatkan nilai tertinggi
					echo "<h4>Siswa Dengan Nilai Terendah : ".$min."</h4><br/>";
					//query untuk mencari siapa saja siswa yang mendapatkan nilai terendah
					$query6=mysql_query("select * from Siswa where Nilai='$min'");
					while($hasil5=mysql_fetch_array($query6))
					{
						echo $hasil5['NamaSiswa']."<br/>";
					}
				?>
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
