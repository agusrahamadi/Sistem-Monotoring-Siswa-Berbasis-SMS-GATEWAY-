<!DOCTYPE html>
<?php 
ob_start();
?>
<page>
		<style type="text/css">
		table#barang{
			border: 2px solid darkgrey;
		}
		th{
			border-bottom: 2px solid darkgrey;
		}
		td.table-td{
			border-bottom: 2px solid darkgrey;
			border-right: 0.5px solid darkgrey;
		}
		</style>
		
	<table border="0" align="center" style="font-size: 16px; border-collapse: collapse; width: 100%;">
			<tr>
				<td style="font-size: 14px; width: 90%;" align="center;"><b>SEKOLAH MENENGAH KEJURUAN</b></td>
			
				</tr>
		<tr><td style="font-size: 14px; width: 90%;" align="center;"><b>DARUSSALAM MATAPURA</b></td></tr>
			
			<tr><td style="font-size: 10px; width: 92%;" align="center;">Tanjung Rema, Kec. Matapura,Kab. Banjar, Prov. Kalimantan Selatan, Kode Pos : 70613</td></tr>
		</table>
		<hr>
		<h5 align="center">DATA TRANSAKSI KELAS</h5>
		<table  border="1" style="font-size: 8px; border-collapse: collapse; width: 100%;">
			<thead>
			<tr>
			<td align="center">&nbsp;No&nbsp;</td>
			<td align="center"> &nbsp; NISN &nbsp;</td>
			<td align="center"> &nbsp; Nama Siswa &nbsp;</td>
			<td align="center"> &nbsp; No Ortu &nbsp;</td>
			<td align="center"> &nbsp; Kelas &nbsp;</td>
			<td align="center"> &nbsp; Jurusan &nbsp;</td>
			<td align="center"> &nbsp; Wali Kelas &nbsp;</td>
			</tr>
			</thead>
		 <?php
		 $no=1;
         $mysqli= mysqli_connect("localhost","root","","db_siswa");
   
        $qupdate = " SELECT 
							t_prskls.kd_prskls, t_prskls.kd_kelas, t_prskls.id_nis, t_prskls.kd_jurusan,t_prskls.id_nik,
                            t_kelas.kd_kelas, t_kelas.namak, t_kelas.jnsk, 
							t_siswa.id_nis, t_siswa.namas, t_siswa.no_ortu,
							t_jurusan.kd_jurusan, t_jurusan.namajur,
							t_guru.id_nik, t_guru.namag 
                            FROM 
                                t_prskls
                                    JOIN t_siswa ON t_prskls.id_nis = t_siswa.id_nis
									JOIN t_kelas ON t_prskls.kd_kelas = t_kelas.kd_kelas
                                    JOIN t_jurusan ON t_prskls.kd_jurusan = t_jurusan.kd_jurusan
                                    JOIN t_guru ON t_prskls.id_nik = t_guru.id_nik ";
        $rupdate = mysqli_query($mysqli, $qupdate);
        while($dupdate = mysqli_fetch_assoc($rupdate)){
       		?>
			<tbody>
<tr>
<td align="center">&nbsp;<?php echo $no ?>&nbsp;</td>
<td style="width:50px;" align="center">&nbsp;<?php echo $dupdate['id_nis']; ?>&nbsp;</td>
<td style="width:80px;" align="center">&nbsp;<?php echo $dupdate['namas']; ?>&nbsp;</td>
<td style="width:50px;" align="center">&nbsp;<?php echo $dupdate['no_ortu']; ?>&nbsp;</td>
<td style="width:50px;" align="center">&nbsp;<?php echo $dupdate['namak']; ?> <?php echo $dupdate['jnsk'];?> &nbsp;</td>
<td style="width:150px;" align="center">&nbsp;<?php echo $dupdate['namajur']; ?>&nbsp;</td>
<td style="width:60px;" align="center">&nbsp;<?php echo $dupdate['namag']; ?>&nbsp;</td>
</tr>
</tbody>

<?php $no++; } ?>
		</table>
       
		
<p></p>
	


		
		
		<br />
        <p></p>
		<?php
		
        ?>
		
</page>
<?php
    $content = ob_get_clean();

// conversion HTML => PDF
 require_once(dirname(__FILE__).'../../../html2pdf/html2pdf.class.php');
 try
 {
 $html2pdf = new HTML2PDF('P','A5', 'fr', false, 'ISO-8859-15');
 $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
 ob_end_clean();
 $html2pdf->Output();
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>
</html>