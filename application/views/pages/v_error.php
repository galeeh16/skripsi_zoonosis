 <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="navbar-header brand" style="margin-left: 80px;">
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
            <a href="<?php echo base_url('bantuan') ?>" title="Bantuan"><span class="lnr lnr-question-circle"></span> Bantuan</a>
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
		
	<br><br>
   <div class="container" style="margin-top: 120px">
   	<center>
   		<h1 style="color: #FF1F4E; font-family: sans-serif; font-size: 70px; font-weight: 700; margin-bottom: 0px;">404</h1>
   		<h1 style="color: #FF1F4E; font-family: sans-serif; font-size: 40px; font-weight: 700; margin-top: 0px;">Maaf, Halaman Tidak Ditemukan!</h1>
   	</center>
   </div>