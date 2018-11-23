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
							<a href="<?= base_url('admin/rules') ?>" class=""><i class="lnr lnr-database"></i> <span>Data Rules</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/news') ?>" class="active"><i class="lnr lnr-alarm"></i> <span>Data News</span>
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
									<!-- TOMBOL TAMBAH PENGUMUMAN -->
									<div class="form-group">
										<button type="button" class="btn btn-primary" title="Tambah Pengumuman" onclick="submit('tambah')"><i class="fa fa-plus-square"></i>  TAMBAH PENGUMUMAN</button>
									</div>
									<!-- END TOMBOL TAMBAH PENGUMUMAN -->

									<!-- TABLE USERS -->
									<!-- <div class="table-responsive"> -->
										<table id="table-news" class="table table-bordered table-condensed table-hover table-striped">
											<thead>
											<tr >
												<th width="2%">No</th>
												<th>Nama</th>
												<th>Judul</th>
												<th>Isi Pengumuman</th>
												<th>Tanggal</th>
												<th>Jam</th>
												<th>Ubah</th>
												<th>Hapus</th>
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

	<!-- MODAL NEWS -->
	<div class="modal fade" id="modal-news" data-backdrop="static" data-l=keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<?= form_open('#', ['id'=>'form-news']); ?>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id_news">
						<div class="form-group">
							<label class="control-label">Judul</label>
							<input type="text" class="form-control" name="title" id="title">
						</div>
						<div class="form-group">
							<label class="control-label">Isi Pengumuman</label>
							<textarea name="description" id="description" class="form-control" rows="9"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" title="Batal">
							<span class="fa fa-send"></span> SUBMIT
						</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal" title="Batal">
							<span class="fa fa-times"></span> BATAL
						</button>
					</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
	<!-- END MODAL NEWS -->

	<!-- JAVASCRIPT -->
	<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
	<script src="<?= base_url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
	<script src="<?= base_url('assets/vendor/chartist/js/chartist.min.js'); ?>"></script>
	<script src="<?= base_url('assets/scripts/klorofil-common.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/sweetalert/sweetalert.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/datatable/media/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatable/media/js/dataTables.bootstrap.min.js') ?>"></script>

	<style>
		.swal-button--cancel {
			background-color: #EE5773;
			color: #fff;
		}
	</style>

	<script>
		
		var dataTable = '';
		var url, msg = '';
		
		$(document).ready(function() {

			dataTable = $('#table-news').DataTable({
					"processing": true,
					"serverSide": true,
					"order": [],
					"ajax": {
						url: "<?php echo base_url().'admin/news/fetch_news' ?>",
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
			      processing: '<center><img src="<?php echo base_url()?>assets/img/loading.gif" width="50" height="50" class="img-processing"/></center>'
			  	},
				});

				// FORM SUBMIT
				$('#form-news').on('submit', function(e) {
					e.preventDefault();
					var form = $(this);

					$.ajax({
						url: url,
						data: form.serialize(),
						type: 'post',
						dataType: 'json',
						success: (result) => {
							console.log(result);
							if(result.success == true) {
								resetForm();
								$('#modal-news').modal('hide');
								swal("Sukses!", msg, "success")
								.then((value) => {
									// window.location.reload();
									dataTable.ajax.reload();
								});
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
						error: (xhr, stat, err) => {
							console.error(err);
						}
					});

				});
				// END FORM SUBMIT


			});

			function submit(arg) {
				$('#modal-news').modal('show');
				if(arg == 'tambah') {
					$('.modal-title').text('Tambah Pengumuman');
					url = "<?php echo base_url('admin/news/add_news') ?>";
					msg = 'Berhasil menambahkan pengumuman';
				} else {
					$('.modal-title').text('Edit Pengumuman');
					url = "<?php echo base_url('admin/news/edit_news') ?>";
					msg = 'Berhasil mengubah data pengumuman';

					$.ajax({
						url: "<?php echo base_url('admin/news/get_id') ?>",
						type: 'POST',
						data: 'id_news='+arg,
						dataType: 'JSON',
						success: response => {
							console.log(response);
							$('[name="id_news"]').val(response.id_news);
							$('#title').val(response.title);
							$('#description').val(response.description);
						},
						error: (xhr, stat, err) => {
							console.error(err);
							swal({
								'title': '',
								'text': 'Oops, data tidak ditemukan',
								'icon': 'warning'
							});
						}
					});
				}
			}


		function resetForm() {
			$('div.form-group')
			.removeClass('has-error')
			.removeClass('has-success')
			.find('.help-block')
			.remove();

			$('#form-news')[0].reset();
		}

		function hapus(id) {
			swal({
			  title: "",
			  text: "Apakah anda yakin akan menghpaus data ini?",
			  icon: "warning",
			  buttons: ['Batal', 'Hapus'],
			  // dangerMode: true,
			  animation: true,
			  showConfirmButton: true,
			  showCancelButton: true,
			  confirmButtonText: 'Hapus',
			  confirmButtonColor: '#489FD6',
			  // cancelButtonText: 'Batal',
			  // cancelButtonColor: '#F46565'
			})
			.then((value) => {
			  if(value) {
			  	$.ajax({
				  	url: '<?= base_url('admin/news/delete_news') ?>',
				  	data: 'id_news='+id,
				  	type: 'post',
				  	dataType: 'json',
				  	success: res => {
				  		if(res.success == true) {
				  			swal('','Berhasil menghapus pengumuamn', 'success').then((val) => {dataTable.ajax.reload();});
				  		}
				  	},
				  	error: (xhr, stat, err) => {
				  		console.log(xhr + stat + err);
				  		swal('','Gagal menghapus pengumuman', 'error').then((val) => {dataTable.ajax.reload();});
				  	}
				  });
			  }
			});
		}

	</script>