  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Share document</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Description</h3>
              </div>
              
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Creator</td>
                      <td><?= ucwords(strtolower($document->creator)) ?></td>
                    </tr>
                    <tr>
                      <?php 
                        $this->load->helper('api');
                        $dept = getProfileDepartment($document->id_dept);
                        $dept_name = $dept->data[0]->name;
                      ?>
                      <td>Department</td>
                      <td><?= isset($dept->data[0]->name) ? ucwords(strtolower($dept->data[0]->name)) : '' ?></td>
                    </tr>
                    <tr>
                      <td>Created at</td>
                      <td><?= date('d-m-Y', $document->created_at) ?></td>
                    </tr>
                    <tr>
                      <td>Efektif date</td>
                      <td><?= date('d-m-Y', $document->efektif_date) ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>  
          </div>
          <div class="col-lg-8">
            <div class="card card-primary" style="height: 275px">
              <div class="card-header">
                <h3 class="card-title">Document: <?= $document->number_document ?></h3>
              </div>
              
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td width="20%">Title</td>
                      <td><?= ucwords(strtolower($document->title)) ?></td>
                    </tr>
                    <tr>
                      <td>Revisi</td>
                      <td><?= $document->revisi ?></td>
                    </tr>
                    <tr>
                      <td>File</td>
                      <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#preview">
                          Preview 
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Comments</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <?= form_open_multipart('document/revisi_proses', 'class="form-horizontal" id="form-edit"') ?>
                    <div class="form-group row">
                      <label for="rev" class="col-sm-1 col-form-label">Email</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="rev" name="rev" value="">
                      </div> 
                      <label for="rev" class="col-sm-2 col-form-label">Name / Company</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="rev" name="rev" value="">
                      </div> 
                    </div>
                    <label for="rev" class="col-form-label">Comment</label>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <textarea class="form-control" style="height: 100px"></textarea>
                      </div> 
                    </div>
                    <div class="form-group row">
                      <button class="btn btn-success" type="submit">Send</button>
                    </div>
                    <?= form_close() ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>

<div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="preview"
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
        <iframe src="<?= base_url().'service/stamp/index.php'?>" style="width: 100%; height:500px;"></iframe>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
  