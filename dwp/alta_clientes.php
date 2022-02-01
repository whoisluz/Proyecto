  <?php 

    include("header.php");

  ?>

  <div class="container-fluid">
    
    <div class="col-sm-8">
      <h2>Agregar cliente</h2>
    </div>


  <?php
  include("database.php");
  $clientes = new Database(); //instanciar es crear un objeto en base a una clase
  if(isset($_POST) && !empty($_POST)){

    $nombres=$clientes->sanitize($_POST['nombres']);
    $apellidos=$clientes->sanitize($_POST['apellidos']);
    $telefono=$clientes->sanitize($_POST['telefono']);
    $direccion=$clientes->sanitize($_POST['direccion']);
    $correo_electronico=$clientes->sanitize($_POST['correo_electronico']);

    $res=$clientes->create($nombres,$apellidos,$telefono,$direccion,$correo_electronico);
    if($res){
      $message="Datos insertados con éxito";
      $class="alert alert-success";
    }else{

      $message="Datos insertados con éxito";
      $class="alert alert-danger";

    }
    ?>

    <div class="<?php echo $class; ?>"> <?php echo $message; ?></div>
    
  <?php  
  }

  ?>






      <div class="col-md-5">
        <form method="POST">
         
            <div class="col-md-12">
                  <label for=""></label>
                  <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Escribe tu(s) nombre(s)">    
            </div>

            <div class="col-md-12">
                  <label for=""></label>
                  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Escribe tus apellidos">    
            </div>

            <div class="col-md-12">
                  <label for=""></label>
                  <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Escribe tu número de teléfono">    
            </div>

            <div class="col-md-12">
                  <label for=""></label>
                  <textarea class="form-control" id="direccion" name="direccion" placeholder="Escribe tu dirección"></textarea>    
            </div>

            <div class="col-md-12">
                  <label for=""></label>
                  <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" placeholder="Escribe tu email">    
            </div><br>

            <div class="col-md-12 pull-right">
              <button type="submit" class="btn btn-success">Guardar registro</button>
            </div>
            
        </form>
      </div>
      
    </div>


       

  <?php 

    include("footer.php");

  ?>