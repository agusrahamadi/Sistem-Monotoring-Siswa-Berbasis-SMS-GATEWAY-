
<table border='1' align='center' width='400' class="scroll">
<thead>
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">NISN</th>
                                        <th style="text-align: center">Nama Siswa</th>
                                        <th style="text-align: center">Pelanggaran</th>
                                        <th style="text-align: center">Poin</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Keterangan</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
									include '../../lib/koneksi.php';
                                    $qdatagrid =" SELECT 
							t_prspel.kd_prspel, t_prspel.kd_pel, t_prspel.id_nis, t_prspel.tgl_prspel,t_prspel.ket,
                            t_pelanggaran.kd_pel, t_pelanggaran.nama_pel, t_pelanggaran.poin,
							t_siswa.id_nis, t_siswa.namas
                            FROM 
                                t_prspel
                                    JOIN t_siswa ON t_prspel.id_nis = t_siswa.id_nis
									JOIN t_pelanggaran ON t_prspel.kd_pel = t_pelanggaran.kd_pel";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:left  >$no</td>
                                             <td style= text-align:left  >$ddatagrid[id_nis]</td>
                                             <td style= text-align:left  >$ddatagrid[namas]</td>
                                             <td style= text-align:left  >$ddatagrid[nama_pel]</td>
                                             <td style= text-align:left  >$ddatagrid[poin]</td>
                                             <td style= text-align:left  >$ddatagrid[tgl_prspel]</td>
                                             <td style= text-align:left  >$ddatagrid[ket]</td>
                                                       
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>