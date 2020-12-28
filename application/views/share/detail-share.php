<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Share Document</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Share </li>
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
                <h3 class="card-title">List Share</h3>
              </div>
              
              <div class="card-body">
                <ul class="nav nav-pills flex-column">                  
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="fas fa-folder "></i>
                      Share To Department
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="fas fa-folder "></i>
                      Share To User
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="fas fa-folder "></i>
                      Share To External
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Document: <?= $document->number_document ?></h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">

                    <table class="table">
                      <tr>
                        <td width="10%">Title</td>
                        <td width="5%">:</td>
                        <td><?= strtoupper($document->title) ?></td>
                      </tr>
                      <tr>
                        <td width="5%">Rev.</td>
                        <td width="5%">:</td>
                        <td><?= $document->revisi ?></td>
                      </tr>
                      <tr>
                        <td width="5%">Creator</td>
                        <td width="5%">:</td>
                        <td><?= $document->first_name ?></td>
                      </tr>
                      <tr>
                        <td width="5%">File PDF</td>
                        <td width="5%">:</td>
                        <td><?= $document->file_pdf ?></td>
                      </tr>
                    </table>
                    <hr>
                    <h6>Share to</h6>
                      <div class="form-horizontal col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-9">
                            <select class="form-control" id="type_share">
                              <option value="1">Internal User</option>
                              <option value="2">Internal Department</option>
                              <option value="3">External External</option>
                            </select>
                          </div>
                          <div class="col-sm-3">
                            <button class="btn btn-primary" onclick="showDiv()">Proses</button>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row" hidden id="shareUser">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Share to Internal User</h3>
              </div>
              
              <div class="card-body">
                <div class="row">
                  <?= form_open('share/shareUserProses', 'class="form-horizontal col-md-12"') ?>
                    <div class="form-group row">
                      <label for="rev" class="col-sm-4 col-form-label">Select User</label>
                      <div class="col-sm-8">
                        <select class="select2 form-control" multiple="multiple" data-placeholder="Select user" style="width: 100%;" id="user" name="user[]">
                          <?php foreach ($users as $usr): ?>
                            <?php if ($usr->ID != $document->creator): ?>
                              <option value="<?= $usr->ID ?>"><?= ucwords(strtolower($usr->first_name)) ?></option>
                            <?php endif ?>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <input type="text" name="id_rev" hidden value="<?= $document->ID ?>">
                      <button class="btn btn-primary" type="submit">Share</button>
                    </div>
                  <?= form_close() ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" hidden id="shareDept">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Share to Internal Department</h3>
              </div>
              
              <div class="card-body">
                <div class="row">
                  <?= form_open('share/shareDeptProses', 'class="form-horizontal col-md-12"') ?>
                    <div class="form-group row">
                      <label for="rev" class="col-sm-4 col-form-label">Select Department</label>
                      <div class="col-sm-8">
                        <select class="select2 form-control" multiple="multiple" data-placeholder="Select Department" style="width: 100%;" id="type_share" name="dept[]">
                          <?php foreach ($department as $dpt): ?>
                            <?php if ($dpt->department_id != $document->id_dept): ?>
                              <option value="<?= $dpt->department_id ?>"><?= strtoupper($dpt->name) ?></option>
                            <?php endif ?>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <input type="text" name="id_rev" hidden value="<?= $document->ID ?>">
                      <button class="btn btn-primary" type="submit">share</button>
                    </div>
                  <?= form_close() ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" hidden id="shareExternal">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Share to External User</h3>
              </div>
              
              <div class="card-body">
                <?= form_open('share/shareExternalProses', 'class="form-horizontal col-md-12"') ?>
                    <div class="form-group row">
                      <label for="rev" class="col-sm-3 col-form-label">Duration Share</label>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservation" name="duration">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="rev" class="col-sm-3 col-form-label">Generate Password</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="" name="password">
                      </div>
                      <div class="col-sm-2">
                        <a href="" class="btn btn-primary">Generate</a>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="rev" class="col-sm-3 col-form-label">Keperluan</label>
                      <div class="col-sm-7">
                        <textarea class="form-control" name="keperluan"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <input type="text" name="id_rev" hidden value="<?= $document->ID ?>">
                      <button class="btn btn-primary" type="submit">Share</button>
                    </div>
                <?= form_close() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript">
  function showDiv() {
    let privacy = document.getElementById('type_share').value;
    switch(privacy){
      case '1':
        document.getElementById('shareUser').hidden = false;
        document.getElementById('shareDept').hidden = true;
        document.getElementById('shareExternal').hidden = true;
      break;
      case '2':
        document.getElementById('shareUser').hidden = true;
        document.getElementById('shareDept').hidden = false;
        document.getElementById('shareExternal').hidden = true;
      break;
      case '3':
        document.getElementById('shareUser').hidden = true;
        document.getElementById('shareDept').hidden = true;
        document.getElementById('shareExternal').hidden = false;
      break;
    }
  }

</script>
