<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Document</h1>
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
                <h3 class="card-title">Add Document</h3>
              </div>
              
              <div class="card-body">
                <?= form_open('document/add_proses', 'class="form-horizontal"') ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Name Document</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title" name="title">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kategori" class="col-sm-3 col-form-label">Kategori Document</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="kategori" id="kategori" onchange="show()">
                        <option>-- Pilih Kategori Document -- </option>
                        <?php foreach ($kategori->result() as $ktg): ?>
                        <option value="<?= $ktg->ID ?>"><?= ucwords($ktg->name) ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <!-- untuk kategori dokument -->
                  <div class="form-group row" id="jenis-div" hidden>
                      <label class="col-sm-3 col-form-label" for="val-confirm-password">Jenis</label>
                      <div class="col-lg-9">
                          <select class="form-control" id="jenis" name="jenis" onchange="show2()">
                          </select>
                      </div>
                  </div>

                  <!-- untuk kategori dokument -->
                  <div class="form-group row" id="proses-div" hidden>
                      <label class="col-sm-3 col-form-label" for="val-confirm-password">Berdasarkan Proses</label>
                      <div class="col-lg-9">
                          <select class="form-control" id="proses" name="proses" >
                          </select>
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="reminder" class="col-sm-3 col-form-label">Reminder Date</label>
                    <div class="col-sm-9">
                      <input type="date" name="reminder" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="hidden" hidden>
                  <input type="text" name="id_dept" value="<?= $id_dept ?>">
                </div>
                <div class="card-footer float-right">
                  <button type="submit" class="btn btn-info">Create</button>
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
    function show(){
        var cat = document.getElementById('kategori').value;

        if (cat=='3'){
            
            pilih_jenis(cat);
            jenis_proses(cat);
            document.getElementById('jenis-div').hidden = false;
            document.getElementById('proses-div').hidden = true;
        } else if ( cat == '2') {
            jenis_proses(cat);
            document.getElementById('jenis-div').hidden = true;
            document.getElementById('proses-div').hidden =false;
        }else {

            document.getElementById('jenis-div').hidden = true;
            document.getElementById('proses-div').hidden = true;
        }
    }

    function show2(){
        var cat     = document.getElementById('kategori').value;
        var jenis   = document.getElementById('jenis').value;
        var proses  = document.getElementById('proses').value;
        
        if (jenis == '1') {
            document.getElementById('proses-div').hidden = false;
        } else if(jenis == '2'){
            document.getElementById('proses-div').hidden = true;
        }
    }

    function pilih_jenis(id){
        $.ajax({
              url:'<?= base_url() ?>document/kode',
              type:'POST', 
              async:false, 
              data:{
                id:id,
              }, 
              success:function(data){
                document.getElementById('jenis').innerHTML = data;
                // alert('oke');
              }
            });
    }

    function jenis_proses(id){
        $.ajax({
              url:'<?= base_url() ?>document/kode_proses',
              type:'POST', 
              async:false, 
              data:{
                id:id,
              }, 
              success:function(data){
                document.getElementById('proses').innerHTML = data;
              }
            });
    }

  </script>