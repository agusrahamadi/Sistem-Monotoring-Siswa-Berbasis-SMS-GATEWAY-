<?php
include "lib/koneksi.php";
$id=$_POST['id'];
 $qcombo = "select 
													t_kelas.kd_kelas, t_kelas.kd_jurusan, t_kelas.namak,
													 t_jurusan.kd_jurusan, t_jurusan.namajur
													 FROM 
													  t_kelas
														JOIN t_jurusan ON t_kelas.kd_jurusan = t_jurusan.kd_jurusan 
														where t_kelas.kd_kelas ='".$id."'";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        $row = mysqli_num_rows($rcombo);
                        if ($row > 0)
						{
                        while($data = mysqli_fetch_assoc($rcombo)) {
                            echo " <option value=".$data["kd_jurusan"].">".$data["namajur"]."</option>";

 }
}
?>