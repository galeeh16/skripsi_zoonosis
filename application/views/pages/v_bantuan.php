	<style type="text/css" media="screen">
		div.well, ul.list-group {
			-moz-box-shadow:    -0.5px -0.5px 0.5px 0.5px rgba(0, 0, 0, 0.2);
  		-webkit-box-shadow: -0.5px -0.5px 0.5px 0.5px rgba(0, 0, 0, 0.2);
			box-shadow: -0.2px -0.2px 0.2px 0.2px rgba(0, 0, 0, 0.2), 2px 3px 1px rgba(0, 0, 0, 0.19);
		}
		kbd {
			border-radius: 3px;
		}
		.btn.btn-link {
			border: none;
			box-shadow: none;
		}
		div.col-md-12, div.panel {
			margin-top: 0px;
			margin-bottom: 0px;
			border: 0.5px solid #eee;
		}
	</style>

	<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="navbar-header brand" style="margin-left: 80px;"">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span> 
        </button>
        <a href="<?= base_url() ?>">
          <img src="<?= base_url('assets/img/zoonosis.jpg') ?>" alt="Klorofil Logo" class="img-responsive logo" width="130">
        </a>
      </div>
      <div class="container">

      <div id="navbar-menu">
        <ul class="nav navbar-nav">
          <li class="navbar-link">
            <a href="<?php echo base_url('home') ?>" title="Home"><span class="lnr lnr-home"></span> Home</a>
          </li>    
          <li class="navbar-link">
            <a href="<?php echo base_url('bantuan') ?>" title="Bantuan" class="active"><span class="lnr lnr-question-circle"></span> Bantuan</a>
          </li>    
          <li class="navbar-link">
            <a href="<?php echo base_url('informasi-penyakit') ?>" title="Informasi Penyakit"><span class="lnr lnr-bug"></span> Informasi Penyakit</a>
          </li>    
          <li class="navbar-link">
            <a href="<?php echo base_url('tentang-kami') ?>" title="Tentang Kami"><span class="lnr lnr-code"></span> Tentang Kami</a>
          </li>    
        </ul>

      <?php if($this->session->has_userdata('logged_in')) { ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if($this->session->userdata('photo') == ''): ?>
                  <img src="<?= base_url('assets/img/user/user.png')?>" class="img-circle" alt="Avatar"> 
                <?php else: ?>
                  <img src="<?= base_url('assets/img/user/'.$this->session->userdata('photo'))?>" class="img-circle" alt="Avatar"> 
                <?php endif ?>
                  <span><?php echo $this->session->userdata('name'); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?= base_url('member/profile'); ?>"><i class="lnr lnr-user"></i> <span>My Profile</span></a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?= base_url('member/diagnose'); ?>"><i class="lnr lnr-bug"></i> <span>Diagnose</span></a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?= base_url('member/news'); ?>"><i class="lnr lnr-alarm"></i> <span>News</span></a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?= base_url('home/logout') ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a>
                </li>
              </ul>
          </li>
        </ul>
      <?php } else { ?>
         <div class="navbar-btn navbar-btn-right">
          <a class="btn btn-sign-in" href="<?= base_url('sign-in'); ?>" title="Masuk ke aplikasi" style="border-radius: 50px"><span>SIGN IN <i class="fa fa-sign-in"></i></span></a>
         </div>
      <?php } ?>
      </div>

      </div>
    </nav>
    <!-- END NAVBAR -->
	

	<div class="container" style="margin-top: 110px">
		<center><h3 class="page-title">Selamat datang di pusat bantuan Zoonosis</h3></center>

		<div class="row">

			<div class="col-md-12 col-sm-12" style="border: none">
				<!-- PANEL DEFAULT -->
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Membuat Akun <span class="fa fa-user-plus"></span></h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						</div>
					</div>
					<div class="panel-body">
						<p>Objectively network visionary methodologies via best-of-breed users. Phosfluorescently initiate go forward leadership skills before an expanded array of infomediaries. Monotonectally incubate web-enabled communities rather than process-centric.</p>
					</div>
				</div>
				<!-- END PANEL DEFAULT -->
			</div>

			<div class="col-md-12 col-sm-12" style="border: none">
				<!-- PANEL DEFAULT -->
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Mengubah Profil <span class="fa fa-cog"></span></h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						</div>
					</div>
					<div class="panel-body">
						<p>Objectively network visionary methodologies via best-of-breed users. Phosfluorescently initiate go forward leadership skills before an expanded array of infomediaries. Monotonectally incubate web-enabled communities rather than process-centric.</p>
					</div>
				</div>
				<!-- END PANEL DEFAULT -->
			</div>

			<div class="col-md-12 col-sm-12" style="border: none">
				<!-- PANEL DEFAULT -->
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Mendiagnosa <span class="fa fa-random"></span></h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						</div>
					</div>
					<div class="panel-body">
						<p>Objectively network visionary methodologies via best-of-breed users. Phosfluorescently initiate go forward leadership skills before an expanded array of infomediaries. Monotonectally incubate web-enabled communities rather than process-centric.</p>
					</div>
				</div>
				<!-- END PANEL DEFAULT -->
			</div>

		</div>
		<!-- end row -->
	</div>
	<!-- end container -->

<br>
<br>
	<?php $this->load->view('pages/v_footer'); ?>

