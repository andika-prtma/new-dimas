        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2 style="color: black; font-weight: bold;">Role Management</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <button class="btn btn-success">New Role</button>
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Role</th>
                          <th class="text-center">Total Users</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($role->result() as $rl): ?>
                        <?php $x = $this->db->get_where('tbl_user_login', ['id_role' => $rl->ID])->num_rows(); ?>
                        <tr>
                          <th scope="row"><?= $no++ ?></th>
                          <td><?= ucwords($rl->role) ?></td>
                          <td class="text-center"><?= $x ?></td>
                          <td>
                            <a class="btn btn-primary" href="<?= base_url('role/detail/').$rl->ID ?>">Detail</a>
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