
<table border='1' align='center' width='400' class="scroll">
<thead>
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">NISN</th>
                                        <th style="text-align: center">Nama Siswa</th>
                                        <th style="text-align: center">No_ortu</th>
                                        <th style="text-align: center">Kelas</th>
                                        <th style="text-align: center">Jurusan</th>
                                        <th style="text-align: center">Wali Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
									include '../../lib/koneksi.php';
                                    $qdatagrid =" SELECT 
							t_prskls.kd_prskls, t_prskls.kd_kelas, t_prskls.id_nis, t_prskls.kd_jurusan,t_prskls.id_nik,
                            t_kelas.kd_kelas, t_kelas.namak, t_kelas.jnsk, 
							t_siswa.id_nis, t_siswa.namas, t_siswa.no_ortu,
							t_jurusan.kd_jurusan, t_jurusan.namajur,
							t_guru.id_nik, t_guru.namag 
                            FROM 
                                t_prskls
                                    JOIN t_siswa ON t_prskls.id_nis = t_siswa.id_nis
									JOIN t_kelas ON t_prskls.kd_kelas = t_kelas.kd_kelas
                                    JOIN t_jurusan ON t_prskls.kd_jurusan = t_jurusan.kd_jurusan
                                    JOIN t_guru ON t_prskls.id_nik = t_guru.id_nik ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[id_nis]</td>
                                             <td style= text-align:left  >$ddatagrid[namas]</td>
                                             <td style= text-align:left  >$ddatagrid[no_ortu]</td>
                                             <td style= text-align:left  >$ddatagrid[namak]$ddatagrid[jnsk]</td>
                                             <td style= text-align:left  >$ddatagrid[namajur]</td>
                                             <td style= text-align:left  >$ddatagrid[namag]</td>
                                                            
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>