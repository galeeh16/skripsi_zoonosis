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
            <a href="<?php echo base_url('bantuan') ?>" title="Bantuan" ><span class="lnr lnr-question-circle"></span> Bantuan</a>
          </li>    
          <li class="navbar-link">
            <a href="<?php echo base_url('informasi-penyakit') ?>" title="Informasi Penyakit"><span class="lnr lnr-bug"></span> Informasi Penyakit</a>
          </li>    
          <li class="navbar-link">
            <a href="<?php echo base_url('tentang-kami') ?>" title="Tentang Kami" class="active"><span class="lnr lnr-code"></span> Tentang Kami</a>
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

<div class="container" style="margin-top: 120px">
	<div class="row">
		<div class="col-md-8">
			<div class="jumbotron">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos magni optio eveniet. Optio praesentium molestiae laborum, necessitatibus dolores soluta ea porro voluptatibus harum magnam explicabo ducimus, dolor quas. Doloribus aliquid repudiandae labore mollitia enim explicabo amet perferendis assumenda beatae dolorem iusto, cupiditate hic, deserunt incidunt, fugit deleniti, maxime placeat provident. Doloribus assumenda laborum blanditiis non reiciendis voluptatum laboriosam ducimus, eius vero tenetur aspernatur vitae quis commodi harum. Dolores nostrum quis dolorum eum ipsa quo, accusamus rem, doloribus laudantium expedita sequi voluptatum omnis quia molestiae id consectetur atque nemo, porro eius. Modi neque, sint architecto soluta eligendi rem id ratione nemo!</p>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel">
				<div class="panel-heading">
					<h4 class="panel-title text-center">AUTHOR</h4>
				</div>
				<div class="panel-body">
					<center><img class="img-responsive img-circle" src="<?= base_url('assets/img/hutama.jpg') ?>" alt="Avatar" width="100px" /></center>
					<br>
					<table class="table">
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>Hutama Mahendra D</td>
						</tr>
						<tr>
							<td>Asal</td>
							<td>:</td>
							<td>Magelang, Jawa Tengah</td>
						</tr>
						<tr>
							<td>Pendidikan</td>
							<td>:</td>
							<td>S-1 Teknik Informatika UPN Veteran Yogyakarta</td>
						</tr>
					</table>

					<div class="form-group">
						<div class="form-group">
							<h4 class="panel-title">Follow me :</h4>
						</div>
						<div class="form-group">
	            <a href="https://www.instagram.com/galihanggorojati/" class="fa fa-instagram logo" target="_blank" title="Follow me on instagram" style="font-size: 24px; color: #D23097; margin-right: 5px"></a>
	            <a href="https://www.twitter.com/JTGalih/" class="fa fa-twitter logo" target="_blank" title="Follow me on twitter" style="font-size: 24px; color: #00AAFF; margin-right: 4px;"></a>
	            <a href="https://www.facebook.com/galihanggorojati" class="fa fa-facebook logo" target="_blank" title="Follow me on facebook" style="font-size: 21px; color: #0060FF; margin-right: 5px;"></a>
	            <a href="https://github.com/galeeh16" class="fa fa-github-alt logo" target="_blank" title="Follow me on github" style="font-size: 24px; color: #24292e;"></a>
	          </div>  
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('pages/v_footer') ?>