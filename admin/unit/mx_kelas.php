
<table border='1' align='center' width='400' class="scroll">
                                                                <thead>
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">Kelas</th>
                                        <th style="text-align: center">Jenis Kelas</th>
										
                                        <th style="text-align: center">Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
									
									include '../../lib/koneksi.php';
									$no=1; 
                                     $qdatagrid =" SELECT 
													t_kelas.kd_kelas, t_kelas.namak, t_kelas.jnsk, 
													 t_jurusan.kd_jurusan, t_jurusan.namajur
													 FROM 
													  t_kelas
														JOIN t_jurusan ON t_kelas.kd_jurusan = t_jurusan.kd_jurusan
														order by t_kelas.namak asc";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[namak]</td>
                                             <td style= text-align:left  >$ddatagrid[jnsk]</td> 
                                             <td style= text-align:left  >$ddatagrid[namajur]</td>                 
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>