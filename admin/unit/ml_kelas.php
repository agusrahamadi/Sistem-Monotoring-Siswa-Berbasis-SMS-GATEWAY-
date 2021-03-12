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
		<h5 align="center">DATA KELAS</h5>
		<table  border="1" style="font-size: 8px; border-collapse: collapse; width: 100%;">
			<thead>
			<tr>
			<td align="center">&nbsp;No&nbsp;</td>
			<td align="center"> &nbsp; Nama Kelas &nbsp;</td>
			
			<td align="center"> &nbsp; Jenis Kelas &nbsp;</td>
			
			<td align="center"> &nbsp; Jurusan &nbsp;</td>
			</tr>
			</thead>
		 <?php
		 $no=1;
         $mysqli= mysqli_connect("localhost","root","","db_siswa");
   
          $qupdate =" SELECT 
													t_kelas.kd_kelas, t_kelas.namak, t_kelas.jnsk, 
													 t_jurusan.kd_jurusan, t_jurusan.namajur
													 FROM 
													  t_kelas
														JOIN t_jurusan ON t_kelas.kd_jurusan = t_jurusan.kd_jurusan
														order by t_kelas.namak asc";
        $rupdate = mysqli_query($mysqli, $qupdate);
        while($dupdate = mysqli_fetch_assoc($rupdate)){
       		?>
			<tbody>
<tr>
<td align="center">&nbsp;<?php echo $no ?>&nbsp;</td>
<td style="width:150px;" align="center">&nbsp;<?php echo $dupdate['namak']; ?>&nbsp;</td>
<td style="width:150px;" align="center">&nbsp;<?php echo $dupdate['jnsk']; ?>&nbsp;</td>

<td style="width:150px;" align="center">&nbsp;<?php echo $dupdate['namajur']; ?>&nbsp;</td>
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