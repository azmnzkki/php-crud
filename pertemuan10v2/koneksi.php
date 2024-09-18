<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "blog_school";



$connect = mysqli_connect($server, $user, $password, $database);

if (!$connect) {
    echo "Connected Failed!", mysqli_connect_error();
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

function showDataKamar($id)
{
    global $connect;
    $query = "SELECT * FROM kamar WHERE id = $id";
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] =  $row;
    }
    return $rows;
}

function InsertDataKamar($data)
{
    global $connect;
    $nomorkamar = $data["nomor_kamar"];
    $tipekamar = $data["tipe_kamar"];
    $harga = $data["harga_per_malam"];

    $query = "INSERT INTO `kamar` VALUES ('', '$nomorkamar', '$tipekamar', '$harga')";
    mysqli_query($connect, $query);

    if (mysqli_affected_rows($connect) > 0) {
        echo "<script>alert('Complete Input Data!')
        document.location.href = 'index.php'</script>";
    } else {
        echo "Failed Input Data";
    }
}


function deleteKamar($id)
{
    global $connect;
    $query = "DELETE FROM kamar WHERE id = $id";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}


function edit($data, $id)
{

    global $connect;

    // var_dump($data);

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
