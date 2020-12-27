<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">View</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Document </li>
            <li class="breadcrumb-item">View</li>
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
                        <td>Creator</td>
                        <td><?= ucwords($document->first_name.' '.$document->last_name) ?></td>
                      </tr>
                      <tr>
                        <?php 
                          $this->load->helper('api');
                          $dept = getProfileDepartment($document->id_dept);
                          $dept_name = $dept->data[0]->name;
                        ?>
                        <td>Department</td>
                        <td><?php if (isset($dept->data[0]->name)){echo $dept->data[0]->name;}?></td>
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
          <div class="card">
            <div class="card-body">
              <div class="row">
                <table class="table">
                    <h4>
                    <small class="">Approval</small>
                    <a class="float-right" href="<?= base_url('approve/approveDocument/').$id_doc.'/'.$revisiData->ID ?>"><i class="fas fa-cog "></i></a>&nbsp;
                  </h4>
                    <tbody>
                      <?php foreach ($approval->result() as $app): ?>
                        <?php 
                        if ($app->submit == 0 && $app->status == 0) {
                            $view = 'Waiting for submit';
                        } elseif ($app->submit == 1 && $app->status == 0 ) {
                            $view = 'Waiting approval';
                        } else{
                            $view = 'Approved';
                        }
                        ?>
                      <tr>
                        <td><?= $app->first_name.' '.$app->last_name ?></td>
                        <td><?= $view ?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Document: <?= $document->title ?></h3><br>                
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <table>
                      <tr>
                        <td>Periode</td>
                        <td>:</td>
                        <td>
                            <?php $no = 1; ?>
                            <?php foreach ($periode->result() as $pr): ?>
                              <button class="badge <?= $revisiData->id_periode == $pr->ID ? 'bg-white' : 'bg-green' ?>">Periode <?= $no ?></button>
                            <?php $no++ ?>
                            <?php endforeach ?>
                        </td>
                        <td><button class="badge bg-blue">+</button></td>
                      </tr>
                      <tr>
                        <td>Revisi</td>
                        <td>:</td>
                        <td>
                            <?php $no = 1; ?>
                            <?php foreach ($revisi->result() as $rev): ?>
                              <a href="<?= base_url('document/documentView/').$id_doc.'/'.$rev->ID ?>" class="badge <?= $revisiData->ID == $rev->ID ? 'bg-white' : 'bg-green' ?>">Rev. <?= $rev->revisi ?></a href="">
                            <?php $no++ ?>
                            <?php endforeach ?>
                        </td>
                        <td><a class="badge bg-blue" href="<?= base_url('document/AddRevisi/').$id_doc.'/'.$revisiData->ID ?>">+</a></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <div class="text-right">
                      <a data-toggle="modal" data-target="#myModal" class="btn btn-success"><font color="white"><i class="fa fa-eye"></i> Preview</font></a>
                      <button class="btn btn-primary" type="button" onclick="save()"  <?= $revisiData->submit != 0 ? 'hidden':'' ?> >Save</button>
                      <?php if ($revisiData->submit == 0): ?>
                        <a href="<?= base_url('document/submit/').$id_doc.'/'.$id_revisi ?>" class="btn btn-primary">Submit</a>
                        
                      <?php endif ?>
                      <!-- <button class="btn btn-primary" type="button" onclick="save()">Submit</button> -->
                      <?php if ($status == 1): ?>
                        <?php if ($revisiData->efektif == 0): ?>
                          <button data-toggle="modal" data-target="#publish" class="btn btn-primary" type="button">Publish</button>
                        <?php endif ?>
                      <?php endif ?>
                    </div>
                  </div>
                </div>              
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Document</h3><br>                
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <?= form_open_multipart('document/revisi_proses', 'class="form-horizontal" id="form-edit"') ?>
                    <div class="form-group row">
                      <label for="rev" class="col-sm-3 col-form-label">Rev.</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="rev" name="rev" value="<?= $revisiData->revisi ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="title" class="col-sm-3 col-form-label">Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="title" name="title" value="<?= $revisiData->title ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="file_doc" class="col-sm-3 col-form-label">File Doc</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" id="file_doc" name="file_doc">
                        <?php if (!$revisiData->file_doc == null): ?>
                          <a href="<?= base_url('uploads/attachment/'.$revisiData->id_doc.'/'.$revisiData->file_doc ) ?>"><?= $revisiData->file_doc ?></a>
                        <?php endif ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="file_pdf" class="col-sm-3 col-form-label">File PDF</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" id="file_pdf" name="file_pdf">
                        <?php if (!$revisiData->file_pdf == null): ?>
                          <i class="fa fa-file-pdf"></i>
                          <a href="<?= base_url('uploads/attachment/'.$revisiData->id_doc.'/'.$revisiData->file_pdf ) ?>"><?= $revisiData->file_pdf ?></a>
                        <?php endif ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="file_pdf" class="col-sm-3 col-form-label">Comment</label>
                      <div class="col-sm-9">
                        <textarea name="comment" class="form-control"><?= $revisiData->comment ?></textarea>
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
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card-primary">
            <div class="card-header">
              <div class="card-title">
                Log Approval
              </div>
            </div>
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


<?php $id_doc = $id_doc; ?>
<?php $pdf = $revisiData->file_pdf; ?>

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
        <?php if ($this->session->userdata('id_user') == $document->creator): ?>
          <iframe src="<?= base_url('service/pdf/attachment/'.$revisiData->id_doc.'/'.$revisiData->file_pdf ) ?>" style="width: 100%; height:500px;"></iframe>
        <?php else: ?>
          <iframe src="<?= base_url() ?>service/pdf/src/baru3-done.php?id_document=<?= $id_doc ?>&pdf=<?= $pdf ?>" style="width: 100%; height:500px;"></iframe>
        <?php endif ?>
      </div>
      <div class="modal-footer">
        <!-- 
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>

        -->
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="publish" tabindex="-1" role="dialog" aria-labelledby="publish"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 50%;">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Publish Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('document/publish', 'class="form-horizontal" ') ?>
          <div class="form-group row">
            <label for="rev" class="col-sm-3 col-form-label">Type</label>
            <div class="col-sm-3">
              <select class="form-control" name="typePublish">
                <option value="1">Public</option>
                <option value="2">Department Only</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="rev" class="col-sm-3 col-form-label">Efektif Date</label>
            <div class="col-sm-3">
              <input type="date" class="form-control" id="rev" name="efektifDate">
            </div>
          </div>
          <div class="hidden" hidden>
            <input type="text" name="id_rev" value="<?= $revisiData->ID ?>">
            <input type="text" name="id_doc" value="<?= $document->ID ?>">
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        <?= form_close() ?>
      </div>
    </div>
  </div>
</div>