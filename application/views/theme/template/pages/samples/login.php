<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Corona Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>
              <form method="post" action="<?php echo base_url('Home/login'); ?>" class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Username or Email *</label>
      <input type="text" class="form-control" id="validationCustom01" name="name" value="Mark" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
      <div class="invalid-tooltip">
        Please enter a valid username or email.
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Password *</label>
      <input type="password" class="form-control" id="validationCustom02" name="password" value="Otto" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
      <div class="invalid-tooltip">
        Please enter a password.
      </div>
    </div>
  </div>

  <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>

  <div class="d-flex mt-2">
    <button class="btn btn-facebook mr-2">
      <i class="fab fa-facebook"></i> Facebook
    </button>
    <button class="btn btn-google">
      <i class="fab fa-google-plus"></i> Google plus
    </button>
  </div>

  <p class="sign-up">Don't have an Account?<a href="<?php echo base_url('Home/register'); ?>"> Sign Up</a></p>
</form>

<script>
// JavaScript to enable form validation with Bootstrap
(function() {
  'use strict';

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation');

  // Loop over them and prevent submission
  Array.from(forms).forEach(function(form) {
    form.addEventListener('submit', function(event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }

      form.classList.add('was-validated');
    }, false);
  });
})();
</script>


            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/settings.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>