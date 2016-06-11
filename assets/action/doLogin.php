<?php
	include 'doConnect.php';
	$identitas=$_POST['identitas'];
	$kode=$_POST['kode'];

	$query="select * from Siswa where Identitas='$identitas' and KodeUnik='$kode'";
	$hasil=mysql_num_rows(mysql_query($query));
	
	if($identitas=="Rodin")
	{
		if($hasil==1)
		{
			$query2="select * from Siswa where Identitas='$identitas' and KodeUnik='$kode'";
			$hasil2=mysql_fetch_array(mysql_query($query2));
			
			session_start();
			$_SESSION['nama']=$hasil2['NamaSiswa'];
			$_SESSION['id']=$hasil2['IDSiswa'];
			
			header("Location:../../home.php");
		}
		else
		{
			header("Location:../../index.php?error=Salah Identitas Atau Kode Unik!!");
		}
	}
	else
	{
		if($hasil==1)
		{
			$query2="select * from Siswa where Identitas='$identitas' and KodeUnik='$kode'";
			$hasil2=mysql_fetch_array(mysql_query($query2));
			
			session_start();
			$_SESSION['nama']=$hasil2['NamaSiswa'];
			$_SESSION['id']=$hasil2['IDSiswa'];
			
			header("Location:../../upload.php");
		}
		else
		{
			header("Location:../../index.php?error=Salah Identitas Atau Kode Unik!!");
		}
	}

?>