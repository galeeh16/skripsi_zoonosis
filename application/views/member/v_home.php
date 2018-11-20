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
            <a href="<?php echo base_url('home') ?>" title="Home" class="active"><span class="lnr lnr-home"></span> Home</a>
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
          <a class="btn btn-sign-in" id="btn-grad" href="<?= base_url('sign-in'); ?>" title="Masuk ke aplikasi"><span>SIGN IN <i class="fa fa-sign-in"></i></span></a>
         </div>
      <?php } ?>
      </div>

      </div>
    </nav>
    <!-- END NAVBAR -->

<div class="container" style="margin-top: 110px">
	<div class="panel">
		<div class="panel-heading">
			<h4 class="lead">HOME MEMBER</h4>
			<div class="row">
				<div class="col-md-6">
					<div class="alert alert-info alert-dismissable" id="info-msg">
						<button type="button" class="close" data-dismiss="alert" title="Ok saya mengerti">&times;</button>
						<p><i class="fa fa-info-circle"></i> Pilih gejala dengan mencentang checkbox yang tersedia!</p>
					</div>
					<?= $this->session->flashdata('err'); ?>
				</div>
			</div>
		</div>
		<!-- PANEL BODY -->
		<div class="panel-body">
			<!-- ROW -->
			<div class="row">
				<!-- FORM -->
				<?php echo form_open('dempster/hitung'); ?>
				<?php $no = 0; $nn = 15; ?>
				<?php foreach ($gejala as $key => $value): ?>
					<?php if(($key % 2) == 0): ?>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<?php echo $no += 1; ?>
									<input type="checkbox" name="id_gejala[]" value="<?php echo $value['id_gejala'] ?>"> <?php echo $value['nama_gejala'] ?>
							</div>
						</div>
					<?php else: ?>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<?php echo $nn += 1; ?>
									<input type="checkbox" name="id_gejala[]" value="<?php echo $value['id_gejala'] ?>"> <?php echo $value['nama_gejala'] ?>
							</div>
						</div>
					<?php endif ?>
				<?php endforeach ?>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="proses" value="Proses">
				</div>
				</form>
				<!-- END FORM -->
			</div>
			<!-- END ROW -->
		</div>
		<!-- END PANEL BODY -->
	</div>
</div>

</div>

<script>
	$(document).ready(function() {
		$('#info-msg').slideDown('slow').delay(5000).slideUp('slow');
	});
</script>