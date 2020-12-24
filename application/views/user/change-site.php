        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2 style="color: black; font-weight: bold;">CHANGE DEFAULT SITE/BUSINESS UNIT</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <?= form_open('user/proc_site') ?>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="create">User Login<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input readonly type="text" id="create" class="form-control" value="<?= ucwords($this->session->userdata('name')) ?>" name="create">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="reqby">*site<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" name="site">
                          <option value="0">Pilih</option>
                        <?php foreach ($site as $s): ?>
                          <option value="<?= $s->prefix ?>" <?= $this->session->userdata('site') == $s->prefix ? 'selected' : '' ?>><?= $s->prefix.' | '.$s->business_unit ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <br>
                  <br>
                  <center>
                    <button class="btn btn-primary" type="submit" name="save" value="save">Save</button>
                    <button class="btn btn-success" type="submit" name="save" value="cancel">Cancel</button>
                  </center>
                  <?= form_close() ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->