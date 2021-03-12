<?php
error_reporting(E_ALL^(E_NOTICE | E_WARNING));
$unit = $_GET['unit'];
if($unit == "dashboard") {
    require_once 'unit/dashboard.php';
}
else if($unit == "m_siswa") {   
    require_once 'unit/m_siswa.php';
}
else if($unit == "m_guru") {   
    require_once 'unit/m_guru.php';
}
else if($unit == "m_jurusan") {   
    require_once 'unit/m_jurusan.php';
}
else if($unit == "m_kelas") {   
    require_once 'unit/m_kelas.php';
}
else if($unit == "m_prestasi") {   
    require_once 'unit/m_prestasi.php';
}
else if($unit == "m_presensi") {   
    require_once 'unit/m_presensi.php';
}
else if($unit == "m_pelanggaran") {   
    require_once 'unit/m_pelanggaran.php';
}
else if($unit == "ml_siswa") {   
    require_once 'unit/ml_siswa.php';
}
else if($unit == "ml_guru") {   
    require_once 'unit/ml_guru.php';
}
else if($unit == "ml_jurusan") {   
    require_once 'unit/ml_jurusan.php';
}
else if($unit == "ml_kelas") {   
    require_once 'unit/ml_kelas.php';
}
else if($unit == "ml_prestasi") {   
    require_once 'unit/ml_prestasi.php';
}
else if($unit == "ml_presensi") {   
    require_once 'unit/ml_presensi.php';
}
else if($unit == "ml_pelanggaran") {   
    require_once 'unit/ml_pelanggaran.php';
}
else if($unit == "mxp_presensi") {   
    require_once 'unit/mxp_presensi.php';
}
else if($unit == "t_kelas") {   
    require_once 'unit/t_kelas.php';
}
else if($unit == "t_prestasi") {   
    require_once 'unit/t_prestasi.php';
}
else if($unit == "t_presensi") {   
    require_once 'unit/t_presensi.php';
}
else if($unit == "t_pelanggaran") {   
    require_once 'unit/t_pelanggaran.php';
}
else if($unit == "s_psnmsk") {   
    require_once 'unit/s_psnmsk.php';
}
else if($unit == "tl_kelas") {   
    require_once 'unit/tl_kelas.php';
}
else if($unit == "tl_prestasi") {   
    require_once 'unit/tl_prestasi.php';
}
else if($unit == "tl_presensi") {   
    require_once 'unit/tl_presensi.php';
}
else if($unit == "tl_pelanggaran") {   
    require_once 'unit/tl_pelanggaran.php';
}
else if($unit == "s_psnmsk") {   
    require_once 'unit/s_psnmsk.php';
}
else if($unit == "s_psnklr") {   
    require_once 'unit/s_psnklr.php';
}
else if($unit == "a.php") {   
    require_once 'unit/a.php';
}
else if($unit == "sl_psnkeluar") {   
    require_once 'unit/sl_psnkeluar.php';
}
else if($unit == "sl_psnmasuk") {   
    require_once 'unit/sl_psnmasuk.php';
}
else if($unit == "gantisandi") {   
    require_once 'unit/gantisandi.php';
}


