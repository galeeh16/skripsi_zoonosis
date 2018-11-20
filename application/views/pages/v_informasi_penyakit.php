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
            <a href="<?php echo base_url('informasi-penyakit') ?>" title="Informasi Penyakit" class="active"><span class="lnr lnr-bug"></span> Informasi Penyakit</a>
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
	
	<div class="container" style="margin-top: 120px">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<center><h3>ABOUT ZONOSIS</h3></center>
					</div>
					<div class="panel-body">
						<p style="text-indent: 0.3in;" class="text-justify">Menurut UU No. 6 tahun 1967 pengertian zoonosis adalah penyakit yang dapat menular dari hewan ke manusia dan sebaliknya atau disebut juga Anthropozoonosis. Begitu pula dalam UU No. 18 tahun 2009 tentang peternakan dan kesehatan hewan, sebagai pengganti UU No. 6 tahun 1967 dinyatakan bahwa penyakit zoonosis adalah penyakit yang dapat menular dari hewan kepada manusia dan sebaliknya.</p>
						<p style="text-indent: 0.3in" class="text-justify">Sedangkan pengertian zoonosis yang diberikan WHO, zoonosis adalah suatu penyakit atau infeksi yang secara alami ditularkan dari hewan vertebrata ke manusia.</p>
						<p style="text-indent: 0.3in" class="text-justify">Zoonosis, menurut badan Kesehatan sedunia (OIE=Office Internationale Epizooticae) merupakan penyakit yang secara alamiah dapat menular diantara hewann vertebrata dan manusia. Penyakit yang tergolong dalam zoonosis dengan penyebaranpenyakit tersebar ke seluruh penjuru dunia dan yang sering ditemukan di Indonesia misalnya antraks, rabies, leptospirosis, brucelosis, toxoplasmosis, tuberkolosis, salmonellosis, avian Influenza, dan lain-lain. (Mangku Sitepoe, 2009, hal 1) </p>
					</div>
				</div>
			</div>
		</div>
    <!-- END ROW -->

    <!-- ROW -->
    <div class="row">
      <?php foreach ($penyakit as $row): ?>
        <div class="col-md-4 col-sm-12">
          <div class="panel">
            <div class="panel-body">
              <h4 class="lead"><?= $row->nama_penyakit; ?></h4>
              <p class="text-justify"><?= substr($row->deskripsi_penyakit, 0, 150).'... <button class="btn btn-xs btn-primary" onclick="detail('.$row->id_penyakit.')"><i class="lnr lnr-eye"></i> Lihat</button>'; ?></p>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <!-- END ROW -->

    <!-- MODAL DETAIL -->
    <div class="modal fade" id="modal-detail" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <h4>Deskripsi Penyakit</h4>
                <div id="deskripsi"></div>
                <h4>Gejala</h4>
                <div id="gejala"></div>
                <h4>Solusi</h4>
                <div id="solusi"></div>
              </div>
              <div class="col-md-4" id="img">
                
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" title="Tutup Modal"><i class="fa fa-times"></i> Tutup Modal</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END MODAL DETAIL -->

	</div>

  <?php $this->load->view('pages/v_footer'); ?>

</div>

<script>
  function detail(id) {
    $.ajax({
      url: '<?php echo base_url('welcome/info_detail') ?>',
      type: 'post',
      data: 'id_penyakit='+id,
      dataType: 'json',
      success: res => {
        console.log(res);
        $('#modal-detail').modal('show');
        $('.modal-title').text('Penyakit ' + res.penyakit.nama_penyakit);
        $('#deskripsi').html('<p class="text-justify">'+res.penyakit.deskripsi_penyakit+'</p>');

        let char = '';
        let no = 1;
        for(let i = 0; i < res.gejala.length; i++){
          char += '<p>'+no+'. '+res.gejala[i].nama_gejala+'</p>';
          no++;
        }
        $('#gejala').html(char);
        $('#solusi').html('<p class="text-justify">'+res.penyakit.nama_solusi+'</p>');
      },
      error: (xhr, stat, err) => {
        console.error(err);
      }
    });
  }
</script>
