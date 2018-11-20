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

    

	<div class="container" style="margin-top: 100px">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="text-left">
							<h4 class="panel-title"><?= 'Profil '.$user->name; ?></h4>
						</div>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<img src="<?= base_url('assets/img/user/'.$user->photo); ?>" alt="" class="img-responsive img-circle" alt="Avatar">
							</div>
							<div class="col-md-9">
								<ul class="list-group">
									<li class="list-group-item">
										<span class="lnr lnr-user"></span> <?= $user->name; ?>
									</li>
									<li class="list-group-item">
										<span class="lnr lnr-text-format"></span> <?= $user->username; ?>
									</li>
									<li class="list-group-item">
										<span class="lnr lnr-lock"></span> <?= $user->password; ?>
									</li>
									<li class="list-group-item">
										<span class="lnr lnr-map-marker"></span> <?= $user->address; ?>
									</li>
									<li class="list-group-item">
										<span class="lnr lnr-smartphone"></span> <?= $user->handphone; ?>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="panel-footer">
						<div class="text-right">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalProfile" title="Ubah Profil">
								<span class="fa fa-edit"></span> UBAH PROFIL
							</button>
						</div>
					</div>

				</div>
			</div>

			<div class="col-md-6 col-sm-12">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Grafik Ekonomi Indonesia Tahun 2018</h3>
					</div>
					<div class="panel-body">
						<div id="demo-line-chart" class="ct-chart"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- MYMODAL -->
	<div class="modal fade" id="modalProfile" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- FORM-USER-->
				<?php echo form_open_multipart('', ['id'=>'form-user']); ?>
				<!-- MODAL HEADER -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" title="Tutup Modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<!-- END MODAL HEADER -->
				<!-- MODAL BODY -->
				<div class="modal-body">
					<input type="hidden" name="id_user" value="<?= $user->id_user; ?>">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="container-fluid">
								<div class="form-group">
									<label class="control-label">Nama *</label>
									<input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" autocomplete="off" value="<?= $user->name; ?>">
								</div>
								<div class="form-group">
									<label class="control-label">Username *</label>
									<input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= $user->username; ?>" autocomplete="off">
								</div>
								<input type="hidden" name="username_2" value="<?= $user->username;?>" autocomplete="off">
								<div class="form-group">
									<label class="control-label">Password *</label>
									<input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= $user->password; ?>" autocomplete="off">
								</div>
								<div class="form-group">
									<label class="control-label">HP *</label>
									<input type="text" name="handphone" id="handphone" class="form-control" placeholder="Handphone" value="<?= $user->handphone; ?>" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="container-fluid">
								<div class="form-group">
									<label class="control-label">Alamat *</label>
									<textarea name="address" id="address" class="form-control" rows="5" placeholder="Alamat"><?= $user->address; ?></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">Ubah Foto</label>
									<input type="file" class="form-control" name="photo" id="photo">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END MODAL BODY -->
				<!-- MODAL FOOTER -->
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" title="Submit">
						<i class="fa fa-paper-plane-o"></i> SUBMIT
					</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal" title="Tutup Modal" onclick="resetForm()">
						<i class="fa fa-times"></i> TUTUP
					</button>
				</div>
				<!-- END MODAL FOOTER -->
				<?php echo form_close(); ?>
				<!-- END FORM-USER -->
			</div>
		</div>
	</div>
	<!-- END MYMODAL -->

	<script src="<?= base_url('assets/vendor/sweetalert/sweetalert.min.js') ?>"></script>

	<script>
		$(document).ready(function() {
			var options;

			var data = {
				labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				series: [
					[200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
				]
			};

			// line chart
			options = {
				height: "300px",
				showPoint: true,
				axisX: {
					showGrid: false
				},
				lineSmooth: false,
			};

			new Chartist.Line('#demo-line-chart', data, options);
		});

		$('#form-user').on('submit', function(e) {
			e.preventDefault();

			var data = new FormData();
			data.append('id_user', $('[name="id_user"]').val());
			data.append('username_2', $('[name="username_2"]').val());
			data.append('username', $('#username').val());
			data.append('password', $('#password').val());
			data.append('name', $('#name').val());
			data.append('address', $('#address').val());
			data.append('handphone', $('#handphone').val());
			data.append('photo', $('#photo')[0].files[0]);

			$.ajax({
				url: '<?php echo base_url('member/editProfil'); ?>',
				data: data,
				type: 'post',
				dataType: 'json',
				processData: false,
				contentType: false,
				success: (response) => {
					console.log(response);

					if(response.success == true) {
						resetForm();
						swal('Sukses', 'Berhasil mengubah data profil anda!', 'success')
						.then((value) => {
							if(value) {
								window.location.reload();
							}
						});
						$('#modalProfile').modal('hide');
					} else {
						$.each(response.messages, (key, val) => {
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
				error: (xhr, stat, err) => {
					console.error(err);
				}
			});
		});

		function resetForm() {
			$('#form-user')[0].reset();

			$('div.form-group')
			.removeClass('has-error')
			.removeClass('has-success')
			.find('.help-block')
			.remove();
		}

	</script>

	<?php $this->load->view('pages/v_footer');?>