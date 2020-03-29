<?php
	header("Content-Type:application/json");

	$servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbname = "bukalapak";

    $conn = new mysqli($servername, $username, $password, $dbname);

	$smethod = $_SERVER['REQUEST_METHOD'];

	$result = array();

	if($smethod == 'POST'){
		$nama_lengkap = $_POST['nama_lengkap'];
		$alamat = $_POST['alamat'];
		$no_hp = $_POST['no_hp'];
		$email = $_POST['email'];

		$sql = "INSERT INTO customers (
					nama_lengkap,
					alamat,
					no_hp,
					email)
				VALUES (
					'$nama_lengkap',
					'$alamat',
					'$no_hp',
					'$email')";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data inserted";
		$result['result'] = array(
			"nama_lengkap"=>$nama_lengkap,
			"alamat"=>$alamat,
			"no_hp"=>$no_hp,
			"email"=>$email
		);

	}else{
		$result['status']['code'] = 400;
	}

	// parse ke format json
	echo json_encode($result);
?>