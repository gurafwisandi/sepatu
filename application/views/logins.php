<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Toko Arun Jaya Sport</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=site_url()?>login/baru/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=site_url()?>login/baru/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="<?=site_url()?>login/baru/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=site_url()?>login/baru/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?=site_url()?>login/baru/assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?=site_url()?>login/baru/assets/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?=site_url()?>assets/img/icon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <?php if($data == '0'){?>
                  <div class="form-group">
                    <div class="btn btn-danger submit-btn btn-block">Login Gagal</div>
                  </div>
                <?php } ?>
                <div class="" style="text-align:center; width:100%">Sistem Persediaan Sepatu <br>
                Pada Toko Arun Jaya Sport
                </div>
                <br><br>
                <form action="<?=site_url('/auth/login')?>" method="POST">
                  <div class="form-group">
                    <label class="label">Username</label>
                    <div class="input-group">
                      <input required autocomplete="off" type="text" name="username" class="form-control" placeholder="Username">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input required autocomplete="off" type="password" name="password" class="form-control" placeholder="*********">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block" type="submit" name="submit" value="submit">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- <script src="<?=site_url()?>login/baru/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?=site_url()?>login/baru/assets/vendors/js/vendor.bundle.addons.js"></script> -->
    <!-- endinject -->
    <!-- inject:js -->
    <!-- <script src="<?=site_url()?>login/baru/assets/js/shared/off-canvas.js"></script>
    <script src="<?=site_url()?>login/baru/assets/js/shared/misc.js"></script> -->
    <!-- endinject -->
    <!-- <script src="<?=site_url()?>login/baru/assets/js/shared/jquery.cookie.js" type="text/javascript"></script> -->
  </body>
</html>