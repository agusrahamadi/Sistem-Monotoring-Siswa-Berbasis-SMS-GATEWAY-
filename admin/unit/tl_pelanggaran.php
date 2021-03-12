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
		<h5 align="center">DATA TRANSAKSI PELANGGARAN</h5>
		<table  border="1" style="font-size: 8px; border-collapse: collapse; width: 100%;">
			<thead>
			<tr>
			<td align="center">&nbsp;No&nbsp;</td>
			<td align="center"> &nbsp; NISN &nbsp;</td>
			<td align="center"> &nbsp; Nama Siswa &nbsp;</td>
			<td align="center"> &nbsp; Pelanggaran &nbsp;</td>
			<td align="center"> &nbsp; Point &nbsp;</td>
			<td align="center"> &nbsp; Tanggal &nbsp;</td>
			<td align="center"> &nbsp; Keterangan &nbsp;</td>
			</tr>
			</thead>
		 <?php
		 $no=1;
         $mysqli= mysqli_connect("localhost","root","","db_siswa");
   
        $qupdate = " SELECT 
							t_prspel.kd_prspel, t_prspel.kd_pel, t_prspel.id_nis, t_prspel.tgl_prspel,t_prspel.ket,
                            t_pelanggaran.kd_pel, t_pelanggaran.nama_pel, t_pelanggaran.poin,
							t_siswa.id_nis, t_siswa.namas
                            FROM 
                                t_prspel
                                    JOIN t_siswa ON t_prspel.id_nis = t_siswa.id_nis
									JOIN t_pelanggaran ON t_prspel.kd_pel = t_pelanggaran.kd_pel";
        $rupdate = mysqli_query($mysqli, $qupdate);
        while($dupdate = mysqli_fetch_assoc($rupdate)){
       		?>
			<tbody>
<tr>
<td align="center">&nbsp;<?php echo $no ?>&nbsp;</td>
<td style="width:50px;" align="center">&nbsp;<?php echo $dupdate['id_nis']; ?>&nbsp;</td>
<td style="width:80px;" align="center">&nbsp;<?php echo $dupdate['namas']; ?>&nbsp;</td>
<td style="width:50px;" align="center">&nbsp;<?php echo $dupdate['nama_pel']; ?>&nbsp;</td>
<td style="width:50px;" align="center">&nbsp;<?php echo $dupdate['poin']; ?>&nbsp;</td>
<td style="width:50px;" align="center">&nbsp;<?php echo $dupdate['tgl_prspel']; ?>&nbsp;</td>
<td style="width:150px;" align="center">&nbsp;<?php echo $dupdate['ket']; ?>&nbsp;</td>
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