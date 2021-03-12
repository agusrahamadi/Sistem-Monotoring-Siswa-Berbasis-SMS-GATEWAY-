<nav class="aboutnav navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <ul class="nav navbar-nav"href="index.html" >
                
                <a class="navbar-brand" href="index.html" />SMK DARUSSALAM MATAPURA</a>
            </ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
          <li><a href="mainapp.php?unit=home_unit">Beranda</a></li>
            
            <li><a href="mainapp.php?unit=informasi_unit">Data Siswa</a></li>
			 <li><a href="mainapp.php?unit=kontak_unit">Kontak Kami</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav>
<div class="aboutus container-fluid">
        <div class="row">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <h2>
                     <span style="color: #228b22;">Informasi Data Siswa</span>
                </h2>
                <br>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
									$no=1; 
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
                                                            
                                        </tr>
                                        ";
                                        $no++;
                                     }
                                     ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                
               
                </div><!-- col -->
            </div><!-- container -->
        </div><!-- row -->
    </div><!-- sitemap -->
