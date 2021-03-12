
<table border='1' align='center' width='400' class="scroll">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">nik</th>
                                        <th style="text-align: center">Nama Guru</th>
                                        <th style="text-align: center">Jenis Kelamin</th>
                                        <th style="text-align: center">Tanggal Lahir</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">No Ortu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
									include '../../lib/koneksi.php';
									$no=1; 
                                    $qdatagrid =" SELECT * FROM t_guru ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:center>$ddatagrid[id_nik]</td>
                                             <td style= text-align:left  >$ddatagrid[namag]</td>
                                             <td style= text-align:left  >$ddatagrid[jk]</td>
                                             <td style= text-align:left  >$ddatagrid[tgl_lahir]</td>
                                             <td style= text-align:left  >$ddatagrid[alamat]</td>
                                             <td style= text-align:left  >$ddatagrid[no_hp]</td>              
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>