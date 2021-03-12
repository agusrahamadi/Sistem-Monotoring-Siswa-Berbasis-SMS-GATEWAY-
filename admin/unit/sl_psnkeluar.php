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
		<h5 align="center">DATA SMS KELUAR</h5>
		<table  border="1" style="font-size: 8px; border-collapse: collapse; width: 100%;">
			<thead>
			<tr>
			<td align="center">&nbsp;No&nbsp;</td>
			<td align="center"> &nbsp; No Pengirim &nbsp;</td>
			<td align="center"> &nbsp; Waktu &nbsp;</td>
			<td align="center"> &nbsp; Pesan &nbsp;</td>
			<td align="center"> &nbsp; Status &nbsp;</td>
			</tr>
			</thead>
		 <?php
		 $no=1;
         $mysqli= mysqli_connect("localhost","root","","db_siswa");
   
        $qupdate = "SELECT * FROM sentitems ORDER BY SendingDateTime DESC ";
        $rupdate = mysqli_query($mysqli, $qupdate);
        while($dupdate = mysqli_fetch_assoc($rupdate)){
			 $st="";
                            if($dupdate['Status']=='SendingError')
                            {
                                    $st='<span >Tidak Terkirim</span>';
                            }
                            else if ($dupdate['Status']=='SendingOKNoReport')
                            {
                                    $st= '<span >Terkirim</span>';
                            }
							
       		?>
			
			<tbody>
<tr>
<td align="center">&nbsp;<?php echo $no ?>&nbsp;</td>
<td style="width:70px;" align="center">&nbsp;<?php echo $dupdate['DestinationNumber']; ?>&nbsp;</td>
<td style="width:80px;" align="center">&nbsp;<?php echo $dupdate['SendingDateTime']; ?>&nbsp;</td>
<td style="width:250px;" >&nbsp;<?php echo $dupdate['TextDecoded']; ?>&nbsp;</td>
<td style="width:70px;" >&nbsp;<?php echo $st; ?>&nbsp;</td>
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