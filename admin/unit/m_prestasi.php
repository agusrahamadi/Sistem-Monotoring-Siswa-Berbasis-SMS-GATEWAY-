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
                    <a href="?unit=m_prestasi&act=input">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
                    <a href="?unit=ml_prestasi" target="_blank">
                        <button class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
                    </a>
					<a href="unit/mxp_prestasi.php">
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
                                        <th style="text-align: center">Nama prestasi</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM t_prestasi";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[nama_pres]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=m_prestasi&act=update&kd_pres=$ddatagrid[kd_pres] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=m_prestasi&act=delete&kd_pres=$ddatagrid[kd_pres] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
      
                  <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="?unit=m_prestasi&act=inputact" enctype="multipart/form-data" >    
                      
                       
						<div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama prestasi</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nama_pres" id="nama_pres" required="required" autofocus="autofocus" />
                            </div>
                       </div>
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=m_prestasi&act=datagrid'">kembali</button>
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
      		 $nama_pres = $_POST['nama_pres'];
             $qinput = "
          INSERT INTO t_prestasi
          (nama_pres)
          VALUES
          ('$nama_pres')
        ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_prestasi WHERE nama_pres = '$nama_pres'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nama prestasi Sudah Ada');
              document.location='adminmainapp.php?unit=m_prestasi&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=m_prestasi&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_pres = $_GET['kd_pres'];
        $qupdate = "SELECT * FROM t_prestasi WHERE kd_pres = '$kd_pres'";
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
                                                            
                 
                                    
              <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="adminmainapp.php?unit=m_prestasi&act=updateact">    
                      
                        <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kode Prestasi</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kd_pres" id="kd_pres" required="required" value="<?php echo $dupdate['kd_pres'] ?>" readonly="readonly" />
                            </div>
                       </div>   
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Prestasi</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nama_pres" id="nama_pres" required="required" value="<?php echo $dupdate['nama_pres'] ?>"  autofocus="autofocus" />
                            </div>
                       </div>
					 
					   
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=m_prestasi&act=datagrid'">kembali</button>
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
             $kd_pres = $_POST['kd_pres'];
			 $nama_pres = $_POST['nama_pres'];
        $qupdate = "
          UPDATE t_prestasi SET
            nama_pres = '$nama_pres'
			WHERE
            kd_pres = '$kd_pres'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=m_prestasi&act=datagrid");
                 break;
    
        case "delete":
              $kd_pres = $_GET['kd_pres'];
        $qdelete = "
          DELETE  FROM t_prestasi
       
          WHERE
            kd_pres = '$kd_pres'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=m_prestasi&act=datagrid");
        break;
}