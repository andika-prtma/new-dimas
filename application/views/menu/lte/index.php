<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Menu / Sub Menu Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Menu Management</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Menu</h3>
              </div>
              <div class="card-body">
              <button class="badge bg-white" data-toggle="modal" data-target="#newMenu">Add new menu</button>
                <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Menu</th>
                  <th>Action</th>
                </tr>
                <?php $no = 1; ?>
                <?php foreach ($menu->result() as $rl): ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= ucwords($rl->menu) ?></td>
                  <td>
                    <a class="badge bg-green" href="<?= base_url('role/detail/').$rl->ID ?>">Detail</a>
                  </td>
                </tr>
                <?php endforeach ?>
              </table>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sub Menu</h3>
              </div>
              <div class="card-body">
              <button class="badge bg-white" data-toggle="modal" data-target="#newSubMenu">Add sub menu</button>
                <table class="table">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Menu</th>
                    <th>Name Sub menu</th>
                    <th>Links</th>
                    <th style="width: 40px">Action</th>
                  </tr>
                  <?php $no = 1; ?>
                  <?php foreach ($sub->result() as $sb): ?>
                  <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= ucwords($sb->menu) ?></td>
                    <td><?= ucwords($sb->title) ?></td>
                    <td><?= strtolower($sb->link) ?></td>
                    <td>
                      <a class="badge bg-green" href="<?= base_url('role/detail/').$sb->ID ?>">Detail</a>
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

    <div class="modal fade" id="newMenu">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add New Menu</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?= form_open('role/addRole', "class='form-horizontal'") ?>
            <div class="form-group">
              <label for="role" class="col-sm-2 control-label">Title Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="create" placeholder="" value="">
              </div>
            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          <?= form_close() ?>
        </div>
      </div>
    </div>

    <div class="modal fade" id="newSubMenu">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add New Menu</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?= form_open('menu/addNewSubMenu', 'class="form-horizontal"') ?>               
            <div class="form-group">
              <label for="create" class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="create" placeholder="" value="" name="title">
              </div>
            </div>
            <div class="form-group">
              <label for="create" class="col-sm-2 control-label">Parent Menu</label>
              <div class="col-sm-10">
                <select class="form-control" data-placeholder="select parent menu" name="id_menu">
                  <?php foreach ($menu->result() as $mn): ?>
                    <option value="<?= $mn->ID ?>"><?= ucwords($mn->menu) ?></option>                      
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="create" class="col-sm-2 control-label">Link</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="create" placeholder="ex: admin/role" value="" name="link">
              </div>
            </div>
            <div class="form-group">
              <label for="create" class="col-sm-2 control-label">Active</label>
              <div class="col-sm-10">
                <input type="checkbox" value="1" name="active">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          <?= form_close() ?>
        </div>
      </div>
    </div>


</div>