
<table border='1' align='center' width='400' class="scroll">
<thead>
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">NISN</th>
                                        <th style="text-align: center">Nama prestasi</th>
                                        <th style="text-align: center">Prestasi</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
									include '../../lib/koneksi.php';
                                    $qdatagrid =" SELECT 
							t_prspretas.kd_prspretas, t_prspretas.kd_pres, t_prspretas.id_nis, t_prspretas.tgl_prspretas,t_prspretas.ket,
                            t_prestasi.kd_pres, t_prestasi.nama_pres,
							t_siswa.id_nis, t_siswa.namas
                            FROM 
                                t_prspretas
                                    JOIN t_siswa ON t_prspretas.id_nis = t_siswa.id_nis
									JOIN t_prestasi ON t_prspretas.kd_pres = t_prestasi.kd_pres";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:left  >$no</td>
                                             <td style= text-align:left  >$ddatagrid[id_nis]</td>
                                             <td style= text-align:left  >$ddatagrid[namas]</td>
                                             <td style= text-align:left  >$ddatagrid[nama_pres]</td>
                                             <td style= text-align:left  >$ddatagrid[tgl_prspretas]</td>
                                             <td style= text-align:left  >$ddatagrid[ket]</td>
                                                          
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>