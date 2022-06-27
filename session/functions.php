<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "poli");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	};
	return $rows;
};

function registrasi($data) {
	global $conn;

	$username = mysqli_real_escape_string($conn, $data["username"]);
	$password_sebelum = mysqli_real_escape_string($conn, $data["password"]);
	$nama = mysqli_real_escape_string($conn, $data["nama"]);
	$jenis_kelamin = mysqli_real_escape_string($conn, $data["jenis_kelamin"]);
	$umur = mysqli_real_escape_string($conn, $data["umur"]);
	$jawatan = mysqli_real_escape_string($conn, $data["jawatan"]);

	// cek username admin sudah ada atau belum

	$cekusernameadmin = "SELECT * FROM super_user where username='$username'";
	$prosescek= mysqli_query($conn, $cekusernameadmin);

	if (mysqli_num_rows($prosescek)>0) { 
	    echo "<script>alert('username Sudah Pernah Digunakan!');history.go(-1) </script>";
	    exit;
	}

	// cek username user sudah ada atau belum

	$cekusernameuser = "SELECT * FROM pasien where username='$username'";
	$prosescek= mysqli_query($conn, $cekusernameuser);

	if (mysqli_num_rows($prosescek)>0) { 
	    echo "<script>alert('Username Sudah Pernah Digunakan!');history.go(-1) </script>";
	    exit;
	}

	// enkripsi password
	$password = password_hash($password_sebelum, PASSWORD_DEFAULT);

	// Masukkan Data ke Database
	mysqli_query($conn, "INSERT INTO pasien VALUES('', '$username', '$password', '$nama', '$jenis_kelamin', '$umur', '$jawatan')");
	return mysqli_affected_rows($conn);
}
