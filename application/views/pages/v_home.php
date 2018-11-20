 
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

   <div class="container-fluid">
     <div class="row">
        <!-- carousel -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="<?= base_url('assets/img/Capture.jpg')?>" alt="Chicago">
              <div class="carousel-caption">
                <h1><span style="color: #3ec1d5">ZOO</span>NOSIS</h1>
                <h4>Zoonosis for lyfe!</h4>
              </div>
            </div>
            <div class="item">
              <img src="<?= base_url('assets/img/Capture.jpg')?>" alt="Chania">
              <div class="carousel-caption">
                <h1><span style="color: #3ec1d5">ZOO</span>NOSIS</h1>
                <h4>Zoonosis for lyfe!</h4>
              </div>
            </div>


            <div class="item">
              <img src="<?= base_url('assets/img/Capture.jpg')?>" alt="New York">
              <div class="carousel-caption">
                <h1><span style="color: #3ec1d5">ZOO</span>NOSIS</h1>
                <h4>Zoonosis for lyfe!</h4>
              </div>
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!-- end carousel -->
     </div>
   </div>

   <div class="container" style="margin-top: 30px">
    <!-- PANEL HEADLINE -->
      <div class="panel panel-headline">
        <div class="panel-heading">
          <h3 class="panel-title" style="font-family: 'Raleway';"><span style="color: #3ec1d5">ZOO</span>NOSIS</h3>
          <p class="panel-subtitle">Penyakit yang ditularkan hewan ke manusia.</p>
        </div>
        <div class="panel-body">
          <p class="text-justify">Ariel Peterpan merupakan vokalis Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat omnis aspernatur quidem magni consectetur quam nihil debitis, sit aut culpa adipisci, sequi nisi at, dignissimos ratione quod quo quos numquam rerum, perspiciatis commodi. Voluptates minima commodi, neque temporibus fuga vel..</p>
        </div>
      </div>
      <!-- END PANEL HEADLINE -->
   </div>

  <?php $this->load->view('pages/v_footer'); ?>
  
