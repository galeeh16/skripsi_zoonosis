		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li>
							<a href="<?= base_url('admin/dashboard'); ?>" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/user') ?>" class=""><i class="lnr lnr-database"></i> <span>Data User</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/gejala') ?>" class=""><i class="lnr lnr-database"></i> <span>Data Gejala</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/penyakit') ?>" class=""><i class="lnr lnr-database"></i> <span>Data Penyakit</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/rules') ?>" class=""><i class="lnr lnr-database"></i> <span>Data Rules</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/news') ?>" class=""><i class="lnr lnr-alarm"></i> <span>Data News</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- PANEL -->
					<div class="panel panel-headline">
						<!-- PANEL HEADING -->
						<div class="panel-heading">
							<h3 class="panel-title">Selamat datang mas <?= $this->session->userdata('name'); ?></h3>
							<p><label class="label label-info">Period: <?= date('d, M Y');?></label></p>
						</div>
						<!-- END PANEL HEADING -->
						<!-- PANEL-BODY -->
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="lnr lnr-users"></i></span>
										<p>
											<span class="number"><?= $total_user->jumlah; ?></span>
											<span class="title">Total Pengguna</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="lnr lnr-database"></i></span>
										<p>
											<span class="number"><?= $total_gejala->jumlah; ?></span>
											<span class="title">Total Gejala</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="lnr lnr-bug"></i></span>
										<p>
											<span class="number"><?= $total_penyakit->jumlah; ?></span>
											<span class="title">Total Penyakit</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-diamond"></i></span>
										<p>
											<span class="number"><?= $total_rules->jumlah; ?></span>
											<span class="title">Total Rules</span>
										</p>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title">Grafik Ekonomi Indonesia 2020</h3>
										</div>
										<div class="panel-body">
											<div id="grafik" class="ct-chart"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PANEL BODY -->
					</div>
					<!-- END PANEL -->
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 <a href="https://if.upnyk.ac.id" target="_blank" title="IF UPNYK">IF UPNYK</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->

		<!-- Javascript -->
		<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
		<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
		<script src="<?= base_url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
		<script src="<?= base_url('assets/vendor/chartist/js/chartist.min.js'); ?>"></script>
		<script src="<?= base_url('assets/scripts/klorofil-common.js'); ?>"></script>
		<script src="<?= base_url('assets/vendor/sweetalert/sweetalert.min.js'); ?>"></script>

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

			new Chartist.Line('#grafik', data, options);
		});
		</script>