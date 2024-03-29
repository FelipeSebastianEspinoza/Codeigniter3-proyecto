<?php
include 'headers/header1.php';
?>

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>


                </div>
                <?php
                $attributes = array('id' => 'form_login');
                echo form_open('', $attributes);
                ?>
                <!--
                    <div class="form-group" id="correo_usuario">
                      <input type="email" class="form-control form-control-user" id="InputEmail" name="correo_usuario" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>   -->

                <div class="form-group" id="correo_usuario">

                  <input type="email" id="inputEmail" name="correo_usuario" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                  <div class="invalid-feedback" id="inputEmailText">

                  </div>
                </div>

                <div class="form-group" id="password_usuario">

                  <input type="password" id="inputPassword" name="password_usuario" class="form-control form-control-user" placeholder="Enter Password...">
                  <div class="invalid-feedback" id="inputPasswordText">

                  </div>
                </div>


                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                  </div>
                </div>
                <div class="form-group" id="correo_usuario">

                  <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-primary btn-user btn-block', 'value' => 'Login']); ?>
                  <hr>

                  <?php // echo form_reset(['type'=>'reset','value'=>'Reset']); 
                  ?>
                  <hr>
                </div>

                <div class="" role="alert" id="alert">

                </div>

                <div class="text-center">
                  <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?php echo site_url('Login/registrarUsuario'); ?>">Crear Nuevo Usuario</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>






<?php
include 'footers/footer1.php';
?>

<script>
  (function($) {
    $("#form_login").submit(function(ev) {
      ev.preventDefault();
      $.ajax({
        type: 'POST',
        url: "<?php echo site_url() . '/login/validarajax' ?>",
        data: $(this).serialize(),
        success: function(data) {
          document.getElementById("inputEmail").classList.remove("is-invalid");
          document.getElementById("inputPassword").classList.remove("is-invalid");
          var json = JSON.parse(data);
          window.location = "<?php echo site_url('dashboard'); ?>";
          document.getElementById("alert").classList.remove("alert-danger")
          document.getElementById("alert").innerHTML = "";
        },
        statusCode: {
          400: function(xhr) {
            document.getElementById("inputEmail").classList.remove("is-invalid");
            var json = JSON.parse(xhr.responseText);
            if (json.correo_usuario.length != 0) {
              document.getElementById("inputEmail").classList.add("is-invalid");
              document.getElementById("inputEmailText").innerHTML = json.correo_usuario;
            }
            document.getElementById("inputPassword").classList.remove("is-invalid");
            if (json.password_usuario.length != 0) {
              document.getElementById("inputPassword").classList.add("is-invalid");
              document.getElementById("inputPasswordText").innerHTML = json.password_usuario;
            }
          },
          401: function(xhr) {
            document.getElementById("inputEmail").classList.remove("is-invalid");
            document.getElementById("alert").classList.add("alert-danger")
            document.getElementById("alert").innerHTML = "" + JSON.parse(xhr.responseText).msg + "";
          }
        },
      });
      ev.preventDefault();
    });
  })(jQuery)
</script>