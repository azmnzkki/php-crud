<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "blog_school";


$connect = mysqli_connect($server, $user, $password, $database);

if (!$connect) {
    echo "connected failde";
    mysqli_connect_error();
}

function getData($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function showDataReservations($id)
{
    global $connect;
    $query = "SELECT * FROM reservations WHERE id = $id";
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function insertDataReservations($data)
{
    global $connect;
    $nama_tamu = $data["nama_tamu"];
    $nomor_kamar = $data["nomor_kamar"];
    $tanggal_reservasi = $data["tanggal_reservasi"];
    $status = $data["status"];

    $query = "INSERT INTO `reservations` VALUES ('', '$nama_tamu', '$nomor_kamar', '$tanggal_reservasi', '$status')";
    mysqli_query($connect, $query);

    if (mysqli_affected_rows($connect) > 0) {
        echo
        "<script>
        alert('complete input data')
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "failed input data";
    }
}

function deleteReservations($id)
{
    global $connect;
    $query = "DELETE FROM reservations WHERE id = $id";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

function edit($data, $id)
{

    global $connect;
    $nama_tamu = $data["nama_tamu"];
    $nomor_kamar = $data["nomor_kamar"];
    $tanggal_reservasi = $data["tanggal_reservasi"];
    $status = $data["status"];

    $query = "UPDATE reservations SET
    nama_tamu = '$nama_tamu',
    nomor_kamar = '$nomor_kamar',
    tanggal_reservasi = '$tanggal_reservasi',
    status = '$status'
    WHERE id = $id";

    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
