<?php
$page  ='sms.php';
$secod = 10;
header("Refresh: $secod; url=$page");
		
//koneksi ke mysql dan db nya
include 'lib/koneksi.php';

// query untuk membaca SMS yang belum diproses
$qdatagrid = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysqli_query($mysqli, $qdatagrid);
while ($data = mysqli_fetch_array($hasil))
{
  // membaca ID SMS
  $id = $data['ID'];
  
  // membaca no pengirim
  $noPengirim = $data['SenderNumber'];
 
  // membaca pesan SMS dan mengubahnya menjadi kapital
  $msg = strtoupper($data['TextDecoded']);
 
  // proses parsing 
 
  // memecah pesan berdasarkan karakter
  $pecah = explode("#", $msg);
  
  // jika kata terdepan dari SMS adalah 'NILAI' maka cari nilai Kalkulus
  if ($pecah[0] == "PEL")
  {
     // baca nis dari pesan SMS
     $id_nis = $pecah[1];
     $namas = $pecah[2];
     $nama_pel = $pecah[3];
     $tgl_prspel = $pecah[4];
     $ket = $pecah[5];
 
     // cari nilai kalkulus berdasar nis
     $query2 = " SELECT 
				   t_prspel.kd_prspel, t_prspel.kd_pel, t_prspel.id_nis, t_prspel.tgl_prspel,t_prspel.ket,
                   t_pelanggaran.kd_pel, t_pelanggaran.nama_pel,
				   t_siswa.id_nis, t_siswa.namas
                FROM 
                 t_prspel
                   JOIN t_siswa ON t_prspel.id_nis = t_siswa.id_nis
				   JOIN t_pelanggaran ON t_prspel.kd_pel = t_pelanggaran.kd_pel
                WHERE t_siswa.id_nis='$id_nis'";
	 $hasil2 = mysqli_query($mysqli, $query2);
 
     // cek bila data nilai tidak ditemukan
     if (mysqli_num_rows($hasil2) == 0) $reply = "Siswa Belum Punya Pelanggaran";
     else
     {
        // bila nilai ditemukan
        $data2 = mysqli_fetch_array($hasil2);
        $id_nis = $data2['id_nis'];
        $namas = $data2['namas'];
        $nama_pel = $data2['nama_pel'];
        $tgl_prspel = $data2['tgl_prspel'];
        $ket = $data2['ket'];
        $reply = "Nis : ".$id_nis. " |  Nama : " .$namas. " | Pelanggaran : " .$nama_pel. " | Tgl Pelanggran : " .$tgl_prspel. " | Ket : " .$ket;
     }
  }elseif ($pecah[0] == "PRE") {
    // baca nis dari pesan SMS
      $id_nis = $pecah[1];
     $namas = $pecah[2];
     $jenis_pre = $pecah[3];
     $tgl_prspresen = $pecah[4];
     $ket = $pecah[5];
 
     // cari nilai kalkulus berdasar nis
     $query2 = "SELECT 
							t_prspresen.kd_prspresen, t_prspresen.kd_pre, t_prspresen.id_nis, t_prspresen.tgl_prspresen,t_prspresen.ket,
                            t_presensi.kd_pre, t_presensi.jenis_pre,
							t_siswa.id_nis, t_siswa.namas
                            FROM 
                                t_prspresen
                                    JOIN t_siswa ON t_prspresen.id_nis = t_siswa.id_nis
									JOIN t_presensi ON t_prspresen.kd_pre = t_presensi.kd_pre
                WHERE t_siswa.id_nis='$id_nis'";
     $hasil2 = mysqli_query($mysqli, $query2);
 
     // cek bila data nilai tidak ditemukan
     if (mysqli_num_rows($hasil2) == 0) $reply = "Siswa Belum Punya Presensi";
     else
     {
        // bila nilai ditemukan
        $data2 = mysqli_fetch_array($hasil2);
        $id_nis = $data2['id_nis'];
        $namas = $data2['namas'];
        $jenis_pre = $data2['jenis_pre'];
        $tgl_prspresen = $data2['tgl_prspresen'];
        $ket = $data2['ket'];
        $reply = "Nis : ".$id_nis. " |  Nama : " .$namas. " | Presensi : " .$jenis_pre. " | Tgl Presensi : " .$tgl_prspresen. " | Ket : " .$ket;
     
  }
  }elseif ($pecah[0] == "PRES") {
    // baca nis dari pesan SMS
      $id_nis = $pecah[1];
     $namas = $pecah[2];
     $nama_pres = $pecah[3];
     $tgl_prspretas = $pecah[4];
     $ket = $pecah[5];
 
     // cari nilai kalkulus berdasar nis
     $query2 = " SELECT 
							t_prspretas.kd_prspretas, t_prspretas.kd_pres, t_prspretas.id_nis, t_prspretas.tgl_prspretas,t_prspretas.ket,
                            t_prestasi.kd_pres, t_prestasi.nama_pres,
							t_siswa.id_nis, t_siswa.namas
                            FROM 
                                t_prspretas
                                    JOIN t_siswa ON t_prspretas.id_nis = t_siswa.id_nis
									JOIN t_prestasi ON t_prspretas.kd_pres = t_prestasi.kd_pres
                WHERE t_siswa.id_nis='$id_nis'";
     $hasil2 = mysqli_query($mysqli, $query2);
 
     // cek bila data nilai tidak ditemukan
     if (mysqli_num_rows($hasil2) == 0) $reply = "Siswa Belum Punya Prestasi";
     else
     {
        // bila nilai ditemukan
        $data2 = mysqli_fetch_array($hasil2);
        $id_nis = $data2['id_nis'];
        $namas = $data2['namas'];
        $nama_pres = $data2['nama_pres'];
        $tgl_prspretas = $data2['tgl_prspretas'];
        $ket = $data2['ket'];
        $reply = "Nis : ".$id_nis. " |  Nama : " .$namas. " | Pretasi : " .$nama_pres. " | Tgl Prestasi : " .$tgl_prspretas. " | Ket : " .$ket;
     
  }
  
  } else $reply = "Maaf Perintah Salah";
 
  // membuat SMS balasan
 
  $query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded) VALUES ('$noPengirim', '$reply')";
  $hasil3 = mysqli_query($mysqli, $query3);
 
  // ubah nilai 'processed' menjadi 'true' untuk setiap SMS yang telah diproses
 
  $query3 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
  $hasil3 = mysqli_query($mysqli, $query3);
}
?>