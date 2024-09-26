<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "blog_school";



$connect = mysqli_connect($server, $user, $password, $database);

if (!$connect) {
    echo "Connected Failed!", mysqli_connect_error();
}


function getTable($table)
{
    global $connect;
    $query = "SELECT * FROM $table";
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function showTable($id, $table)
{
    global $connect;
    $query = "SELECT * FROM $table WHERE id = $id";
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] =  $row;
    }
    return $rows;
}

function InsertDataTable($data, $table)
{
    global $connect;

    if ($table === "kamar") {

        $nomorkamar = $data["nomor_kamar"];
        $tipekamar = $data["tipe_kamar"];
        $harga = $data["harga_per_malam"];

        $query = "INSERT INTO `kamar` VALUES ('', '$nomorkamar', '$tipekamar', '$harga')";
        mysqli_query($connect, $query);
    }


    if ($table === "guest") {
        $nama_tamu = $data["nama_tamu"];
        $nomor_kamar = $data["nomor_kamar"];
        $tanggal_check_in = $data["tanggal_check_in"];
        $tanggal_check_out = $data["tanggal_check_out"];

        $query = "INSERT INTO `guests` VALUES ('', '$nama_tamu',
    '$nomor_kamar', '$tanggal_check_in', '$tanggal_check_out' )";
        mysqli_query($connect, $query);
    }

    if ($table === "reservations") {
        $nama_tamu = $data["nama_tamu"];
        $nomor_kamar = $data["nomor_kamar"];
        $tanggal_reservasi = $data["tanggal_reservasi"];
        $status = $data["status"];

        $query = "INSERT INTO `reservations` VALUES ('', '$nama_tamu', '$nomor_kamar', '$tanggal_reservasi', '$status')";
        mysqli_query($connect, $query);
    }

    if (mysqli_affected_rows($connect) > 0) {
        echo "<script>alert('Complete Input Data!')
        document.location.href = 'index.php'</script>";
    } else {
        echo "Failed Input Data";
    }
}


function deleteTable($id, $table)
{
    global $connect;

    if ($table === "kamar") {

        $query = "DELETE FROM kamar WHERE id = $id";
        mysqli_query($connect, $query);
        return mysqli_affected_rows($connect);
    }

    if ($table === "guests") {
        global $connect;
        $query = "DELETE FROM guests WHERE id = $id";
        mysqli_query($connect, $query);
        return mysqli_affected_rows($connect);
    }

    if ($table === "reservations") {
        $query = "DELETE FROM reservations WHERE id = $id";
        mysqli_query($connect, $query);
        return mysqli_affected_rows($connect);
    }
}


function editTable($data, $id, $table)
{

    global $connect;

    // var_dump($data);

    if ($table === "kamar") {

        $nomorkamar = $data["nomor_kamar"];
        $tipekamar = $data["tipe_kamar"];
        $harga = $data["harga_per_malam"];


        $query = "UPDATE kamar SET
        nomor_kamar = '$nomorkamar',
        tipe_kamar = '$tipekamar',
        harga_per_malam = '$harga'
        WHERE id = $id";

        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);
    }

    if ($table === "guests") {
        global $connect;

        $nama_tamu = $data["nama_tamu"];
        $nomor_kamar = $data["nomor_kamar"];
        $tanggal_check_in = $data["tanggal_check_in"];
        $tanggal_check_out = $data["tanggal_check_out"];

        $query = "UPDATE guests SET
        nama_tamu = '$nama_tamu',
        nomor_kamar = '$nomor_kamar',
        tanggal_check_in = '$tanggal_check_in',
        tanggal_check_out = '$tanggal_check_out'
        WHERE id = $id";

        mysqli_query($connect, $query);
        return mysqli_affected_rows($connect);
    }

    if ($table === "reservations") {
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
}
