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
                     
 <div>
  <?php 
  if(isset($msg)){
    echo $msg;
  }
  ?>
</div>
                  </div>
                  <?php 
                  $attributes = array('id' => 'form_login');
                  echo form_open('login/create', $attributes);       
                  ?>  
                    <div class="form-group" id="correo_usuario">
                      <input type="email" class="form-control form-control-user" id="InputEmail" name="correo_usuario" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="InputPassword" name="password_usuario" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <?php echo form_submit(['type'=>'submit','class' =>'btn btn-primary btn-user btn-block','value'=>'Login']); ?>
                    <hr>
                    
                    <?php echo form_reset(['type'=>'reset','value'=>'Reset']); ?>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                  <a class="small" href="<?php echo site_url('Usuarios_c/crear'); ?>">Crear Nuevo Usuario</a>
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

(function($){
  $("#form_login").submit(function(ev){ 
    ev.preventDefault();
      $.ajax({
        type:'POST',
        url: "<?php echo site_url().'/login/validarajax' ?>",
        data: $(this).serialize(),
        success: function(data){
          var json = JSON.parse(data); 
              console.log(json.correo_usuario);
      },
      error: function(){

      },
    });
  });
})(jQuery)


</script>


 