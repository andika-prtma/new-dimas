        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="x_panel tile">
                <div class="x_title">
                  <h2 style="color: black; font-weight: bold;">Menu Management</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newMenu">New Menu</button>
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Menu</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($menu->result() as $rl): ?>
                        <tr>
                          <th scope="row"><?= $no++ ?></th>
                          <td><?= ucwords($rl->menu) ?></td>
                          <td>
                            <a class="badge badge-primary" href="<?= base_url('role/detail/').$rl->ID ?>">Detail</a>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="x_panel tile">
                <div class="x_title">
                  <h2 style="color: black; font-weight: bold;">Submenu Management</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newSubMenu">New Sub Menu</button>
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Menu</th>
                          <th>Name Sub menu</th>
                          <th>Links</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($sub->result() as $sb): ?>
                        <tr>
                          <th scope="row"><?= $no++ ?></th>
                          <td><?= ucwords($sb->menu) ?></td>
                          <td><?= ucwords($sb->title) ?></td>
                          <td><?= strtolower($sb->link) ?></td>
                          <td>
                            <a class="badge badge-primary" href="<?= base_url('role/detail/').$sb->ID ?>">Detail</a>
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
        <!-- /page content -->

        <!-- create new menu -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="newMenu">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Menu</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <?= form_open('menu/addNewMenu') ?>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="create">Title Menu<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                      <input type="text" id="create" class="form-control" value="" name="title">
                  </div>
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

        <!-- create new sub menu -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="newSubMenu">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Sub Menu</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <?= form_open('menu/addNewSubMenu') ?>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="create">Title<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                      <input type="text" id="create" class="form-control" value="" name="title">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="create">Parent Menu<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <select id="" class="form-control" name="id_menu">
                      <?php foreach ($menu->result() as $mn): ?>
                        <option value="<?= $mn->ID ?>"><?= ucwords($mn->menu) ?></option>                      
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="create">Link<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                      <input type="text" id="create" class="form-control" value="" name="link" placeholder="ex: admin/role">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="create">Active<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                      <input type="checkbox" value="1" name="active">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              <?= form_close() ?>
            </div>
          </div>
        </div>