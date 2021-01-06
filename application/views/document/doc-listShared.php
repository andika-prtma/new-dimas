<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Your Share</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Document </li>
              <li class="breadcrumb-item active">Add Document</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    

    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Allowed Folder</h3>
              </div>
              
              <div class="card-body">
                <ul class="nav nav-pills flex-column">                  
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="fas fa-folder "></i>
                      My Document
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="fas fa-folder "></i>
                      Share To Me
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="fas fa-folder "></i>
                      Share Department
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card card-info">
              <div class="card-header">
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nomor Document</th>
                    <th>Title</th>
                    <th>Revisi</th>
                    <th>Type Share</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($shrExternal->result() as $ls): ?>
                      <tr>
                        <td><?= $ls->number_document ?></td>
                        <td><?= $ls->title ?></td>
                        <td><?= $ls->revisi ?></td>
                        <td>External</td>
                        <td align="center">
                        	<a class="btn btn-success" href="<?= base_url('share/viewExternalDoc/'.$ls->id_doc.'/'.$ls->ID) ?>">Detail</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                    <?php foreach ($shrUser->result() as $ls): ?>
                      <tr>
                        <td><?= $ls->number_document ?></td>
                        <td><?= $ls->title ?></td>
                        <td><?= $ls->revisi ?></td>
                        <td>User</td>
                        <td align="center">
                        	<a class="btn btn-success" href="<?= base_url() ?>">Detail</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                    <?php foreach ($shrDept->result() as $ls): ?>
                      <tr>
                        <td><?= $ls->number_document ?></td>
                        <td><?= $ls->title ?></td>
                        <td><?= $ls->revisi ?></td>
                        <td>Dept</td>
                        <td align="center">
                        	<a class="btn btn-success" href="<?= base_url() ?>">Detail</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
