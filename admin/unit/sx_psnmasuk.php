
<table border='1' align='center' width='400' class="scroll">
                                                             <thead>
                                    <tr>
                                        <th style="width:50px; text-align: center">No.</th>
                                        <th style="text-align: center">No Pengirim</th>
                                        <th style="text-align: center">Waktu</th>
                                        <th style="width:500px; text-align: center">Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
									include '../../lib/koneksi.php';
									$no=1; 
                                    $qdatagrid =" SELECT * FROM inbox ORDER BY ReceivingDateTime DESC ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[SenderNumber]</td>
                                             <td style= text-align:left  >$ddatagrid[ReceivingDateTime]</td> 
                                             <td style= text-align:left  >$ddatagrid[TextDecoded]</td>               
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>