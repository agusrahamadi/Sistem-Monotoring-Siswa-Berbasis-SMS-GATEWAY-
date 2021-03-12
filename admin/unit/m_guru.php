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
                    <a href="adminmainapp.php?unit=dashboard">Dashboard</a>
                </li>
                <li>Data Master</li>
		<li>Data Guru</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Guru
                </h1>
            </div>
            <h1>
                    <a href="?unit=m_guru&act=input">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
                    <a href="?unit=ml_guru" target="_blank">
                        <button class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
                    </a>
					<a href="unit/mxp_guru.php">
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
                                        <th style="text-align: center">nik</th>
                                        <th style="text-align: center">Nama Guru</th>
                                        <th style="text-align: center">Jenis Kelamin</th>
                                        <th style="text-align: center">Tanggal Lahir</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">No Hp</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM t_guru ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:center>$ddatagrid[id_nik]</td>
                                             <td style= text-align:left  >$ddatagrid[namag]</td>
                                             <td style= text-align:left  >$ddatagrid[jk]</td>
                                             <td style= text-align:left  >$ddatagrid[tgl_lahir]</td>
                                             <td style= text-align:left  >$ddatagrid[alamat]</td>
                                             <td style= text-align:left  >$ddatagrid[no_hp]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=m_guru&act=update&kd_guru=$ddatagrid[kd_guru] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=m_guru&act=delete&kd_guru=$ddatagrid[kd_guru] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
							<li>Tambah Data Guru</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Guru</h1></div>
						<div class="row">
							<div class="col-xs-12">
      
                  <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="?unit=m_guru&act=inputact" enctype="multipart/form-data" >    
                      
                       
						 <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">NIK</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="id_nik" id="id_nik" maxlength="18" required="required" autofocus="autofocus"/>
                            </div>
                       </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Guru</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="namag" id="namag" required="required"  />
                            </div>
                       </div>
					   
					<div class="form-group">
					<label  class="col-sm-3 control-label no-padding-right"  for="jk">Jenis Kelamin</label>
                   <div class="col-sm-9">
                    <input type="radio" name="jk" id="jk" value="Laki-Laki" /> Laki-Laki
                    <input  type="radio" name="jk" id="jk" value="Perempuan" /> Perempuan
                           
                    </div>
                       </div>
					  
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
                   <label class="col-sm-3 control-label no-padding-right"  for="no_hp">No HP</label>	
                   <div class="col-sm-9">
                   <input class="col-xs-10 col-sm-5" type="text" name="no_hp" id="no_hp" maxlength="12">	
                    </div>
                       </div>
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=m_guru&act=datagrid'">kembali</button>
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
 frmvalidator.addValidation("id_nik","req","Silakan Masukkan Nis");
 frmvalidator.addValidation("id_nik","simbol","Masukan NIS Anda Bukan Simbol");
 frmvalidator.addValidation("id_nik","numeric","Masukan NIS Anda Bukan Huruf");
 frmvalidator.addValidation("namag","req","Silakan Masukkan Nama");
 frmvalidator.addValidation("namag","alpha_s","Masukan NIS Anda Bukan Simbol");
 frmvalidator.addValidation("namag","simbol","Masukan NIS Anda Bukan Angka");
 frmvalidator.addValidation("jk","req","Silakan Masukkan jk");
 frmvalidator.addValidation("tgl_lahir","req","Silakan Masukkan tgl_lahir");
 frmvalidator.addValidation("alamat","req","Silakan Masukkan alamat");
 frmvalidator.addValidation("no_hp","req","Silakan Masukkan No Telpon Orang tua");
 frmvalidator.addValidation("no_hp","simbol","Masukan No Telpon Anda Bukan Simbol");
 frmvalidator.addValidation("no_hp","numeric","Masukan No Telpon Bukan Huruf");
</script>    
	</body>
</html>
<?php
        break;
    
        case "inputact":
      
             $id_nik = $_POST['id_nik'];
			 $namag = $_POST['namag'];
			 $jk = $_POST['jk'];
			 $tgl_lahir = $_POST['tgl_lahir'];
			 $alamat = $_POST['alamat'];
			 $no_hp = $_POST['no_hp'];
             $qinput = "
          INSERT INTO t_guru
          (id_nik, namag, jk, tgl_lahir, alamat, no_hp)
          VALUES
          ('$id_nik', '$namag', '$jk', '$tgl_lahir', '$alamat', '$no_hp')
        ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_guru WHERE nik = '$nik'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nama Guru Sudah Ada');
              document.location='adminmainapp.php?unit=m_guru&act=input';
              </script>";
          } 
		  else if (strlen($id_nik) <=17) {
          echo "<script> alert('NIK harus 18 digit');
              document.location='adminmainapp.php?unit=m_guru&act=input';
              </script>";
          } 
		  else if (!empty($_POST['id_nik'])){
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=m_guru&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_guru = $_GET['kd_guru'];
        $qupdate = "SELECT * FROM t_guru WHERE kd_guru = '$kd_guru'";
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
							<li>Edit Data Guru</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Guru</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 
                                    
              <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post" action="adminmainapp.php?unit=m_guru&act=updateact">    
                       <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">NIK</label>
                            <div class="col-sm-9">
							 <input class="col-xs-10 col-sm-5" type="hidden" name="kd_guru" id="kd_guru" required="required" value="<?php echo $dupdate['kd_guru'] ?>" autofocus="autofocus" />
                            
                                <input class="col-xs-10 col-sm-5" type="text" name="id_nik" id="id_nik" required="required" value="<?php echo $dupdate['id_nik'] ?>" autofocus="autofocus" />
                            </div>
                       </div>   
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Guru</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="namag" id="namag" required="required" value="<?php echo $dupdate['namag'] ?>"  />
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
                   <label class="col-sm-3 control-label no-padding-right"  for="alamat">Alamat</label>
                   <div class="col-sm-9">
                   <textarea class="form-control limited" name="alamat" id="alamat"><?php echo $dupdate['alamat'] ?> </textarea>	
                    </div>
                       </div>
					   
					   <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right"  for="no_hp">No HP</label>	
                   <div class="col-sm-9">
                    <input class="col-xs-10 col-sm-5" type="text" name="no_hp" id="no_hp" required="required" value="<?php echo $dupdate['no_hp'] ?>"  />
                            </div>
                       </div>
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=m_guru&act=datagrid'">kembali</button>
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
 frmvalidator.addValidation("id_nik","req","Silakan Masukkan Nis");
 frmvalidator.addValidation("id_nik","simbol","Masukan NIS Anda Bukan Simbol");
 frmvalidator.addValidation("id_nik","numeric","Masukan NIS Anda Bukan Huruf");
 frmvalidator.addValidation("namag","req","Silakan Masukkan Nama");
 frmvalidator.addValidation("namag","alpha_s","Masukan NIS Anda Bukan Simbol");
 frmvalidator.addValidation("namag","simbol","Masukan NIS Anda Bukan Angka");
 frmvalidator.addValidation("jk","req","Silakan Masukkan jk");
 frmvalidator.addValidation("tgl_lahir","req","Silakan Masukkan tgl_lahir");
 frmvalidator.addValidation("alamat","req","Silakan Masukkan alamat");
 frmvalidator.addValidation("no_hp","req","Silakan Masukkan No Telpon Orang tua");
 frmvalidator.addValidation("no_hp","simbol","Masukan No Telpon Anda Bukan Simbol");
 frmvalidator.addValidation("no_hp","numeric","Masukan No Telpon Bukan Huruf");
</script>
	</body>
</html>
 <?php
        break;
    
            case "updateact":
             $kd_guru = $_POST['kd_guru'];
			 $id_nik = $_POST['id_nik'];
			 $namag = $_POST['namag'];
			 $jk = $_POST['jk'];
			 $tgl_lahir = $_POST['tgl_lahir'];
			 $alamat = $_POST['alamat'];
			 $no_hp = $_POST['no_hp'];
        $qupdate = "
          UPDATE t_guru SET
			id_nik = '$id_nik',
            namag = '$namag',
			jk = '$jk',
			tgl_lahir = '$tgl_lahir',
			alamat = '$alamat',
			no_hp = '$no_hp'
			WHERE
            kd_guru = '$kd_guru'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=m_guru&act=datagrid");
                 break;
    
        case "delete":
              $id_nik = $_GET['id_nik'];
        $qdelete = "
          DELETE  FROM t_guru
       
          WHERE
            id_nik = '$id_nik'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=m_guru&act=datagrid");
        break;
}