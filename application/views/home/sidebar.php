<?php   
        $this->load->model("M_superadmin");        
        $arr = $this->db->get_where('tbl_user_access_menu', ['id_role'=> $this->session->userdata('id_role')])->row();
        $arr = json_decode($arr->id_menu);
?>
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?= base_url() ?>" class="navbar-brand">
        <img src="https://multifab.co.id/asset/images/logohd.png" alt="Multifab" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">DIMAS</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?= base_url('home') ?>" class="nav-link">Home</a>
          </li>
          <?php foreach ($arr as $m): ?>
            <?php $submenu  = $this->M_superadmin->getSubMenu($m)->result() ?>
            <?php $menu     = $this->db->get_where('tbl_user_menu', ['ID' => $m])->row() ?>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?= ucwords($menu->menu) ?></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <?php foreach ($submenu as $sm): ?>
              <li><a href="<?= base_url().$sm->link ?>" class="dropdown-item"><?= ucwords($sm->title) ?></a></li>
              <?php endforeach ?>
            </ul>
          </li>
          <?php endforeach ?>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="media">
              <div class="media-body">
                <ul class="nav navbar-nav">
                  <center>
                    <li class="user-header">
                      <img width="20%" src="<?= base_url('assets/img/profile/') ?>default.jpg" class="img-circle" alt="User Image">
                      <p>
                        <?= $this->session->userdata('name') ?>
                      </p>
                    </li>
                  </center>
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?=base_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>  
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
