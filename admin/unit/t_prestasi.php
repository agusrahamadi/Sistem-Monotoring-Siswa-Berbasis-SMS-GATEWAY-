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
                <li>Data Master</li>
		<li>Data Prestasi</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Prestasi
                </h1>
            </div>
            <h1>
                    <a href="?unit=t_prestasi&act=input">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
                    <a href="?unit=tl_prestasi" target="_blank">
                        <button class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
                    </a>
					<a href="unit/txp_prestasi.php">
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
                                        <th style="text-align: center">Nama prestasi</th>
                                        <th style="text-align: center">Prestasi</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Keterangan</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
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
                                             <td style=text-align:center>
                                                 <a href=?unit=t_prestasi&act=update&kd_prspretas=$ddatagrid[kd_prspretas] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=t_prestasi&act=delete&kd_prspretas=$ddatagrid[kd_prspretas] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
              <li>Data Master</li>
							<li>Tambah Data Prestasi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Prestasi</h1></div>
						<div class="row">
							<div class="col-xs-12">
      
                  <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="?unit=t_prestasi&act=inputact" enctype="multipart/form-data" >    
                      
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">NISN</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-3" type="text" name="id_nis" id="id_nis" required="required"  readonly="" />
								
								<input class="col-xs-10 col-sm-5" type="button" value="Pilih Nis"  name="id_nis" id="id_nis" style="width: 120px; margin-left: 5px; margin-top: 0px; height: 29px; padding-top: 0px;" onclick="window.open('unit/p_nis2.php', 'winpopup', 'toolbar=no,statusbar=no,menubar=no,left=500,top=70,resizable=no,scrollbars=yes,width=410,height=610');" />
       
                            </div>
							
                       </div>
					   <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Siswa</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nams" id="namas" required="required"  readonly=""  />
                            </div>
                       </div>
					   
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kd_pres">Prestasi</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_pres" id="kd_pres"  required>
                        <option selected="selected">-Pilih Prestasi-</option>
                        <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_prestasi 
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($data = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$data[kd_pres]>$data[nama_pres]</option> 
                            ";
                        }
                        ?>
                    </select>
                       </div>
                       </div>    
					   <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Tanggal Prestasi</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="date" name="tgl_prspretas" id="tgl_prspretas" required="required"   />
                            </div>
                       </div>
					    <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="col-xs-10 col-sm-5" name="ket" id="ket" required="required" ></textarea>
                            </div>
                       </div>
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=t_prestasi&act=datagrid'">kembali</button>
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
 frmvalidator.addValidation("nama_pres","req","Silakan Masukkan Nama Penyakit");
 frmvalidator.addValidation("nama_pres","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("nama_pres","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("nama_pres","simbol","Hanya Huruf Saja");
 frmvalidator.addValidation("jk","req","Silakan Masukkan jk");
  frmvalidator.addValidation("tgl_lahir","req","Silakan Masukkan tgl_lahir");
   frmvalidator.addValidation("alamat","req","Silakan Masukkan alamat");
</script>    
	</body>
</html>
<?php
        break;
    
        case "inputact":
      		 $id_nis = $_POST['id_nis'];
      		 $kd_pres = $_POST['kd_pres'];
      		 $tgl_prspretas = $_POST['tgl_prspretas'];
      		 $ket = $_POST['ket'];
             $qinput = "
          INSERT INTO t_prspretas
          (id_nis, kd_pres, tgl_prspretas, ket)
          VALUES
          ('$id_nis', '$kd_pres', '$tgl_prspretas', '$ket')
        ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_presensi WHERE id_nis = '$id_nis'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nama prestasi Sudah Ada');
              document.location='adminmainapp.php?unit=t_prestasi&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=t_prestasi&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_prspretas = $_GET['kd_prspretas'];
        $qupdate = "SELECT 
							t_prspretas.kd_prspretas, t_prspretas.kd_pres, t_prspretas.id_nis, t_prspretas.tgl_prspretas,t_prspretas.ket,
                            t_prestasi.kd_pres, t_prestasi.nama_pres,
							t_siswa.id_nis, t_siswa.namas
                            FROM 
                                t_prspretas
                                    JOIN t_siswa ON t_prspretas.id_nis = t_siswa.id_nis
									JOIN t_prestasi ON t_prspretas.kd_pres = t_prestasi.kd_pres
									WHERE t_prspretas.kd_prspretas = '$kd_prspretas'";
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
              <li>Data Master</li>
							<li>Edit Data Prestasi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Prestasi</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                    
              <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="adminmainapp.php?unit=t_prestasi&act=updateact&kd_prspretas=<?php echo $dupdate['kd_prspretas'] ?>">    
                      
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
                          <label class="col-sm-3 control-label no-padding-right">Nama Siswa</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nams" id="namas" value="<?php echo $dupdate['namas'] ?>" required="required"  readonly=""  />
                            </div>
                       </div>
					   
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kd_pres">Prestasi</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_pres" id="kd_pres"  required>
                          <option value=""></option>
                       <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_prestasi
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['kd_pres'] == $dupdate['kd_pres']) {
                                echo "
                                <option value=$dcombo[kd_pres] selected=selected>$dcombo[nama_pres]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[kd_pres]>$dcombo[nama_pres]</option> 
                                ";                                
                            }

                        }
                        ?>
                    </select>
                       </div>
                       </div>    
					   <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Tanggal Prestasi</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="date" name="tgl_prspretas" id="tgl_prspretas" value="<?php echo $dupdate['tgl_prspretas'] ?>" />
                            </div>
                       </div>
					    <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="col-xs-10 col-sm-5" name="ket" id="ket" ><?php echo $dupdate['ket'] ?> </textarea>
                            </div>
                       </div>
					 
					   
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=t_prestasi&act=datagrid'">kembali</button>
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
 frmvalidator.addValidation("nama_pres","req","Silakan Masukkan Nama Penyakit");
 frmvalidator.addValidation("nama_pres","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("nama_pres","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("nama_pres","simbol","Hanya Huruf Saja");
 frmvalidator.addValidation("jk","req","Silakan Masukkan jk");
 frmvalidator.addValidation("tgl_lahir","req","Silakan Masukkan tgl_lahir");
 frmvalidator.addValidation("alamat","req","Silakan Masukkan alamat");
</script>
	</body>
</html>
 <?php
        break;
    
            case "updateact":
			 $kd_prspretas = $_GET['kd_prspretas'];
             $id_nis = $_POST['id_nis'];
			 $kd_pres = $_POST['kd_pres'];
             $tgl_prspretas = $_POST['tgl_prspretas'];
             $ket = $_POST['ket'];
        $qupdate = "
          UPDATE t_prspretas SET
            id_nis = '$id_nis',
            kd_pres = '$kd_pres',
            tgl_prspretas = '$tgl_prspretas',
            ket = '$ket'
			WHERE
            kd_prspretas = '$kd_prspretas'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=t_prestasi&act=datagrid");
                 break;
    
        case "delete":
              $kd_prspretas = $_GET['kd_prspretas'];
        $qdelete = "
          DELETE  FROM t_prspretas
       
          WHERE
            kd_prspretas = '$kd_prspretas'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=t_prestasi&act=datagrid");
        break;
}