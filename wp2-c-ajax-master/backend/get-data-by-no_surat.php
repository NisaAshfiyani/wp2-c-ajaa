<?php
require_once '../koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);

$sql = "select * from surat_masuk where no_surat='" . $data->no_surat . "'";
$result = pg_query($sql);

echo json_encode(pg_fetch_object($result));
?>