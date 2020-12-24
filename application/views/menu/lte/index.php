  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu/Sub Menu Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Super Admin</a></li>
        <li class="active">Menu Management</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Menu</h3>
              <div class="box-tools">
                <button class="btn btn-primary" data-toggle="modal" data-target="#newMenu">Add new</button>
              </div>
            </div>            
            <div class="box-body">
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
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sub Menu</h3>

              <div class="box-tools">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addSubMenu">Add New</button>
              </div>
            </div>
            <div class="box-body">
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

        <div class="modal fade" id="newMenu">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Menu</h4>
              </div>
              <div class="modal-body">
                <?= form_open('menu/addNewMenu', 'class="form-horizontal"') ?>
                <div class="form-group">
                  <label for="create" class="col-sm-2 control-label">Title Menu</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="create" placeholder="" value="">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" type="submit">Save changes</button>
              </div>
              <?= form_close() ?>
            </div>
          </div>
        </div>
        <div class="modal fade" id="addSubMenu">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Sub Menu</h4>
              </div>
              <div class="modal-body">
                <?= form_open('menu/addNewSubMenu', 'class="form-horizontal"') ?>
                <div class="box-body">
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
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              <?= form_close() ?>
            </div>
          </div>
        </div>
    </section>
  </div>

