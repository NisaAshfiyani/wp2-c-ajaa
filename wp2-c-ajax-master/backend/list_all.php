<?php
require_once '../koneksi.php';

$sql = "select * from mahasiswa";
$result = pg_query($sql);
echo json_encode(pg_fetch_all($result));
?>