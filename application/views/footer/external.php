  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template/adminlte') ?>/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
  function sweetSuccess() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        icon: 'success',
        title: 'Komentar berhasil dikirim'
      })
    }
</script>
<?php if ($this->session->userdata('update') == 1): ?>
  <script type="text/javascript">
    sweetSuccess();
  </script>
  <?php $this->session->set_userdata('update', 0) ?>
<?php endif ?>
</body>
</html>
