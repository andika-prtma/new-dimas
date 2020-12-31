<div class="content-wrapper">

    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List Document</h1>
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
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Allowed Folder</h3>
              </div>
              <div class="card-body">
              <button class="badge bg-white" data-toggle="modal" data-target="#newRole">Add new role</button>
                <table class="table">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Role</th>
                    <th>Total Users</th>
                    <th>Action</th>
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
      </div>
    </div>

    <div class="modal fade" id="newRole">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add New Role</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?= form_open('role/addRole', "class='form-horizontal'") ?>
            <div class="form-group">
              <label for="role" class="col-sm-2 control-label">Role Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="role" name="role">
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


</div>