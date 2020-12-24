        <link href="<?= base_url('assets/theme/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="<?= base_url('assets/vendor/select2/') ?>css/select2.min.css" rel="stylesheet" />

<div class="col-md-2 col-sm-2">
<form method="post" action="<?= base_url('temp/cekproses') ?>"> 
<select class="js-example-basic-multiple form-control" name="x[]" multiple="multiple">
	
	<?php foreach ($kendaraan->result() as $kd): ?>
		<option value="<?= $kd->ID ?>" <?= $kd->ID == '2' ? 'selected' : '' ?>><?= ucwords($kd->kendaraan) ?></option>
	<?php endforeach ?>
</select>
<button type="submit"></button>
</form>
</div>
    <script src="<?= base_url('assets/vendor/select2') ?>/js/select2.min.js"></script>
