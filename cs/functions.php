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

function edit($data) {
    global $conn;
     
    $username = $data["username"];
    $pilihan_poli = $data["pilihan_poli"];
    $keluhan_1 = $data["keluhan_1"];
    

    $query = "UPDATE pasien SET 
                pilihan_poli = '$pilihan_poli',
                keluhan_1 = '$keluhan_1',
              WHERE username = '$username'
            ";
            
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
