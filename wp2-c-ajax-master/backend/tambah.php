<?php
require_once '../koneksi.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw);

// echo $data->no_urut;

$sql = "insert into suratmasuk(no_urut, no_surat, nama_pengirim, isi, tgl_surat, keterangan) values
('" .$data->no_urut . "', '" .$data->no_surat . "','" . $data->nama_pengirim . "','" . $data->isi . "','" . $data->tgl_surat . "', '" . $data->keterangan . "')";
$result = pg_query($sql);
$row = pg_affected_rows($result);
$obj = new stdClass();
if($row > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
?>