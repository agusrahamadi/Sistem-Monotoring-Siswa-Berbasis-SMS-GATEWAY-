<body class="no-skin">
        <?php
        if (!isset($_SESSION['username']))
    {
       header("location:dashboard.php");
    }
        require_once '../lib/koneksi.php';
         $qupdate = "SELECT * FROM  t_admin WHERE username = '".$_SESSION['username']."'";
        $rupdate = mysqli_query($mysqli, $qupdate);
        $dupdate = mysqli_fetch_assoc($rupdate);
        ?>
        <div id="navbar" class="navbar navbar-default ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
                </button>

            <div class="navbar-header pull-left">
                <a href="adminmainapp.php?unit=dashboard" class="navbar-brand"><small><i class="fa fa-desktop"></i>  SMK DARUSSALAM MATAPURA </small></a>
            </div>

            <div class="navbar-buttons navbar-header pull-right" role="navigation">
              <ul class="nav ace-nav">
                <li class="light-blue dropdown-modal">
                  <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                    <span class="user-info"><small>Selamat Datang</small>  <?php echo $dupdate['username']; ?></span>
                    <i class="ace-icon fa fa-caret-down"></i>
                  </a>
					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Keluar
									</a>
								</li>
							</ul>
                  
                </li>
              </ul>
            </div>
        </div><!-- /.navbar-container -->
    </div>