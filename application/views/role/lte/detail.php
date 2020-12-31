<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Role Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Role </li>
              <li class="breadcrumb-item active">detail</li>
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
                <h3 class="card-title">Role : <?= $role->role ?></h3>
              </div>
              <?= form_open('role/detailProses') ?>
              <div class="card-body">
                <div class="form-group">
                  <input type="text" name="nameRole" class="form-control" value="<?= $role->role ?>">
                  <input type="hidden" name="idRole" class="form-control" value="<?= $role->ID ?>">
                </div>
              </div>
              <div class="box-body">
                <table class="table">
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
    </div>




</div>