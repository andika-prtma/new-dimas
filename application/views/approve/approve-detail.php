<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Home</h1>
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
          <div class="col-lg-3">
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
          <div class="col-lg-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Approve Document: <?= $document->number_document ?></h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <?= form_open_multipart('document/revisi_proses', 'class="form-horizontal" id="form-edit"') ?>
                    <div class="form-group row">
                      <label for="rev" class="col-sm-3 col-form-label">Rev.</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="rev" name="rev" value="<?= $revisiData->revisi ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="title" class="col-sm-3 col-form-label">Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="title" name="title" value="<?= $revisiData->title ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row" hidden>
                      <label for="file_doc" class="col-sm-3 col-form-label">File Doc</label>
                      <div class="col-sm-4">
                        <?php if (!$revisiData->file_doc == null): ?>
                          <a href="<?= base_url('uploads/attachment/'.$revisiData->id_doc.'/'.$revisiData->file_doc ) ?>"><?= $revisiData->file_doc ?></a>
                        <?php endif ?>
                      </div>
                      <div class="col-sm-5">
                          <button class="btn btn-primary">Preview</button>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="file_pdf" class="col-sm-3 col-form-label">File PDF</label>
                      <div class="col-sm-4">
                        <div class="">
                          <i class="fa fa-file-pdf"></i>
                          <?php if (!$revisiData->file_pdf == null): ?>
                          <a href="<?= base_url('uploads/attachment/'.$revisiData->id_doc.'/'.$revisiData->file_pdf ) ?>"><?= $revisiData->file_pdf ?></a>
                        <?php endif ?>
                        </div>
                      </div>
                      <div class="col-sm-5">
                          <a data-toggle="modal" data-target="#myModal" class="btn btn-primary"><font color="white"><i class="fa fa-eye"></i> Preview</font></a>
                          <!-- <button class="btn btn-primary">Previewclkj</button> -->
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="file_pdf" class="col-sm-3 col-form-label">Comment</label>
                      <div class="col-sm-9">
                        <textarea name="comment" class="form-control" readonly><?= $revisiData->comment ?></textarea>
                      </div>
                    </div>
                    <div class="hidden" hidden>
                      <input type="text" name="id_revisi" value="<?= $revisiData != null ? $revisiData->ID : 'kosong' ?>">
                      <input type="text" name="id_doc" value="<?= $document->ID ?>">
                    </div>
                    <?= form_close() ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" <?= (level_doc($id_doc,$id_revisi)==level_pic(level_doc($id_doc,$id_revisi),$id_revisi)) ? 'hidden':'' ?>>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Approve</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <?= form_open_multipart('approve/approve_proses', 'class="form-horizontal" id="form-edit"') ?>
                    <div class="form-group row">
                      <label for="rev" class="col-sm-3 col-form-label">Comment</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="comment"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <center>
                          <?php if ($this->session->userdata('id_user')==level_pic(level_doc($id_doc,$id_revisi),$id_revisi)): ?>
                            <button type="submit" class="btn btn-primary" value="<?= level_doc($document->ID,$revisiData->ID)+1; ?>" name="status" <?= level_doc($id_doc,$id_revisi)>level_max($id_doc,$id_revisi) ? 'hidden':'' ?> >Approve</button>
                            <button type="submit" class="btn btn-danger" value="<?= level_doc($document->ID,$revisiData->ID)-1; ?>" name="status" <?= level_doc($id_doc,$id_revisi)==0 ? 'hidden':''; ?> <?= level_doc($id_doc,$id_revisi)>level_max($id_doc,$id_revisi) ? 'hidden':'' ?> >Reject</button>
                          <?php endif ?>
                        </center>
                      </div>
                    </div>
                    <div class="hidden" hidden>
                      <input type="text" name="id_doc" value="<?= $id_doc ?>">
                      <input type="text" name="id_revisi" value="<?= $id_revisi ?>">
                    </div>
                    <?= form_close() ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>User</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($log->result() as $lg): ?>
                      <tr>
                        <td><?= $lg->first_name.' '.$lg->last_name ?></td>
                        <td><?= $lg->comment ?></td>
                        <td><?= $lg->status == 1 ? 'Rejected' : 'Approved' ?></td>
                        <td><?= date('d-m-Y H:i', $lg->updated_at) ?></td>
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







<?php
    $id_doc = $id_doc;
    $pdf = $revisiData->file_pdf;
?>



<!-- Modal @rizky-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 80%;">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="<?= base_url('service/stamp/attachment/'.$revisiData->id_doc.'/'.$revisiData->file_pdf ) ?>" style="width: 100%; height:500px;"></iframe>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>