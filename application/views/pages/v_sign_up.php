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
		
		<div class="container" style="margin-top: 100px;">
			<div class="row">
				<div class="col-md-5">
					<div class="panel">
						<div class="panel-body">
							<!-- FORM DAFTAR -->
							<div class="form-group">
								<center>
									<h2><span style="color: #3ec1d5">ZOO</span>NOSIS</h2>
									<p>Create your account</p>
								</center>
							</div>
							
						
							<form class="form-auth-small" method="POST" action="<?php echo base_url('welcome/proses_daftar') ?>" id="form-daftar">
								<div class="form-group">
									<label class="control-label">Nama Lengkap</label>
									<input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap">
								</div>
								<div class="form-group">
									<label class="control-label">Username</label>
									<input type="text" name="username" id="username" class="form-control" placeholder="Username">
								</div>
								<div class="form-group">
									<label class="control-label">Password</label>
									<input type="password" name="password" id="password" class="form-control" placeholder="Password">
								</div>
								<div class="form-group">
									<label class="control-label">Konfirmasi Password</label>
									<input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password">
								</div>	
								<div class="form-group">
									<label class="control-label">No. Handphone</label>
									<input type="text" name="handphone" id="handphone" class="form-control" placeholder="Nomor Handphone">
								</div>							
								<div class="form-group">
									<input type="submit" class="btn btn-primary btn-lg btn-block" value="Daftar" name="daftar"  />
								</div>
							</form>
							<!-- END FORM -->
						</div>
					</div>
				</div>

				<div class="col-md-7">
					<center>
						<img src="<?php echo base_url().'assets/img/add-user.png'?>" alt="Add-User" width="170">
						<h2>Daftarkan Diri Anda</h2>

						<img src="<?php echo base_url().'assets/img/computer.png'?>" width="170" height="170">
						<h4>Dengan mendaftar anda dapat mendiagnosa penyakit zoonosis</h4>
					</center>
			</div>

		</div>

	<?php $this->load->view('pages/v_footer') ?>

	<script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/jquery-blockUI/jquery.blockUI.js') ?>"></script>

	<script>

		$(document).ready(function() {

			$('#form-daftar').on('submit', function(e) {
				e.preventDefault();
				var form = $(this);
				var data = form.serialize();

				$.ajax({
					url: form.attr('action'),
	 				type: 'post',
	 				data: data,
	 				dataType: 'json',
	 				beforeSend: function() {
	 					$.blockUI({
							message: '<img src="<?= base_url()?>assets/img/loading.gif" width="100px"><p>Please wait...</p>'
						});
	 				},
					success: (result) => {
						console.log(result);

						if(result.success == true) {
							resetForm();
							swal("Sukses!", "Anda telah berhasil mendaftar!", "success");
						} else {
							$.each(result.messages, (key, val) => {
								var el = $('#' + key);

								el.closest('div.form-group')
									.removeClass('has-error')
									.removeClass('has-success')
									.addClass(val.length > 0 ? 'has-error' : 'has-success')
									.find('.help-block')
									.remove();

								el.after(val);
							});
						}
					},
					complete: function() {
						$.unblockUI();
					},
					error: (xhr, stat, err) => {
						console.log(err);
					}
				});
			});	
		});

		function resetForm() {
			$('#form-daftar')[0].reset();

			$('div.form-group')
			.removeClass('has-error')
			.removeClass('has-success')
			.find('.help-block')
			.remove();
		}

	</script>



