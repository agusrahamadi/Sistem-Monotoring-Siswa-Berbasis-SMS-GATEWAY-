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
		<li>Data Presensi</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Presensi
                </h1>
            </div>
            <h1>
                    <a href="?unit=m_presensi&act=input">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
                    <a href="?unit=ml_presensi" target="_blank">
                        <button class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
                    </a>
					<a href="unit/mxp_presensi.php">
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
                                        <th style="text-align: center">Nama Presensi</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM t_presensi";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[jenis_pre]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=m_presensi&act=update&kd_pre=$ddatagrid[kd_pre] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=m_presensi&act=delete&kd_pre=$ddatagrid[kd_pre] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
							<li>Tambah Data Presensi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Presensi</h1></div>
						<div class="row">
							<div class="col-xs-12">
      
                  <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="?unit=m_presensi&act=inputact" enctype="multipart/form-data" >    
                      
                       
						<div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Presensi</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="jenis_pre" id="jenis_pre" required="required" autofocus="autofocus" />
                            </div>
                       </div>
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=m_presensi&act=datagrid'">kembali</button>
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
 frmvalidator.addValidation("jenis_pre","req","Silakan Masukkan Nama Penyakit");
 frmvalidator.addValidation("jenis_pre","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("jenis_pre","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("jenis_pre","simbol","Hanya Huruf Saja");
 frmvalidator.addValidation("jk","req","Silakan Masukkan jk");
  frmvalidator.addValidation("tgl_lahir","req","Silakan Masukkan tgl_lahir");
   frmvalidator.addValidation("alamat","req","Silakan Masukkan alamat");
</script>    
	</body>
</html>
<?php
        break;
    
        case "inputact":
      		 $jenis_pre = $_POST['jenis_pre'];
             $qinput = "
          INSERT INTO t_presensi
          (jenis_pre)
          VALUES
          ('$jenis_pre')
        ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_presensi WHERE jenis_pre = '$jenis_pre'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nama Presensi Sudah Ada');
              document.location='adminmainapp.php?unit=m_presensi&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=m_presensi&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_pre = $_GET['kd_pre'];
        $qupdate = "SELECT * FROM t_presensi WHERE kd_pre = '$kd_pre'";
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
							<li>Edit Data Presensi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Presensi</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                    
              <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="adminmainapp.php?unit=m_presensi&act=updateact">    
                      
                        <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kode Presensi</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kd_pre" id="kd_pre" required="required" value="<?php echo $dupdate['kd_pre'] ?>" readonly="readonly" />
                            </div>
                       </div>   
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Presensi</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="jenis_pre" id="jenis_pre" required="required" value="<?php echo $dupdate['jenis_pre'] ?>"  autofocus="autofocus" />
                            </div>
                       </div>
					 
					   
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=m_presensi&act=datagrid'">kembali</button>
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
 frmvalidator.addValidation("jenis_pre","req","Silakan Masukkan Nama Penyakit");
 frmvalidator.addValidation("jenis_pre","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("jenis_pre","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("jenis_pre","simbol","Hanya Huruf Saja");
 frmvalidator.addValidation("jk","req","Silakan Masukkan jk");
 frmvalidator.addValidation("tgl_lahir","req","Silakan Masukkan tgl_lahir");
 frmvalidator.addValidation("alamat","req","Silakan Masukkan alamat");
</script>
	</body>
</html>
 <?php
        break;
    
            case "updateact":
             $kd_pre = $_POST['kd_pre'];
			 $jenis_pre = $_POST['jenis_pre'];
        $qupdate = "
          UPDATE t_presensi SET
            jenis_pre = '$jenis_pre'
			WHERE
            kd_pre = '$kd_pre'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=m_presensi&act=datagrid");
                 break;
    
        case "delete":
              $kd_pre = $_GET['kd_pre'];
        $qdelete = "
          DELETE  FROM t_presensi
       
          WHERE
            kd_pre = '$kd_pre'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=m_presensi&act=datagrid");
        break;
}