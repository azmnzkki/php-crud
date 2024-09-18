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


function showDataGuests($id)
{
    global $connect;
    $query = "SELECT * FROM guests WHERE id = $id";
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insertDataGuests($data)
{
    global $connect;
    $nama_tamu = $data["nama_tamu"];
    $nomor_kamar = $data["nomor_kamar"];
    $tanggal_check_in = $data["tanggal_check_in"];
    $tanggal_check_out = $data["tanggal_check_out"];

    $query = "INSERT INTO `guests` VALUES ('', '$nama_tamu',
    '$nomor_kamar', '$tanggal_check_in', '$tanggal_check_out' )";
    mysqli_query($connect, $query);

    if (mysqli_affected_rows($connect) > 0) {
        echo "<script>alert('Complete Input Data!')
        document.location.href = 'index.php'</script>";
    } else {
        echo "failed input data";
    }


}

function deleteGuests($id)
{
    global $connect;
    $query = "DELETE FROM guests WHERE id = $id";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

function edit($data, $id)
{
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

    mysqli_query($connect,$query);
    return mysqli_affected_rows($connect);
    
    

}
