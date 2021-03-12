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
		<li>Data Siswa</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Siswa
                </h1>
            </div>
            <h1>
                    <a href="?unit=m_siswa&act=input">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
                    <a href="?unit=ml_siswa" target="_blank">
                        <button class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
                    </a>
					<a href="unit/mxp_siswa.php">
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
                                        <th style="text-align: center">Jenis Kelamin</th>
                                        <th style="text-align: center">Tanggal Lahir</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">No Ortu</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM t_siswa ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:center>$ddatagrid[id_nis]</td>
                                             <td style= text-align:left  >$ddatagrid[namas]</td>
                                             <td style= text-align:left  >$ddatagrid[jk]</td>
                                             <td style= text-align:left  >$ddatagrid[tgl_lahir]</td>
                                             <td style= text-align:left  >$ddatagrid[alamat]</td>
                                             <td style= text-align:left  >$ddatagrid[no_ortu]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=m_siswa&act=update&kd_siswa=$ddatagrid[kd_siswa] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=m_siswa&act=delete&kd_siswa=$ddatagrid[kd_siswa] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
							<li>Tambah Data Siswa</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Siswa</h1></div>
						<div class="row">
							<div class="col-xs-12">
      
                  <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="?unit=m_siswa&act=inputact" enctype="multipart/form-data" >    
                      
                       
						<div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">NISN</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="id_nis" maxlength="10" id="id_nis" required="required" autofocus="autofocus"/>
                            </div>
                       </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Siswa</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="namas" id="namas" required="required"  />
                            </div>
                       </div>
					   
					<div class="form-group">
					<label  class="col-sm-3 control-label no-padding-right"  for="jk">Jenis Kelamin</label>
                   <div class="col-sm-9">
                    <input type="radio" name="jk" id="jk" value="Laki-Laki" /> Laki-Laki
                    <input  type="radio" name="jk" id="jk" value="Perempuan" /> Perempuan
                           
                    </div>
                       </div>
					  
					 
                   <input type="hidden" name="tgl_sekarang" value="<?=date("Y")?>" />
											
					   <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right"  for="tgl_lahir">Tanggal Lahir</label>	
                   <div class="col-sm-9">
                   <input class="col-xs-10 col-sm-5" type="date" name="tgl_lahir" id="tgl_lahir"> 
                    </div>
                       </div>
					   
					   <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right"  for="alamat">alamat</label>	
                   <div class="col-sm-9">
                   <textarea class="form-control limited" name="alamat" id="alamat"> </textarea>
                    </div>
                       </div>
					   
					   <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right"  for="no_ortu">No Ortu</label>	
                   <div class="col-sm-9">
                   <input class="col-xs-10 col-sm-5" type="text" name="no_ortu" maxlength="12" id="no_ortu">	
                    </div>
                       </div>
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=m_siswa&act=datagrid'">kembali</button>
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
 frmvalidator.addValidation("id_nis","req","Silakan Masukkan Nis");
 frmvalidator.addValidation("id_nis","simbol","Masukan NIS Anda Bukan Simbol");
 frmvalidator.addValidation("id_nis","numeric","Masukan NIS Anda Bukan Huruf");
 frmvalidator.addValidation("namas","req","Silakan Masukkan Nama");
 frmvalidator.addValidation("namas","alpha_s","Masukan nama Anda Bukan Simbol");
 frmvalidator.addValidation("namas","simbol","Masukan Nama Anda Bukan Angka");
 frmvalidator.addValidation("jk","req","Silakan Masukkan jk");
  frmvalidator.addValidation("tgl_lahir","req","Silakan Masukkan tgl_lahir");
   frmvalidator.addValidation("alamat","req","Silakan Masukkan alamat");
 frmvalidator.addValidation("no_ortu","req","Silakan Masukkan No Telpon Orang tua");
 frmvalidator.addValidation("no_ortu","simbol","Masukan No Telpon Anda Bukan Simbol");
 frmvalidator.addValidation("no_ortu","numeric","Masukan No Telpon Bukan Huruf");
</script>    
	</body>
</html>
<?php
        break;
    
        case "inputact":
      
             $id_nis = $_POST['id_nis'];
			 $namas = $_POST['namas'];
			 $jk = $_POST['jk'];
			 $tgl_lahir = $_POST['tgl_lahir'];
			 $tgl_sekarang = $_POST['tgl_sekarang'];
			 $alamat = $_POST['alamat'];
			 $no_ortu = $_POST['no_ortu'];
             $qinput = "
          INSERT INTO t_siswa
          (id_nis, namas, jk, tgl_lahir, alamat, no_ortu)
          VALUES
          ('$id_nis', '$namas', '$jk', '$tgl_lahir', '$alamat','$no_ortu')
        ";
        $tgl = explode("/",$tgl_lahir);
		$explode = $tgl[0];
		$umur =$tgl_sekarang - $explode;
		
        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_siswa WHERE id_nis = '$id_nis'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nis Sudah Ada');
              document.location='adminmainapp.php?unit=m_siswa&act=input';
              </script>";
          } 
		  else if (strlen($id_nis) <=7) {
          echo "<script> alert('NIS Minimal 8');
              document.location='adminmainapp.php?unit=m_siswa&act=input';
              </script>";
          } 
		  else if ($umur < 15) {
          echo "<script> alert('Umur tidak bisa dibawah 15 Tahun');
              document.location='adminmainapp.php?unit=m_siswa&act=input';
              </script>";
          } 
		  else if ($umur > 18) {
          echo "<script> alert('Umur tidak bisa diatas 18 Tahun');
              document.location='adminmainapp.php?unit=m_siswa&act=input';
              </script>";
          } 
		  else if (!empty($_POST['id_nis']) AND ($_POST['namas']) AND ($_POST['jk']) AND ($_POST['tgl_lahir']) AND ($_POST['no_ortu'])){
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=m_siswa&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_siswa = $_GET['kd_siswa'];
        $qupdate = "SELECT * FROM t_siswa WHERE kd_siswa = '$kd_siswa'";
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
							<li>Edit Data Siswa</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Siswa</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                    
              <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="adminmainapp.php?unit=m_siswa&act=updateact">    
                      
                        <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">NISN</label>
                            <div class="col-sm-9">
							
                                <input class="col-xs-10 col-sm-5" type="hidden" name="kd_siswa" id="kd_siswa" maxlength="10" required="required" value="<?php echo $dupdate['kd_siswa'] ?>" autofocus="autofocus" />
                                <input class="col-xs-10 col-sm-5" type="text" name="id_nis" id="id_nis" maxlength="10" required="required" value="<?php echo $dupdate['id_nis'] ?>" autofocus="autofocus" />
                            </div>
                       </div>   
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Siswa</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="namas" id="namas" required="required" value="<?php echo $dupdate['namas'] ?>"  />
                            </div>
                       </div>
					   
					   <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right"  for="jk">Jenis Kelamin</label>	
                   <div class="col-sm-9">
				    <?php
					if ($dupdate['jk'] == "Laki-Laki"){
						echo '<input type="radio" name="jk" id="jk" value="Laki-Laki" checked="checked" > Laki-Laki
							 <input type="radio" name="jk" id="jk" value="Perempuan"> Perempuan';
					} else if ($dupdate['jk'] == "Perempuan"){
						echo '<input type="radio" name="jk" id="jk" value="Laki-Laki" > Laki-Laki
							 <input type="radio" name="jk" id="jk" value="Perempuan" checked="checked" > Perempuan';
                    } else {
						echo '<input type="radio" name="jk" id="jk" value="Laki-Laki" > Laki-Laki
							  <input type="radio" name="jk" id="jk" value="Perempuan" > Perempuan';}
                            ?>
							</div>
                       </div>
					   
					   <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right"  for="tgl_lahir">Tanggal lahir</label>	
                   <div class="col-sm-9">
                    <input class="col-xs-10 col-sm-5" type="date" name="tgl_lahir" id="tgl_lahir" required="required" value="<?php echo $dupdate['tgl_lahir'] ?>"   />
                            </div>
                       </div>
					   
					   
					  <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right"  for="alamat">alamat</label>
                   <div class="col-sm-9">
                   <textarea class="form-control limited" name="alamat" id="alamat"><?php echo $dupdate['alamat'] ?> </textarea>	
                    </div>
                       </div>
					   
					   <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right"  for="no_ortu">No  Ortu</label>	
                   <div class="col-sm-9">
                    <input class="col-xs-10 col-sm-5" type="text" name="no_ortu" id="no_ortu" required="required" maxlength="12" value="<?php echo $dupdate['no_ortu'] ?>"  />
                            </div>
                       </div>
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=m_siswa&act=datagrid'">kembali</button>
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
 frmvalidator.addValidation("id_nis","req","Silakan Masukkan Nis");
 frmvalidator.addValidation("id_nis","simbol","Masukan NIS Anda Bukan Simbol");
 frmvalidator.addValidation("id_nis","numeric","Masukan NIS Anda Bukan Huruf");
 frmvalidator.addValidation("namas","req","Silakan Masukkan Nama");
 frmvalidator.addValidation("namas","alpha_s","Masukan nama Anda Bukan Simbol");
 frmvalidator.addValidation("namas","simbol","Masukan Nama Anda Bukan Angka");
 frmvalidator.addValidation("jk","req","Silakan Masukkan jk");
  frmvalidator.addValidation("tgl_lahir","req","Silakan Masukkan tgl_lahir");
   frmvalidator.addValidation("alamat","req","Silakan Masukkan alamat");
 frmvalidator.addValidation("no_ortu","req","Silakan Masukkan No Telpon Orang tua");
 frmvalidator.addValidation("no_ortu","simbol","Masukan No Telpon Anda Bukan Simbol");
 frmvalidator.addValidation("no_ortu","numeric","Masukan No Telpon Bukan Huruf");
</script>    
	</body>
</html>
 <?php
        break;
    
            case "updateact":
             $kd_siswa = $_POST['kd_siswa'];
             $id_nis = $_POST['id_nis'];
			 $namas = $_POST['namas'];
			 $jk = $_POST['jk'];
			 $tgl_lahir = $_POST['tgl_lahir'];
			 $alamat = $_POST['alamat'];
			 $no_ortu = $_POST['no_ortu'];
        $qupdate = "
          UPDATE t_siswa SET
		  id_nis = '$id_nis',
            namas = '$namas',
			jk = '$jk',
			tgl_lahir = '$tgl_lahir',
			alamat = '$alamat',
			no_ortu = '$no_ortu'
			WHERE
            
            kd_siswa = '$kd_siswa'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=m_siswa&act=datagrid");
                 break;
    
        case "delete":
              $id_nis = $_GET['id_nis'];
        $qdelete = "
          DELETE  FROM t_siswa
       
          WHERE
            id_nis = '$id_nis'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=m_siswa&act=datagrid");
        break;
}