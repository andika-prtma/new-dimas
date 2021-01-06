<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail</h1>
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

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row" id="shareUser">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Share to External</h3>
              </div>
              
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table">
                      <tr>
                        <td width="5%">Link</td>
                        <td width="5%">:</td>
                        <td><?= base_url('external?key=').$document->keperluan ?></td>
                        <td><i class="fas fa-bell"></i>Copy this link and password to access ahared document</td>
                      </tr>
                      <tr>
                        <td width="5%">Password</td>
                        <td width="5%">:</td>
                        <td><?= $document->password ?></td>
                      </tr>
                      <tr>
                        <td width="10%">Duration</td>
                        <td width="5%">:</td>
                        <td><?= strtoupper($document->date_limit) ?></td>
                      </tr>
                      <tr>
                        <td width="5%">Keperluan</td>
                        <td width="5%">:</td>
                        <td><?= $document->keperluan ?></td>
                      </tr>
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