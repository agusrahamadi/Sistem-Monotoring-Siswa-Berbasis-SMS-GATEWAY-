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
		<li>Data Pelanggaran</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Pelanggaran
                </h1>
            </div>
            <h1>
                    <a href="?unit=m_pelanggaran&act=input">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
                    <a href="?unit=ml_pelanggaran" target="_blank">
                        <button class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
                    </a>
					<a href="unit/mxp_pelanggaran.php">
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
                                        <th style="text-align: center">Nama Pelanggaran</th>
                                        <th style="text-align: center">Point</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM t_pelanggaran";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[nama_pel]</td>
                                             <td style= text-align:center  >$ddatagrid[poin]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=m_pelanggaran&act=update&kd_pel=$ddatagrid[kd_pel] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=m_pelanggaran&act=delete&kd_pel=$ddatagrid[kd_pel] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
							<li>Tambah Data Pelanggaran</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Pelanggaran</h1></div>
						<div class="row">
							<div class="col-xs-12">
      
                  <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="?unit=m_pelanggaran&act=inputact" enctype="multipart/form-data" >    
                      
                       
						<div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Pelanggaran</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nama_pel" id="nama_pel" required="required" autofocus="autofocus" />
                            </div>
                       </div>
					   <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Point</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="poin" id="poin" required="required" />
                            </div>
                       </div>
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=m_pelanggaran&act=datagrid'">kembali</button>
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
 frmvalidator.addValidation("nama_pel","req","Silakan Masukkan Nama Penyakit");
 frmvalidator.addValidation("nama_pel","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("nama_pel","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("nama_pel","simbol","Hanya Huruf Saja");
 frmvalidator.addValidation("jk","req","Silakan Masukkan jk");
  frmvalidator.addValidation("tgl_lahir","req","Silakan Masukkan tgl_lahir");
   frmvalidator.addValidation("alamat","req","Silakan Masukkan alamat");
</script>    
	</body>
</html>
<?php
        break;
    
        case "inputact":
      		 $nama_pel = $_POST['nama_pel'];
			  $poin = $_POST['poin'];
             $qinput = "
          INSERT INTO t_pelanggaran
          (nama_pel, poin)
          VALUES
          ('$nama_pel', '$poin')
        ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_pelanggaran WHERE nama_pel = '$nama_pel'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nama Pelanggaran Sudah Ada');
              document.location='adminmainapp.php?unit=m_pelanggaran&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=m_pelanggaran&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_pel = $_GET['kd_pel'];
        $qupdate = "SELECT * FROM t_pelanggaran WHERE kd_pel = '$kd_pel'";
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
							<li>Edit Data Pelanggaran</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Pelanggaran</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                    
              <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="adminmainapp.php?unit=m_pelanggaran&act=updateact">    
                      
                        <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">kode pelanggran</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kd_pel" id="kd_pel" required="required" value="<?php echo $dupdate['kd_pel'] ?>" readonly="readonly" />
                            </div>
                       </div>   
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Pelaanggaran</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nama_pel" id="nama_pel" required="required" value="<?php echo $dupdate['nama_pel'] ?>"  autofocus="autofocus" />
                            </div>
                       </div>
					    <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Point</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="poin" id="poin"  required="required" value="<?php echo $dupdate['poin'] ?>"   />
                            </div>
                       </div>
					 
					   
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=m_pelanggaran&act=datagrid'">kembali</button>
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
 frmvalidator.addValidation("nama_pel","req","Silakan Masukkan Nama Penyakit");
 frmvalidator.addValidation("nama_pel","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("nama_pel","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("nama_pel","simbol","Hanya Huruf Saja");
 frmvalidator.addValidation("jk","req","Silakan Masukkan jk");
 frmvalidator.addValidation("tgl_lahir","req","Silakan Masukkan tgl_lahir");
 frmvalidator.addValidation("alamat","req","Silakan Masukkan alamat");
</script>
	</body>
</html>
 <?php
        break;
    
            case "updateact":
             $kd_pel = $_POST['kd_pel'];
			 $nama_pel = $_POST['nama_pel'];
			 $poin = $_POST['poin'];
        $qupdate = "
          UPDATE t_pelanggaran SET
            nama_pel = '$nama_pel',
			poin = '$poin'
			WHERE
            kd_pel = '$kd_pel'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=m_pelanggaran&act=datagrid");
                 break;
    
        case "delete":
              $kd_pel = $_GET['kd_pel'];
        $qdelete = "
          DELETE  FROM t_pelanggaran
       
          WHERE
            kd_pel = '$kd_pel'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=m_pelanggaran&act=datagrid");
        break;
}