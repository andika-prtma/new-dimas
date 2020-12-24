<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Document</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Document </li>
              <li class="breadcrumb-item active">Dashboard Document </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">          
          <div class="col-lg-4 col-12">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?= $all ?></h3>

                <p>All Document</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?= $users ?></h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?= $shared ?></h3>

                <p>Document Shared</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Directory</h3>
              </div>
              
              <div class="card-body">
                List Department
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Allowed Folder</h3>
              </div>
              
              <div class="card-body">
                <ul class="nav nav-pills flex-column">
                  <?php foreach ($department as $dept): ?>
                  <li class="nav-item">
                    <a href="<?= base_url('document/documentList/').$dept->department_id ?>" class="nav-link">
                      <i class="fas fa-folder "></i>
                      <?= $dept->name ?>
                    </a>
                  </li>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </div>