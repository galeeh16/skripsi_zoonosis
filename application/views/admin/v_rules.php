<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li>
							<a href="<?= base_url('admin/dashboard'); ?>" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span>
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
							<a href="<?= base_url('admin/rules') ?>" class="active"><i class="lnr lnr-database"></i> <span>Data Rules</span>
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
					
					<div class="row">
						<div class="col-md-12">

							<div class="panel">
								<div class="panel-body">
									<!-- TOMBOL TAMBAH USER -->
									<div class="form-group">
										<button type="button" class="btn btn-primary" title="Tambah Rules" onclick="submit('tambah')"><i class="fa fa-plus-square"></i>  TAMBAH RULES</button>
									</div>
									<!-- END TOMBOL TAMBAH USER -->

									<!-- TABLE USERS -->
									<!-- <div class="table-responsive"> -->
										<table id="table-rules" class="table table-bordered table-condensed table-hover table-striped">
											<thead>
											<tr >
												<th width="2%">No</th>
												<th>Gejala</th>
												<th>Penyakit</th>
												<th width="12%">CF (Bobot)</th>
												<th width="5%">Ubah</th>
												<th width="5%">Hapus</th>
											</tr>
											
										</thead>
										</table>
									<!-- </div> -->
									<!-- END TABLE USERS -->
								</div>
							</div>
							
						</div>
					</div>					
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

	<!-- JAVASCRIPT -->
	<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
	<script src="<?php echo base_url('assets/vendor/chartist/js/chartist.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/scripts/klorofil-common.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/datatable/media/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/vendor/datatable/media/js/dataTables.bootstrap.min.js') ?>"></script>

	<!-- DATATABLE SCRIPT -->
	<script>
		var dataTable, msg, url = '';
		var url_datatables = "<?php echo base_url('admin/rules/fetch_rules') ?>";
		
		$(document).ready(function() {

			dataTable = $('#table-rules').DataTable({
					"processing": true,
					"serverSide": true,
					"order": [],
					"ajax": {
						url: url_datatables,
						type: "POST"
					},
					"columnDefs": [
						{
							"target": [0, 3, 4],
							"orderable": false
						}
					],
					"dom": "<'row'<'col-sm-8'l><'col-sm-4 col-md-4'f>>" +
						   "<'row'<'col-sm-12'tr>>" +
						   "<'row'<'col-sm-5'i><'col-sm-7'p>>",
					"language": {
			      searchPlaceholder: "Masukkan keywords...",
			      processing: '<center><img src="<?php echo base_url()?>assets/img/loading.gif" width="50" height="50"/></center>'
			  	}
				});

		});

	</script>