        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="x_panel tile">
                <div class="x_title">
                  <h2 style="color: black; font-weight: bold;">Role Management : <?= $role->role ?></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <?= form_open('role/detailProses') ?>
                <div class="x_content">
                  <div class="form-group">
                    <input type="text" name="nameRole" class="form-control" value="<?= $role->role ?>">
                    <input type="hidden" name="idRole" class="form-control" value="<?= $role->ID ?>">
                  </div>
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Menu</th>
                          <th class="text-center">Access</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; $check = ''; ?>
                        <?php foreach ($menu->result() as $m): ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= ucwords($m->menu) ?></td>
                            <?php foreach (json_decode($access->id_menu) as $acc): ?>
                              <?php if ($acc == $m->ID): ?>
                              <?php $check = 'checked'; ?>
                              <?php endif ?>
                            <?php endforeach ?>
                            <td class="text-center">
                              <input type="checkbox" value="<?= $m->ID ?>" name="access[]" <?= $check ?>>
                            </td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="3" align="center">
                            <button class="btn btn-primary center" type="submit" value="save" name="send">Save</button>
                            <button class="btn btn-success center" type="submit" value="cancel" name="send">Cancel</button>
                          </td>
                        </tr>
                      </tfoot>
                  </table>
                </div>
                <?= form_close() ?>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->