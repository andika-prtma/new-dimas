</div>
<!-- jQuery -->
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template/adminlte') ?>/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
	function saveRevisiAjax() {	   
	   var form = $("#form-edit");
	   $.ajax({
		    type: 'post',
		    url: form.attr('action'),
		    data: form.serialize(),
		    
		    success: function (data) {
			    sweetSuccess();
			    console.log(data);
		    },
		    error: function (xhr, ajaxOptions, thrownError) {
		        sweetError();
	      }
		}); 
	}

  	function sweetSuccess() {
  		const Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });

      Toast.fire({
        icon: 'success',
        title: 'Berhasil disimpan'
      })
  	}

  	function sweetSubmit() {
  		const Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });

      Toast.fire({
        icon: 'success',
        title: 'Berhasil disubmit'
      })
  	}

  	function sweetError() {
  		const Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });

      Toast.fire({
        icon: 'error',
        title: 'Gagal disimpan'
      })
  	}
	 
	function save() {
		document.getElementById('form-edit').submit();
		//sweetSuccess();
	}
</script>
<?php if ($this->session->userdata('update') == 1): ?>
	<script type="text/javascript">
		sweetSuccess();
	</script>
	<?php $this->session->set_userdata('update', 0) ?>
<?php endif ?>
<?php if ($this->session->userdata('submit') == 1): ?>
	<script type="text/javascript">
		sweetSubmit();
	</script>
	<?php $this->session->set_userdata('submit', 0) ?>
<?php endif ?>

</body>
</html>