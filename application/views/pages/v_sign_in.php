<style>
  div.jumbotron {
    -moz-box-shadow:    -0.5px -0.5px 0.5px 0.5px rgba(0, 0, 0, 0.2);
      -webkit-box-shadow: -0.5px -0.5px 0.5px 0.5px rgba(0, 0, 0, 0.2);
      box-shadow: -0.2px -0.2px 0.2px 0.2px rgba(0, 0, 0, 0.2), 2px 3px 1px rgba(0, 0, 0, 0.19);
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
                  <a href="<?= base_url('welcome/logout') ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a>
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

		<div class="container-fluid" style="margin-top: 120px">
  		<div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="jumbotron" style="background-color: #fff; padding-right: 30px; padding-left: 30px;">
            <div class="form-group">
              <center>
                <div class="text-center"><img src="<?= base_url('assets/img/zoonosis.jpg'); ?>" alt="Klorofil Logo" width="150px"></div>
                <h4>Login to your account</h4>
                <br>
              </center>
            </div>
            <?php echo $this->session->userdata('err'); ?>
              <form method="POST" action="<?= base_url('welcome/proses_login'); ?>">
                <div class="form-group">
                  <label class="control-label sr-only">Username</label>
                  <input type="text" class="form-control input-lg" id="username" name="username"placeholder="Username" autocomplete="off" required="true" value="<?php if(isset($_COOKIE["username"])) echo $_COOKIE['username']; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label sr-only">Password</label>
                  <input type="password" class="form-control input-lg" id="password" name="password"placeholder="Password" autocomplete="off" required="true" value="<?php if(isset($_COOKIE["password"])) echo $_COOKIE['password']; ?>">
                </div>
                <div class="form-group clearfix">
                  <label class="fancy-checkbox element-left">
                    <input type="checkbox" name="remember_me" <?php if(isset($_COOKIE['remember'])) {echo 'checked'; }else {echo '';} ?>>
                    <span>Ingat saya</span>
                  </label>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-block btn-primary btn-lg" name="masuk" value="Masuk" />
                </div>
            </form>   
            <div class="form-group">
              <p style="font-size: 15px">Belum mempunyai akun? <a href="<?= base_url('sign-up');?>" title="Buat Akun">Buat Akun</a></p>
            </div>
          </div>
        </div>  
      </div>
		</div>
</div>

<?php $this->load->view('pages/v_footer'); ?>