<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">External Document</h1>
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
                <h3 class="card-title">List share to External</h3>
              </div>
              <div class="card-body">
                <div class="card-body">
			<table id="example1" class="table table-bordered table-striped">
			  <thead>
			  <tr>
				<th>Nomor Document</th>
				<th>Title</th>
				<th>Revisi</th>
				<th>Status</th>
				<th>Action</th>
			  </tr>
			  </thead>
			  <tbody>
				<?php foreach ($list->result() as $req): ?>
				  <?php
				  	if($req->confirm_mr == 1){
						$status = 'Verified';
					} else {
						$status = 'Waiting';
					}
				  ?>
				  <tr>
					<td><?= $req->number_document ?></td>
					<td><?= $req->title ?></td>
					<td><?= $req->revisi ?></td>
					<td><?= $status ?></td>
					<td>
					  <a href="<?= base_url('monitoring/acceptRequestDirect/').$req->id_ext ?>" class="badge bg-blue">Check</a>
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
