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
		<li>Data Kelas</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Kelas
                </h1>
            </div>
            <h1>
                    <a href="?unit=m_kelas&act=input">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
                    <a href="?unit=ml_kelas" target="_blank">
                        <button class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
                    </a>
					<a href="unit/mxp_kelas.php">
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
                                        <th style="text-align: center">Kelas</th>
                                        <th style="text-align: center">Jenis Kelas</th>
                                        <th style="text-align: center">Jurusan</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT 
													t_kelas.kd_kelas, t_kelas.namak, t_kelas.jnsk, 
													 t_jurusan.kd_jurusan, t_jurusan.namajur
													 FROM 
													  t_kelas
														JOIN t_jurusan ON t_kelas.kd_jurusan = t_jurusan.kd_jurusan
														order by t_kelas.namak asc";
									  
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[namak]</td>
                                             <td style= text-align:left  >$ddatagrid[jnsk]</td>
											  <td style= text-align:left  >$ddatagrid[namajur]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=m_kelas&act=update&kd_kelas=$ddatagrid[kd_kelas] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=m_kelas&act=delete&kd_kelas=$ddatagrid[kd_kelas] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
							<li>Tambah Data Kelas</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Kelas</h1></div>
						<div class="row">
							<div class="col-xs-12">
      
                  <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="?unit=m_kelas&act=inputact" enctype="multipart/form-data" >    
                      
                       
						<div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kelas</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="namak" id="namak" required="required" autofocus="autofocus"/>
                            </div>
                       </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Jenis Kelas</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="jnsk" id="jnsk" required="required"  />
                            </div>
                       </div>
					   
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kd_jurusan">Jurusan</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_jurusan" id="kd_jurusan"  required>
                        <option selected="selected">-Pilih Jurusan-</option>
                        <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_jurusan 
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($data = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$data[kd_jurusan]>$data[namajur]</option> 
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
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=m_kelas&act=datagrid'">kembali</button>
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
    
        case "inputact":
			 $namak = $_POST['namak'];
			 $jnsk = $_POST['jnsk'];
      		 $kd_jurusan = $_POST['kd_jurusan'];
             $qinput = "
          INSERT INTO t_kelas
          ( namak, jnsk, kd_jurusan)
          VALUES
          ('$namak', '$jnsk','$kd_jurusan')
        ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_kelas WHERE namak = '$namak' and jnsk = '$jnsk'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nama Kelas Sudah Ada');
              document.location='adminmainapp.php?unit=m_kelas&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=m_kelas&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_kelas = $_GET['kd_kelas'];
        $qupdate = "SELECT * FROM t_kelas WHERE kd_kelas = '$kd_kelas'";
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
							<li>Edit Data Kelas</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Kelas</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                    
              <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="adminmainapp.php?unit=m_kelas&act=updateact">    
                      
                        <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kode Kelas</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kd_kelas" id="kd_kelas" required="required" value="<?php echo $dupdate['kd_kelas'] ?>" readonly="readonly" />
                            </div>
                       </div>   
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kelas</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="namak" id="namak" required="required" value="<?php echo $dupdate['namak'] ?>"  autofocus="autofocus" />
                            </div>
                       </div>
					   
					    <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Jenis Kelas</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="jnsk" id="jnsk" required="required" value="<?php echo $dupdate['jnsk'] ?>"  autofocus="autofocus" />
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
	                   
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=m_kelas&act=datagrid'">kembali</button>
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
			 $kd_jurusan = $_POST['kd_jurusan'];
        $qupdate = "
          UPDATE t_kelas SET
            namak = '$namak',
			jnsk = '$jnsk'
			kd_jurusan = '$kd_jurusan'
			WHERE
            kd_kelas = '$kd_kelas'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=m_kelas&act=datagrid");
                 break;
    
        case "delete":
              $kd_kelas = $_GET['kd_kelas'];
        $qdelete = "
          DELETE  FROM t_kelas
       
          WHERE
            kd_kelas = '$kd_kelas'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=m_kelas&act=datagrid");
        break;
}