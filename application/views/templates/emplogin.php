<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Employee Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url();?>assets1/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url();?>assets1/css/style.css">
  <link rel="stylesheet" href="<?=base_url();?>assets1/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?=base_url();?>assets1/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?=base_url();?>assets1/img/favicon.ico' />
</head>

<body style="background-image: url(<?=base_url();?>assets1/img/login-bg.png); background-size: cover;">
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <?php echo validation_errors();?>
              <?php if($this->session->flashdata('error_msg')){   
                  echo "<div class='alert alert-danger'>".$this->session->flashdata('error_msg')."</div>";  
              }?>
            <div class="card card-primary">
              <div class="card-header">
                <img alt="image" src="<?=base_url();?>assets/logo.jpg" class="" style="width: 200px; height: 70px;">
                <h4>Service App Employee Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="<?=base_url()?>emplogin/login" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Employee Phone Number</label>
                    <input id="email" type="text" class="form-control" name="employee_phone_number" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                        <div class="float-right">
                        <a href="#" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="<?=base_url();?>assets1/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?=base_url();?>assets1/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?=base_url();?>assets1/js/custom.js"></script>
</body>
</html>