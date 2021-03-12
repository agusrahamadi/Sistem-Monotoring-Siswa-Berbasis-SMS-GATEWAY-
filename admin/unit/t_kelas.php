<?php
session_start();
require_once '../lib/koneksi.php';

$act = $_GET['act'];
switch($act){
    case "datagrid":
        ?>
<?php
include("../admin/leftbar.php");
?> 
<div class="main-content">
    <div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="adminmainapp.php?unit=dashboard">Beranda</a>
                </li>
                <li>Data Transaksi</li>
		<li>Data Kelas</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Kelas
                </h1>
            </div>
            <h1>
                    <a href="?unit=t_kelas&act=input">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
                    <a href="?unit=tl_kelas">
                        <button class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
                    </a>
					<a href="unit/txp_kelas.php">
                        <button class="btn btn-sm btn-success"><i class="fa fa-database"></i> Export Excel</button>
                    </a>
                </h1>
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="box box-primary">
                            <div class="box-body table-responsive padding">
                              <table id="datatable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">NISN</th>
                                        <th style="text-align: center">Nama Siswa</th>
                                        <th style="text-align: center">No_ortu</th>
                                        <th style="text-align: center">Kelas</th>
                                        <th style="text-align: center">Jurusan</th>
                                        <th style="text-align: center">Wali Kelas</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
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
                                             <td style= text-align:left  >$ddatagrid[namak]  $ddatagrid[jnsk]</td>
                                             <td style= text-align:left  >$ddatagrid[namajur]</td>
                                             <td style= text-align:left  >$ddatagrid[namag]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=t_kelas&act=update&kd_prskls=$ddatagrid[kd_prskls] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=t_kelas&act=delete&kd_prskls=$ddatagrid[kd_prskls] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
                                             </td>                
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.row -->
                <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<?php
include("../admin/footer.php");
?>
      <!-- DATA TABLES SCRIPT -->
     <script src="../css/backend/js/jquery.dataTables.min.js" type="text/javascript"></script>
      <script src="../css/backend/js/jquery.dataTables.bootstrap.min.js" type="text/javascript"></script>
      <script type="text/javascript">
      function confirmDialog() {
       return confirm('Apakah anda yakin?')
      }
        $('#datatable').dataTable({
          "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "Semua"]]
        });
      </script>
	</body>
</html>
 <?php
        
        break;
    
        case "input":
            ?>

<?php
include("../admin/leftbar.php");
?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Beranda</a>
							</li>
              <li>Data Transaksi</li>
							<li>Tambah Data Kelas</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Kelas</h1></div>
						<div class="row">
							<div class="col-xs-12">
      
				
                  <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="?unit=t_kelas&act=inputact" enctype="multipart/form-data" >    
                      
                       
						 <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">NISN</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-3" type="text" name="id_nis" id="id_nis" required="required"  readonly="" />
								
								<input class="col-xs-10 col-sm-5" type="button" value="Pilih Nis"  name="id_nis" id="id_nis" style="width: 120px; margin-left: 5px; margin-top: 0px; height: 29px; padding-top: 0px;" onclick="window.open('unit/p_nis.php', 'winpopup', 'toolbar=no,statusbar=no,menubar=no,left=500,top=70,resizable=no,scrollbars=yes,width=410,height=610');" />
       
                            </div>
							
                       </div>
					    
					   <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Siswa</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="namas" id="namas" required="required"  readonly=""  />
                            </div>
                       </div>
					    <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">No Ortu</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="no_ortu" id="no_ortu" required="required" readonly="" />
                            </div>
                       </div>
					   <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kd_kelas">Kelas</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_kelas" id="kd_kelas"  required>
                        <option selected="selected">-Pilih Kelas-</option>
                        <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_kelas order by namak asc
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($data = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$data[kd_kelas]>$data[namak] $data[jnsk]</option> 
                            ";
                        }
                        ?>
                    </select>
                       </div>
                       </div>   
					
					   
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kd_jurusan">Jurusan</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_jurusan" id="kd_jurusan"  required>
                        <option selected="selected">-Pilih Jurusan-</option>
                        
                    </select>
                       </div>
                       </div>   
					   
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="id_nik">Wali Kelas</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="id_nik" id="id_nik"  required>
                        <option selected="selected">-Pilih Wali Kelas-</option>
                        <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_guru 
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($data = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$data[id_nik]>$data[namag]</option> 
                            ";
                        }
                        ?>
                    </select>
                       </div>
                       </div>    
				
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=t_kelas&act=datagrid'">kembali</button>
                         </div>
			</div> 
										
										    
                  
                      </form>
             

                   
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
                
			</div><!-- /.main-content -->
		<?php
            include("../admin/footer.php");
            ?>
      
      
 <script  type="text/javascript">
 $(document).ready(function()
{
 <!-- handle event combobox kategori ketika nilainya di ganti -->
 $("#kd_kelas").change(function() {
  <!-- mendapatkan value dari combobox -->
  var a = $(this).val();
  if (a != "")
  {
   <!-- Request data sub kategori berdasarkan idkategori yang dipilih -->
   $.ajax({
    type:"post",
    url:"../getsubkategori.php",
    data:"id="+ a,
    success: function(data){
     $("#kd_jurusan").html(data);
    }
   });
  }
 });
});
 var frmvalidator = new Validator("tambah_kat");
 frmvalidator.addValidation("namak","req","Silakan Masukkan Nama Penyakit");
 frmvalidator.addValidation("namak","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("namak","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("namak","simbol","Hanya Huruf Saja");
 frmvalidator.addValidation("jnsk","req","Silakan Masukkan jnsk");
  frmvalidator.addValidation("tgl_lahir","req","Silakan Masukkan tgl_lahir");
   frmvalidator.addValidation("alamat","req","Silakan Masukkan alamat");
</script>    
	</body>
</html>
<?php
        break;
    
        case "inputact":
			 $id_nis = $_POST['id_nis'];
      		 $id_nik = $_POST['id_nik'];
      		 $kd_kelas = $_POST['kd_kelas'];
      		 $kd_jurusan = $_POST['kd_jurusan'];
             $qinput = "
          INSERT INTO t_prskls
          (id_nis, id_nik, kd_kelas, kd_jurusan)
          VALUES
          ('$id_nis', '$id_nik', '$kd_kelas', '$kd_jurusan')
        ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_prskls WHERE id_nis = '$id_nis'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nis $id_nis Sudah Ada kelas');
              document.location='adminmainapp.php?unit=t_kelas&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=t_kelas&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_prskls = $_GET['kd_prskls'];
        $qupdate = "SELECT 
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
                                    JOIN t_guru ON t_prskls.id_nik = t_guru.id_nik
									WHERE t_prskls. kd_prskls = '$kd_prskls'";
        $rupdate = mysqli_query($mysqli, $qupdate);
        $dupdate = mysqli_fetch_assoc($rupdate);
            ?>
            
 <?php
include("../admin/leftbar.php");
?>       

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Beranda</a>
							</li>
              <li>Data Transaksi</li>
							<li>Edit Data Kelas</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Kelas</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                    
              <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="adminmainapp.php?unit=t_kelas&act=updateact">    
                       
						 <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="id_nis">NISN</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="id_nis" id="id_nis"  required>
                         <option value=""></option>
                       <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_siswa
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['id_nis'] == $dupdate['id_nis']) {
                                echo "
                                <option value=$dcombo[id_nis] selected=selected>$dcombo[id_nis]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[id_nis]>$dcombo[id_nis]</option> 
                                ";                                
                            }

                        }
                        ?>
                    </select>
                       </div>
                       </div>    
					   
                        <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Kelas</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="namas" id="namas" required="required" value="<?php echo $dupdate['namas'] ?>" readonly="readonly" />
                            </div>
                       </div>   
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">No Ortu</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="no_ortu" id="no_ortu" required="required" value="<?php echo $dupdate['no_ortu'] ?>" readonly="readonly"   />
                            </div>
                       </div>
					   
                      <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kd_kelas">Jenis Kelas</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_kelas" id="kd_kelas"  required>
                         <option value=""></option>
                       <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_kelas
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['kd_kelas'] == $dupdate['kd_kelas']) {
                                echo "
                                <option value=$dcombo[kd_kelas] selected=selected>$dcombo[namak]$dcombo[jnsk]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[kd_kelas]>$dcombo[namak]$dcombo[jnsk]</option> 
                                ";                                
                            }

                        }
                        ?>
                    </select>
                       </div>
                       </div>    
					   <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kd_jurusan">Jurusan</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_jurusan" id="kd_jurusan"  required>
                         <option value=""></option>
                       <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_jurusan
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['kd_jurusan'] == $dupdate['kd_jurusan']) {
                                echo "
                                <option value=$dcombo[kd_jurusan] selected=selected>$dcombo[namajur]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[kd_jurusan]>$dcombo[namajur]</option> 
                                ";                                
                            }

                        }
                        ?>
                    </select>
                       </div>
                       </div>  
					<div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="id_nik">Wali Kelas</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="id_nik" id="id_nik"  required>
                         <option value=""></option>
                       <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_guru
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['id_nik'] == $dupdate['id_nik']) {
                                echo "
                                <option value=$dcombo[id_nik] selected=selected>$dcombo[namag]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[id_nik]>$dcombo[namag]</option> 
                                ";                                
                            }

                        }
                        ?>
                    </select>
                       </div>
                       </div>    					   
						<div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=t_kelas&act=datagrid'">kembali</button>
                         </div>
			</div> 				
										    
                  
                      </form>

                   
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
                
			</div><!-- /.main-content -->
		<?php
            include("../admin/footer.php");
            ?>
                        
<script  type="text/javascript">
 var frmvalidator = new Validator("tambah_kat");
 frmvalidator.addValidation("namak","req","Silakan Masukkan Nama Penyakit");
 frmvalidator.addValidation("namak","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("namak","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("namak","simbol","Hanya Huruf Saja");
 frmvalidator.addValidation("jnsk","req","Silakan Masukkan jnsk");
 frmvalidator.addValidation("tgl_lahir","req","Silakan Masukkan tgl_lahir");
 frmvalidator.addValidation("alamat","req","Silakan Masukkan alamat");
</script>
	</body>
</html>
 <?php
        break;
    
            case "updateact":
             $kd_kelas = $_POST['kd_kelas'];
			 $namak = $_POST['namak'];
			 $jnsk = $_POST['jnsk'];
        $qupdate = "
          UPDATE t_kelas SET
            namak = '$namak',
			jnsk = '$jnsk'
			WHERE
            kd_kelas = '$kd_kelas'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=t_kelas&act=datagrid");
                 break;
    
        case "delete":
              $kd_kelas = $_GET['kd_kelas'];
        $qdelete = "
          DELETE  FROM t_kelas
       
          WHERE
            kd_kelas = '$kd_kelas'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=t_kelas&act=datagrid");
        break;
}