<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Approval Stage</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Approval </li>
            <li class="breadcrumb-item active"><?= $document->number_document ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <table class="table">
                    <p>Description</p>
                    <tbody>
                      <tr>
                        <td>Title</td>
                        <td><?= strtoupper($document->title) ?></td>
                      </tr>
                      <tr>
                        <td>Creator</td>
                        <td><?= ucwords($document->first_name.' '.$document->last_name) ?></td>
                      </tr>
                      <tr>
                        <td>Department</td>
                        <td><?= $document->id_dept ?></td>
                      </tr>
                      <tr>
                        <td>Created at</td>
                        <td><?= date('d-m-Y', $document->created_at) ?></td>
                      </tr>
                      <tr>
                        <td>Reminder</td>
                        <td><?= date('d-m-Y', $document->reminder) ?></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Document</h3><br>                
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <?= form_open_multipart('approve/setup_proses', 'class="form-horizontal" id="form-edit"') ?>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name Level</label>
                        <input type="text" class="form-control" id="" name="level">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Person In Charge</label>
                        <select class="form-control" name="person">
                          <?php foreach ($users->result() as $u): ?>
                            <option value="<?= $u->ID ?>"><?= ucwords($u->first_name.' '.$u->last_name) ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group float-right">
                        <button type="submit" class="btn btn-danger">Add</button>
                        <a href="<?= base_url('document/documentView/').$id_doc.'/'.$id_revisi ?>" class="btn btn-success">Back </a>
                      </div>
                      <div hidden>
                        <input type="text" name="id_revisi" value="<?= $id_revisi ?>">
                        <input type="text" name="id_doc" value="<?= $id_doc ?>">
                      </div>
                    <?= form_close() ?>
                    <table id="" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Name Level</th>
                        <th>Person In Charge</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($approvalList->result() as $app): ?>
                      <tr>
                        <td><?= $app->name_level ?></td>
                        <td><?= $app->first_name.' '.$app->last_name ?></td>
                        <td><button class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
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
    </div>
  </div>
</div>
