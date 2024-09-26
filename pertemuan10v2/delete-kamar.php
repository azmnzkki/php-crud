<?php

require 'koneksi.php';

$id = $_GET["id"];

if (deleteTable($id, "kamar") > 0) {
    echo
    "<script>
    alert('Data Berhasil Di hapus')
    document.location.href = 'index.php'
    </script>";
} else echo
"<script>
alert('Data Gagal Di hapus')
document.location.href = 'index.php'
</script>";
