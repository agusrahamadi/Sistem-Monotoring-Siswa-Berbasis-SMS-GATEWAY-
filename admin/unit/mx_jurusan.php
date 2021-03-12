
<table border='1' align='center' width='400' class="scroll">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">Nama Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
									
									include '../../lib/koneksi.php';
									$no=1; 
                                    $qdatagrid =" SELECT * FROM t_jurusan";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[namajur]</td>              
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>