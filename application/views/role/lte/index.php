  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Super Admin</a></li>
        <li class="active">Role Management</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Role</h3>
              <div class="box-tools">
                <button class="btn btn-primary" data-toggle="modal" data-target="#newRole">Add new role</button>
              </div>
            </div>            
            <div class="box-body">
              <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Role</th>
                  <th>Action</th>
                  <th>Total Users</th>
                </tr>
                <?php $no = 1; ?>
                <?php foreach ($role->result() as $rl): ?>
                <?php $x = $this->db->get_where('tbl_user_login', ['id_role' => $rl->ID])->num_rows(); ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= ucwords($rl->role) ?></td>
                  <td class="text-center"><?= $x ?></td>
                  <td>
                    <a class="badge bg-green" href="<?= base_url('role/detail/').$rl->ID ?>">Detail</a>
                  </td>
                </tr>
                <?php endforeach ?>
              </table>
            </div>
          </div>
        </div>
      </div>
            
      <div class="modal fade" id="newRole">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add New Role</h4>
            </div>
            <div class="modal-body">
              <?= form_open('role/addRole', 'class="form-horizontal"') ?>
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Role Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="role" name="role">
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

