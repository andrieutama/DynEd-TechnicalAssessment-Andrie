<?php
	session_start();
	include 'doConnect.php';

	$benar=0;
	$salah=0;
	$nilai=0;
	$pengirim=$_SESSION['nama'];

	$flag=1; //flag untuk melakukan looping sampai 24 kali, sesuai banyaknya soal
	for($flag=1;$flag<=24;$flag++)
	{
		if(isset($_POST['jawaban'][$flag]))
		{
			$jawaban[$flag] = $_POST['jawaban'][$flag]; //jawaban disimpan ke dalam array
		}
		else
		{
			break;
		}
	}

	$loop=1;
	//query untuk mengoreksi jawaban siswa sesuai dengan kunci jawaban
	$query=mysql_query("select * from Soal");
	while($hasil=mysql_fetch_array($query))
	{
			
		if($jawaban[$loop] == $hasil['Jawaban']) //jawaban yang benar atau sesuai dengan kunci jawaban akan menambah value dari variabel benar
		{
			$benar++;
		}
		else
		{
			$salah++; //apabila jawaban salah atau tidak sama dengan kunci jawaban maka value salah yang akan bertambah
		}
		$loop++;
	}
	
	$nilai=$benar*100/24; //untuk menghitung nilai, maksimal nilai adalah 100

	$status='Sudah';
	//query untuk merubah Nilai, Benar, dan Salah dari mahasiswa yang mengirimkan jawaban
	$query2="update Siswa set StatusUjian='$status', Benar='$benar', Salah='$salah', Nilai='$nilai' where NamaSiswa='$pengirim'";
	mysql_query($query2);
	
	header("Location:../../upload.php?error=Sukses Mengirim Jawaban!!");
	

?>