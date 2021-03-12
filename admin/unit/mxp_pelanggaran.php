<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 $tglsekarang = date("d-m-Y");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=pelanggaran-$tglsekarang.xls");
 
// Tambahkan table
include 'mx_pelanggaran.php';
?>