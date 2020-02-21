<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sibaper</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url('template/backend')?>/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url('template/backend')?>/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?=base_url('template/backend')?>/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?=base_url('template/backend')?>/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?=base_url('template/backend')?>/vendors/select2/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="<?=base_url("template/backend/vendors/gritter/css/jquery.gritter.css")?>">
  <link rel="stylesheet" href="<?=base_url('template/backend')?>/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('template/backend')?>/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url('img')?>/logo.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-full-bg">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-dark text-left p-5">
                <h2>Login Sibaper</h2>
                <h4 class="font-weight-light">Hello! let's get started</h4>
                <form action="<?=site_url('login_do/login')?>" method="POST" class="pt-5">
                  <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="User ID" >
                    <i class="mdi mdi-account"></i>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" >
                    <i class="mdi mdi-eye"></i>
                  </div>
                  <div class="mt-5">
                    <button type="submit" class="btn btn-block btn-warning btn-lg font-weight-medium">Login</button>
                  </div>
                  <div class="mt-3 text-center">
                    <a href="#" class="auth-link text-white">Forgot password?</a>
                  </div>                 
                </form>
              </div>
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
  <script src="<?=base_url('template/backend')?>/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?=base_url('template/backend')?>/vendors/select2/select2.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?=base_url('template/backend')?>/js/off-canvas.js"></script>
  <script src="<?=base_url('template/backend')?>/js/hoverable-collapse.js"></script>
  <script src="<?=base_url('template/backend')?>/js/misc.js"></script>
  <script src="<?=base_url('template/backend')?>/js/settings.js"></script>
  <script src="<?=base_url('template/backend')?>/js/todolist.js"></script>
  <!-- endinject -->
  <script src="<?=base_url('template/backend')?>/js/select2.js"></script>
  
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url("template/backend/js/jquery.js")?>"></script>
    <script src="<?=base_url("template/backend/js/jquery.form.min.js"); ?>"></script>
    <script src="<?=base_url("template/backend/js/bootstrap.min.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("template/backend/vendors/gritter/js/jquery.gritter.js")?>"></script>

    <script type="text/javascript">
        $(function() {
            $('form').ajaxForm({
                dataType: 'json',
                success: function(data){
                    if(data.success) {
                        location.href = '<?=base_url('home/dashboard')?>';
                    } else{
                        $.gritter.add({
                            title: 'Login Gagal',
                            text: data.msg,
                            class_name: 'gritter-error gritter-center'
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>
