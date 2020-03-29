<?php
	// header harus json
	header("Content-Type:application/json");

	// conf koneksi db
	$servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbname = "bukalapak";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

	// tangkap method request
	$smethod = $_SERVER['REQUEST_METHOD'];

	// inisialisasi variable hasil

	// kondisi metode
	if($smethod == $smethod){
		// tangkap input

		 parse_str(file_get_contents("php://input"),$post_vars);
    	$nama_lengkap = $post_vars['nama_lengkap'];

		// insert data
		$sql = "DELETE FROM customers WHERE nama_lengkap = '$nama_lengkap'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data DELETED";
		$result['result'] = array(
			"nama_lengkap"=>$nama_lengkap,
		);

	}else{
		$result['status']['code'] = 400;
	}

	// parse ke format json
	echo json_encode($result);
?>