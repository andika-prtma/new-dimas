<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Monitoring MR</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Home /</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row"> 
          <div class="col-lg-4 col-12">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>1</h3>

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
                <h3>1</h3>
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
                <h3>1</h3>

                <p>Document Shared</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Request to share</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nomor Document</th>
                    <th>Title</th>
                    <th>Revisi</th>
                    <th>Requester</th>
                    <th>Keperluan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($request as $req): ?>
                      <tr>
                        <td><?= $req->number_document ?></td>
                        <td><?= $req->number_document ?></td>
                        <td><?= $req->number_document ?></td>
                        <td><?= $req->number_document ?></td>
                        <td>Contoh</td>
                        <td>
                          <button class="badge bg-green">detail</button>
                          <button class="badge bg-blue">accept</button>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>
</div>