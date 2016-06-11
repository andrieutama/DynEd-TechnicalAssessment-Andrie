<?php 
	$temp=0; //variabel untuk array dinamis
	$umur = file('usia.txt'); //variabel untuk menampung isi file usia.txt

	echo "<h3>Sukses Sorting Usia, Hasil Dapat Dilihat Di usia_sort.txt</h3><hr>";
	foreach ($umur as $data) //looping untuk menyimpan isi file ke dalam array
	{
		$array[$temp] = $data;
		$temp++; 
	}

	asort($array,1); //sorting isi array, dengan metode numerical

	//pembuatan file baru hasil sorting yaitu usia_urut.txt
	$file = fopen("usia_urut.txt","w");
	foreach ($array as $isi)
	{
		fwrite($file,$isi."\n");
		echo $isi . "<br />\n";
	}
	fclose($file);
?>