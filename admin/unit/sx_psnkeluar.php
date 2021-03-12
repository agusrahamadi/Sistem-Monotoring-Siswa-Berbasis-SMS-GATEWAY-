
<table border='1' align='center' width='400' class="scroll">
                                                               <thead>
                                    <tr>
                                        <th style="width:50px; text-align: center">No.</th>
                                        <th style="text-align: center">No Tujuan</th>
                                        <th style="text-align: center">Waktu</th>
                                        <th style="width:500px; text-align: center">Pesan</th>
                                        <th style="width:500px; text-align: center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
									include '../../lib/koneksi.php';
									$no=1; 
                                    $qdatagrid =" SELECT * FROM sentitems ORDER BY SendingDateTime DESC";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 $st="";
                            if($ddatagrid['Status']=='SendingError')
                            {
                                    $st='<span >Tidak Terkirim</span>';
                            }
                            else if ($ddatagrid['Status']=='SendingOKNoReport')
                            {
                                    $st= '<span >Terkirim</span>';
                            }
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
											  <td style= text-align:left  >$ddatagrid[DestinationNumber]</td>
                                             <td style= text-align:left  >$ddatagrid[SendingDateTime]</td>
                                             <td style= text-align:left  >$ddatagrid[TextDecoded]</td>
                                             <td style= text-align:left  >$st</td>
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>