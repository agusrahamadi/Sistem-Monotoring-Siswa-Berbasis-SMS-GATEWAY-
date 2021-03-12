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
                <li>SMS</li>
		<li>Pesan Keluar</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Pesan Keluar
                </h1>
            </div>
			 <h1>
                  
                    <a href="?unit=sl_psnkeluar">
                        <button class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
                    </a>
					<a href="unit/sxp_psnkeluar.php">
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
                                        <th style="width:50px; text-align: center">No.</th>
                                        <th style="width:130px; text-align: center">No Tujuan</th>
                                        <th style="width:130px; text-align: center">Waktu</th>
                                        <th style="width:800px; text-align: center">Pesan</th>
                                        <th style="width:100px;text-align: center">Status</th>
                                        <th style="width:100px; text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM sentitems ORDER BY SendingDateTime DESC ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
										  $st="";
                            if($ddatagrid['Status']=='SendingError')
                            {
                                    $st='<span class="label label-danger">Tidak Terkirim</span>';
                            }
                            else if ($ddatagrid['Status']=='SendingOKNoReport')
                            {
                                    $st= '<span class="label label-success">Terkirim</span>';
                            }
										 echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
											  <td style= text-align:left  >$ddatagrid[DestinationNumber]</td>
                                             <td style= text-align:left  >$ddatagrid[SendingDateTime]</td>
                                             <td style= text-align:left  >$ddatagrid[TextDecoded]</td>
                                             <td style= text-align:center  >$st</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=s_psnklr&act=delete&ID=$ddatagrid[ID] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
    
    
        case "delete":
              $ID = $_GET['ID'];
        $qdelete = "
          DELETE  FROM sentitems
       
          WHERE
            ID = '$ID'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=s_psnklr&act=datagrid");
        break;
}