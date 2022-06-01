<?php
require_once '../koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);

$sql = "select * from suratmasuk where no_urut='" . $data->no_urut . "'";
$result = pg_query($sql);

echo json_encode(pg_fetch_object($result));
?>