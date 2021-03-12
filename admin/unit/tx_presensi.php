
<table border='1' align='center' width='400' class="scroll">
<thead>
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">NISN</th>
                                        <th style="text-align: center">Nama Siswa</th>
                                        <th style="text-align: center">Presensi</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Keterangan</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;
									include '../../lib/koneksi.php';
                                    $qdatagrid =" SELECT 
							t_prspresen.kd_prspresen, t_prspresen.kd_pre, t_prspresen.id_nis, t_prspresen.tgl_prspresen,t_prspresen.ket,
                            t_presensi.kd_pre, t_presensi.jenis_pre,
							t_siswa.id_nis, t_siswa.namas
                            FROM 
                                t_prspresen
                                    JOIN t_siswa ON t_prspresen.id_nis = t_siswa.id_nis
									JOIN t_presensi ON t_prspresen.kd_pre = t_presensi.kd_pre";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[id_nis]</td>
                                             <td style= text-align:left  >$ddatagrid[namas]</td>
                                             <td style= text-align:left  >$ddatagrid[jenis_pre]</td>
                                             <td style= text-align:left  >$ddatagrid[tgl_prspresen]</td>
                                             <td style= text-align:left  >$ddatagrid[ket]</td>
                                                           
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>