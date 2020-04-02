 

<div>
  <?php 
  if(isset($valier)){
    echo "aqui va el error, se puede poner en un div";
    echo $valier;
  }
  ?>
</div>
 
<div>
<label>
 <h3>Nuevo Usuario</h3> 
</label></br>
<?php echo form_open('personas_c/insertarPersona');?>  
  <label for="fname">First name:</label><br>
  <?php echo form_input(['class'=>'form-control','placeholder'=>'Escriba el Nombre'
  ,'name'=>'nombre_personas']); ?>
  <label for="lname">Contraseña:</label><br>
  <?php echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Escriba su contraseña'
  ,'name'=>'password_personas']); ?>
  <?php echo form_submit(['type'=>'submit','value'=>'Submit']); ?>
  <?php echo form_reset(['type'=>'reset','value'=>'Reset']); ?>
</div>
 