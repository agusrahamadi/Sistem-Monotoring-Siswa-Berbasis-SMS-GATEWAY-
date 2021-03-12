<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 $tglsekarang = date("d-m-Y");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=t_presensi-$tglsekarang.xls");
 
// Tambahkan table
include 'tx_presensi.php';
?>