
<table border='1' align='center' width='400' class="scroll">
                               <thead>
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">Nama prestasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
									include '../../lib/koneksi.php';
									$no=1; 
                                    $qdatagrid =" SELECT * FROM t_prestasi";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[nama_pres]</td>                
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>