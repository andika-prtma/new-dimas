  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role Detail
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Super Admin</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

    <section class="content">
      
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Role : <?= $role->role ?></h3>
            </div>
            <?= form_open('role/detailProses') ?>
            <div class="box-body">
              <div class="form-group">
                <input type="text" name="nameRole" class="form-control" value="<?= $role->role ?>">
                <input type="hidden" name="idRole" class="form-control" value="<?= $role->ID ?>">
              </div>
            </div>
            <div class="box-body">
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
    </section>
  </div>

