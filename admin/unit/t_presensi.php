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
		<li>Data Presensi</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Presensi
                </h1>
            </div>
            <h1>
                    <a href="?unit=t_presensi&act=input">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
                    <a href="?unit=tl_presensi" target="_blank">
                        <button class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
                    </a>
					<a href="unit/txp_presensi.php">
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
                                        <th style="text-align: center">Presensi</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Keterangan</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT 
							t_prspresen.kd_prspresen, t_prspresen.kd_pre, t_prspresen.id_nis, t_prspresen.tgl_prspresen,t_prspresen.ket,
                            t_presensi.kd_pre, t_presensi.jenis_pre,
							t_siswa.id_nis, t_siswa.namas
                            FROM 
                                t_prspresen
                                    JOIN t_siswa ON t_prspresen.id_nis = t_siswa.id_nis
									JOIN t_presensi ON t_prspresen.kd_pre = t_presensi.kd_pre";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:left  >$ddatagrid[id_nis]</td>
                                             <td style= text-align:left  >$ddatagrid[namas]</td>
                                             <td style= text-align:left  >$ddatagrid[jenis_pre]</td>
                                             <td style= text-align:left  >$ddatagrid[tgl_prspresen]</td>
                                             <td style= text-align:left  >$ddatagrid[ket]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=t_presensi&act=update&kd_prspresen=$ddatagrid[kd_prspresen] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=t_presensi&act=delete&kd_prspresen=$ddatagrid[kd_prspresen] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
							<li>Tambah Data Presensi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Presensi</h1></div>
						<div class="row">
							<div class="col-xs-12">
      
                  <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="?unit=t_presensi&act=inputact" enctype="multipart/form-data" >    
                      
                       
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
                      <label class="col-sm-3 control-label no-padding-right" for="kd_pre">Presensi</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_pre" id="kd_pre"  required>
                        <option selected="selected">-Pilih Presensi-</option>
                        <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_presensi 
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($data = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$data[kd_pre]>$data[jenis_pre]</option> 
                            ";
                        }
                        ?>
                    </select>
                       </div>
                       </div>    
					   <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Tanggal Presensi</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="date" name="tgl_prspresen" id="tgl_prspresen" required="required"    />
                            </div>
                       </div>
					    <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="col-xs-10 col-sm-5" name="ket" id="ket" required="required"  ></textarea>
                            </div>
                       </div>
                     
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=t_presensi&act=datagrid'">kembali</button>
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
      		 $id_nis = $_POST['id_nis'];
      		 $kd_pre = $_POST['kd_pre'];
      		 $tgl_prspresen = $_POST['tgl_prspresen'];
      		 $ket = $_POST['ket'];
             $qinput = "
          INSERT INTO t_prspresen
          (id_nis, kd_pre, tgl_prspresen, ket)
          VALUES
          ('$id_nis', '$kd_pre', '$tgl_prspresen', '$ket')
        ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_presensi WHERE id_nis = '$id_nis'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nama Presensi Sudah Ada');
              document.location='adminmainapp.php?unit=t_presensi&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=t_presensi&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_prspresen = $_GET['kd_prspresen'];
        $qupdate = "SELECT 
							t_prspresen.kd_prspresen, t_prspresen.kd_pre, t_prspresen.id_nis, t_prspresen.tgl_prspresen,t_prspresen.ket,
                            t_presensi.kd_pre, t_presensi.jenis_pre,
							t_siswa.id_nis, t_siswa.namas
                            FROM 
                                t_prspresen
                                    JOIN t_siswa ON t_prspresen.id_nis = t_siswa.id_nis
									JOIN t_presensi ON t_prspresen.kd_pre = t_presensi.kd_pre
									WHERE t_prspresen.kd_prspresen = '$kd_prspresen'";
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
							<li>Edit Data Presensi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Presensi</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                    
              <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="adminmainapp.php?unit=t_presensi&act=updateact&kd_prspresen=<?php echo $dupdate['kd_prspresen'] ?>">    
                      
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
                      <label class="col-sm-3 control-label no-padding-right" for="kd_pre">Presensi</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_pre" id="kd_pre"  required>
                          <option value=""></option>
                       <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_presensi
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['kd_pre'] == $dupdate['kd_pre']) {
                                echo "
                                <option value=$dcombo[kd_pre] selected=selected>$dcombo[jenis_pre]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[kd_pre]>$dcombo[jenis_pre]</option> 
                                ";                                
                            }

                        }
                        ?>
                    </select>
                       </div>
                       </div>    
					   <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Tanggal Presensi</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="date" name="tgl_prspresen" id="tgl_prspresen" value="<?php echo $dupdate['tgl_prspresen'] ?>" required="required"   />
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
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=t_presensi&act=datagrid'">kembali</button>
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
             $kd_prspresen = $_GET['kd_prspresen'];
             $id_nis = $_POST['id_nis'];
			 $kd_pre = $_POST['kd_pre'];
             $tgl_prspresen = $_POST['tgl_prspresen'];
             $ket = $_POST['ket'];
			 
        $qupdate = "
          UPDATE t_prspresen SET
            id_nis = '$id_nis',
            kd_pre = '$kd_pre',
            tgl_prspresen = '$tgl_prspresen',
            ket = '$ket'
			
			WHERE
            kd_prspresen = '$kd_prspresen'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=t_presensi&act=datagrid");
                 break;
    
        case "delete":
              $kd_prspresen = $_GET['kd_prspresen'];
        $qdelete = "
          DELETE  FROM t_prspresen
       
          WHERE
            kd_prspresen = '$kd_prspresen'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=t_presensi&act=datagrid");
        break;
}