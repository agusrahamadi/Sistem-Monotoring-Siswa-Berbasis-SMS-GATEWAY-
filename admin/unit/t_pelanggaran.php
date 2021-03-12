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
                    <a href="?unit=t_pelanggaran&act=input">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
                    <a href="?unit=tl_pelanggaran" target="_blank">
                        <button class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
                    </a>
					<a href="unit/txp_pelanggaran.php">
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
                                        <th style="text-align: center">Pelanggaran</th>
                                        <th style="text-align: center">Point</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Tindakan</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT 
							t_prspel.kd_prspel, t_prspel.kd_pel, t_prspel.id_nis, t_prspel.tgl_prspel,t_prspel.ket,
                            t_pelanggaran.kd_pel, t_pelanggaran.nama_pel, t_pelanggaran.poin,
							t_siswa.id_nis, t_siswa.namas
                            FROM 
                                t_prspel
                                    JOIN t_siswa ON t_prspel.id_nis = t_siswa.id_nis
									JOIN t_pelanggaran ON t_prspel.kd_pel = t_pelanggaran.kd_pel";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:left  >$no</td>
                                             <td style= text-align:left  >$ddatagrid[id_nis]</td>
                                             <td style= text-align:left  >$ddatagrid[namas]</td>
                                             <td style= text-align:left  >$ddatagrid[nama_pel]</td>
                                             <td style= text-align:center  >$ddatagrid[poin]</td>
                                             <td style= text-align:left  >$ddatagrid[tgl_prspel]</td>
                                             <td style= text-align:left  >$ddatagrid[ket]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=t_pelanggaran&act=update&kd_prspel=$ddatagrid[kd_prspel] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=t_pelanggaran&act=delete&kd_prspel=$ddatagrid[kd_prspel] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
      
                  <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="?unit=t_pelanggaran&act=inputact" enctype="multipart/form-data" >    
                      
                       
						 <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">NISNlabel>
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
                      <label class="col-sm-3 control-label no-padding-right" for="kd_pel">Pelanggaran</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_pel" id="kd_pel"  required>
                        <option selected="selected">-Pilih Pelanggaran-</option>
                        <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_pelanggaran 
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($data = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$data[kd_pel]>$data[nama_pel]</option> 
                            ";
                        }
                        ?>
                    </select>
                       </div>
                       </div>    
					   <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Tanggal Pelanggaran</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="date" name="tgl_prspel" id="tgl_prspel" required="required"  />
                            </div>
                       </div>
					    <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Tindakan</label>
                            <div class="col-sm-9">
                                <textarea class="col-xs-10 col-sm-5" name="ket" id="ket" required="required"></textarea>
                            </div>
                       </div>
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=t_pelanggaran&act=datagrid'">kembali</button>
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
      		 $id_nis = $_POST['id_nis'];
      		 $kd_pel = $_POST['kd_pel'];
      		 $tgl_prspel = $_POST['tgl_prspel'];
      		 $ket = $_POST['ket'];
             $qinput = "
          INSERT INTO t_prspel
          (id_nis, kd_pel, tgl_prspel, ket)
          VALUES
          ('$id_nis', '$kd_pel', '$tgl_prspel', '$ket')
        ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_pelanggaran WHERE id_nis = '$id_nis'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nis Sudah Ada Kelas');
              document.location='adminmainapp.php?unit=t_pelanggaran&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=t_pelanggaran&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_prspel = $_GET['kd_prspel'];
        $qupdate = " SELECT 
							t_prspel.kd_prspel, t_prspel.kd_pel, t_prspel.id_nis, t_prspel.tgl_prspel,t_prspel.ket,
                            t_pelanggaran.kd_pel, t_pelanggaran.nama_pel,
							t_siswa.id_nis, t_siswa.namas
                            FROM 
                                t_prspel
                                    JOIN t_siswa ON t_prspel.id_nis = t_siswa.id_nis
									JOIN t_pelanggaran ON t_prspel.kd_pel = t_pelanggaran.kd_pel
									WHERE t_prspel.kd_prspel = '$kd_prspel'";
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
                                                            
                 
                                    
              <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="adminmainapp.php?unit=t_pelanggaran&act=updateact&kd_prspel=<?php echo $dupdate['kd_prspel'] ?> ">    
                      
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
                      <label class="col-sm-3 control-label no-padding-right" for="kd_pel">Pelanggaran</label>
                    <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kd_pel" id="kd_pel"  required>
                          <option value=""></option>
                       <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_pelanggaran
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['kd_pel'] == $dupdate['kd_pel']) {
                                echo "
                                <option value=$dcombo[kd_pel] selected=selected>$dcombo[nama_pel]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[kd_pel]>$dcombo[nama_pel]</option> 
                                ";                                
                            }

                        }
                        ?>
                    </select>
                       </div>
                       </div>    
					   <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Tanggal Pelanggaran</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="date" name="tgl_prspel" id="tgl_prspel" value="<?php echo $dupdate['tgl_prspel'] ?>"  />
                            </div>
                       </div>
					    <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Tindakan</label>
                            <div class="col-sm-9">
                                <textarea class="col-xs-10 col-sm-5" name="ket" id="ket" ><?php echo $dupdate['ket'] ?> </textarea>
                            </div>
                       </div>
					 
					   
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=t_pelanggaran&act=datagrid'">kembali</button>
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
             $kd_prspel = $_GET['kd_prspel'];
             $id_nis = $_POST['id_nis'];
			 $kd_pel = $_POST['kd_pel'];
             $tgl_prspel = $_POST['tgl_prspel'];
             $ket = $_POST['ket'];
        $qupdate = "
          UPDATE t_prspel SET
            id_nis = '$id_nis',
            kd_pel = '$kd_pel',
            tgl_prspel = '$tgl_prspel',
            ket = '$ket'
			WHERE
            kd_prspel = '$kd_prspel'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=t_pelanggaran&act=datagrid");
                 break;
    
        case "delete":
              $kd_prspel = $_GET['kd_prspel'];
        $qdelete = "
          DELETE  FROM t_prspel
       
          WHERE
            kd_prspel = '$kd_prspel'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=t_pelanggaran&act=datagrid");
        break;
}