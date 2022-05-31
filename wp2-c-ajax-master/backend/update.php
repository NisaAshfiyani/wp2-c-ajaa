<?php
require_once '../koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);

$sql = "update surat_masuk set " .
       "  nama_pengirim='" . $data->nama_pengirim . "'," .
       "  asal_surat='" . $data->asal_surat . "' " .
       "  isi='" . $data->isi . "'," .
       "  tgl_surat='" . $data->tgl_surat . "' " .
       
       "  keterangan='" . $data->keterangan . "' " .
       "where no_surat='" . $data->no_surat . "'";
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