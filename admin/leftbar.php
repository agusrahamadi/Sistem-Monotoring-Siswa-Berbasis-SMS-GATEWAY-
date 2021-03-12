<div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
  <ul class="nav nav-list ">
      
    <li class="hover col-sm-2 center" <?php if ($page=='dashboard') {echo $active;}?>>
        <a href="adminmainapp.php?unit=dashboard">
        <span class="menu-text"> Beranda </span>
      </a>

      <b class="arrow"></b>
    </li>

    <!-- kategori -->
    <li  class="hover col-sm-2 "  <?php if ($page=='m_siswa' or $page=='m_guru' or $page=='m_jurusan' or $page=='m_kelas' or $page=='m_prestasi' or $page=='m_presensi' or $page=='m_pelanggaran') {echo $open;}?>>
      <a href="#" class="dropdown-toggle center">
        <span class="menu-text"> Data Master </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
        <li <?php if ($page=='m_siswa' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=m_siswa&act=datagrid"> Data Master Siswa</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='m_guru' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=m_guru&act=datagrid">Data Master Guru</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='m_jurusan' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=m_jurusan&act=datagrid">Data Master Jurusan</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='m_kelas' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=m_kelas&act=datagrid">Data Master Kelas</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='m_prestasi' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=m_prestasi&act=datagrid">Data Master Prestasi</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='m_presensi' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=m_presensi&act=datagrid">Data Master Presensi</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='m_pelanggaran' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=m_pelanggaran&act=datagrid">Data Master Pelanggaran</a>
          <b class="arrow"></b>
        </li>
      </ul>
    </li>

    <!-- subkategori -->
    <li   class="hover col-sm-2" <?php if ($page=='m_kelas' or $page=='m_prestasi' or $page=='m_presensi' or $page=='m_pelanggaran') {echo $open;}?>>
      <a href="#" class="dropdown-toggle center">
        <span class="menu-text"> Data Transaksi </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
        
        <li <?php if ($page=='t_kelas' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=t_kelas&act=datagrid">Data Transaksi Kelas</a>
          <b class="arrow"></b>
        </li>
		
		<li <?php if ($page=='t_presensi' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=t_presensi&act=datagrid">Data Transaksi Presensi</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='t_prestasi' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=t_prestasi&act=datagrid">Data Transaksi Prestasi</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='t_pelanggaran' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=t_pelanggaran&act=datagrid">Data Transaksi Pelanggaran</a>
          <b class="arrow"></b>
        </li>
      </ul>
    </li>

	<li   class="hover col-sm-2" <?php if ($page=='s_psnmsk' or $page=='s_psnklr') {echo $open;}?>>
      <a href="#" class="dropdown-toggle center">
        <span class="menu-text"> SMS </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
        
        <li <?php if ($page=='s_psnmsk' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=s_psnmsk&act=datagrid">Pesan Masuk</a>
          <b class="arrow"></b>
		 </li>
		  <li <?php if ($page=='s_psnklr' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=s_psnklr&act=datagrid">Pesan Keluar</a>
          <b class="arrow"></b>
        </li>
      </ul>
    </li>
    <!-- Brand -->
    <li  class="hover col-sm-2" <?php if ($page=='l_penyakit' or $page=='l_gejala' or $page=='l_dbp') {echo $open;}?>>
      <a href="#" class="dropdown-toggle center">
        <span class="menu-text"> Laporan </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
        <li <?php if ($page=='ml_siswa' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=ml_siswa&act=datagrid"> Data Master Siswa</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='ml_guru' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=ml_guru&act=datagrid">Data Master Guru</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='ml_jurusan' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=ml_jurusan&act=datagrid">Data Master Jurusan</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='ml_kelas' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=ml_kelas&act=datagrid">Data Master Kelas</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='ml_prestasi' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=ml_prestasi&act=datagrid">Data Master Prestasi</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='ml_presensi' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=ml_presensi&act=datagrid">Data Master Presensi</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='ml_pelanggaran' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=ml_pelanggaran&act=datagrid">Data Master Pelanggaran</a>
          <b class="arrow"></b>
        </li>
          <li <?php if ($page=='tl_kelas' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=tl_kelas&act=datagrid">Data Transaksi Kelas</a>
          <b class="arrow"></b>
        </li>
		
		<li <?php if ($page=='tl_presensi' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=tl_presensi&act=datagrid">Data Transaksi Presensi</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='tl_prestasi' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=tl_prestasi&act=datagrid">Data Transaksi Prestasi</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='tl_pelanggaran' && $act1=='datagrid') {echo $active;}?>>
          <a href="adminmainapp.php?unit=tl_pelanggaran&act=datagrid">Data Transaksi Pelanggaran</a>
          <b class="arrow"></b>
        </li>
		<li <?php if ($page=='sl_psnmasuk') {echo $active;}?>>
          <a href="adminmainapp.php?unit=sl_psnmasuk">Pesan Masuk</a>
          <b class="arrow"></b>
		 </li>
		  <li <?php if ($page=='sl_psnkeluar') {echo $active;}?>>
          <a href="adminmainapp.php?unit=sl_psnkeluar">Pesan Keluar</a>
          <b class="arrow"></b>
        </li>
      </ul>
    </li>
	
	
  <li  class="hover col-sm-2" <?php if ($page=='dashboard') {echo $active;}?>>
        <a href="adminmainapp.php?unit=gantisandi&act=datagrid&act=update&userid=1">
        <span class="menu-text"> Ganti Kata Sandi </span>
      </a>

      <b class="arrow"></b>
    </li>
	

   
        <!-- logout -->

  
</div>
