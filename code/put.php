<?php
	// header harus json
	header("Content-Type:application/json");

	// conf koneksi db
	$servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbname = "bukalapak";

    $conn = new mysqli($servername, $username, $password, $dbname);

	$smethod = $_SERVER['REQUEST_METHOD'];

	if($smethod == $smethod){

		 parse_str(file_get_contents("php://input"),$post_vars);
		$id_customers = $post_vars['id_customers'];
		$nama_lengkap = $post_vars['nama_lengkap'];
		$alamat = $post_vars['alamat'];
		$no_hp = $post_vars['no_hp'];
		$email = $post_vars['email'];

		$sql = "UPDATE customers SET
					nama_lengkap = '$nama_lengkap',
					alamat = '$alamat',
					no_hp = '$no_hp',
					email = '$email'
				WHERE id_customers = '$id_customers'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "update telah berhasil";
		$result['result'] = array(
			"id_customers"=>$id_customers,
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