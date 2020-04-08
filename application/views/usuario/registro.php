<!DOCTYPE html>
<html lang="en">

<head>


<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Datatables-->
    <link href="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Datatables-->
  


</head>
</br>
<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>



              <?php 
                  $attributes = array('id' => 'form_register'); 
                  echo form_open('', $attributes);       
             ?>  
                    <div class="form-group row" id="nombre_usuario">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" id="inputNombre" name="nombre_usuario" class="form-control form-control-user"   placeholder="Escriba su nombre...">
                      <div class="invalid-feedback" id="inputNombreText">
                      </div>
                      </div>
                      <div class="col-sm-6" id="apellido_usuario">
                      <input type="text" id="inputApellido" name="apellido_usuario" class="form-control form-control-user"   placeholder="Escriba su apellido...">
                      <div class="invalid-feedback" id="inputApellidoText">
                      </div>
                      </div>
                    </div>

                    <div class="form-group" id="correo_usuario">
                      <input type="text" id="inputCorreo" name="correo_usuario" class="form-control form-control-user"   placeholder="Escriba su correo...">
                      <div class="invalid-feedback" id="inputCorreoText">
                      </div>
                    </div>
 
                    <div class="form-group row" id="password_usuario"> 
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" id="inputPassword" name="password_usuario" class="form-control form-control-user"   placeholder="Escriba su contraseña...">
                      <div class="invalid-feedback" id="inputPasswordText">
                      </div>
                      </div>
                      <div class="col-sm-6" id="passwordConfirm_usuario">
                      <input type="text" id="inputPasswordConfirm" name="confirm" class="form-control form-control-user"   placeholder="Vuelva es escribir su contraseña...">
                      <div class="invalid-feedback" id="inputPasswordConfirmText">
                      </div>
                      </div>
                    </div>                   
                  </br>
                <?php echo form_submit(['type'=>'submit','class' =>'btn btn-primary btn-user btn-block','value'=>'Login']); ?>
                <hr>
 
              </form>





              </br>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?php echo site_url('login'); ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
   


  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

</body>

</html>


 








<script>
(function($){
  $("#form_register").submit(function(ev){ 
    ev.preventDefault();
      $.ajax({ 
        type:'POST',
        url: "<?php echo site_url().'/login/validaraUsuarioajax' ?>",
        data: $(this).serialize(),
        success: function(data){
           document.getElementById("inputNombre").classList.remove("is-invalid"); 
           document.getElementById("inputApellido").classList.remove("is-invalid");  
           document.getElementById("inputCorreo").classList.remove("is-invalid"); 
           document.getElementById("inputPassword").classList.remove("is-invalid"); 
          var json = JSON.parse(data);   
          window.location = "<?php  echo site_url('dashboard'); ?>";           
      },
     statusCode: {
           400: function(xhr){
               document.getElementById("inputNombre").classList.remove("is-invalid"); 
               document.getElementById("inputApellido").classList.remove("is-invalid"); 
               document.getElementById("inputCorreo").classList.remove("is-invalid"); 
               document.getElementById("inputPassword").classList.remove("is-invalid");  
             var json = JSON.parse(xhr.responseText);
             if(json.nombre_usuario.length !=0){  
                 document.getElementById("inputNombre").classList.add("is-invalid");
                 document.getElementById("inputNombreText").innerHTML = json.nombre_usuario;   
             }
             if(json.apellido_usuario.length !=0){
                 document.getElementById("inputApellido").classList.add("is-invalid");
                 document.getElementById("inputApellidoText").innerHTML = json.apellido_usuario;   
             }
             if(json.correo_usuario.length !=0){
                 document.getElementById("inputCorreo").classList.add("is-invalid");
                 document.getElementById("inputCorreoText").innerHTML = json.correo_usuario;   
             }
             if(json.password_usuario.length !=0){
                 document.getElementById("inputPassword").classList.add("is-invalid");
                 document.getElementById("inputPasswordText").innerHTML = json.password_usuario;   
             }
 
           }, 401: function(xhr){     
        //     document.getElementById("inputEmail").classList.remove("is-invalid");  
         //    document.getElementById("alert").classList.add("alert-danger")
         //    document.getElementById("alert").innerHTML = ""+JSON.parse(xhr.responseText).msg+"";  
           }
      },
    });
    ev.preventDefault();
  });
})(jQuery)
</script>


 