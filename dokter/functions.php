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
     
    $id = $data["id"];
    $hasil_diagnosa = $data["hasil_diagnosa"];
    

    $query = "UPDATE keluhan SET 
                hasil_diagnosa = '$hasil_diagnosa'
              WHERE id = '$id'
            ";
            
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
