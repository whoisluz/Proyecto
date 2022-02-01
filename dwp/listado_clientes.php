<?php include("header.php");?>

<div class="container">
  <div class="table-wrapper">
    <div class="table-tittle">
      <div class="row">
        <div class="col-sm-8"><h2>Listado de clientes</h2></div>
      </div>
    </div>
  </div>
  <table class="table table-bordered" id="listado_clientes">
    <thead>
      <th>ID</th>
      <th>Nombre completo</th>
      <th>Teléfono</th>
      <th>Dirección</th>
      <th>Correo electrónico</th>
      <th>Acciones</th>
    </thead>
    <tbody>
       <?php include('database.php'); 

        $clientes = new Database();
        $listado = $clientes->listadoclientes();
        while($row=mysqli_fetch_object($listado)){
          $id = $row->id;
          $nombres = $row->nombres." ".$row->apellidos;
          $telefono=$row->telefono;
          $direccion=$row->direccion;
          $email=$row->correo_electronico;
        
       ?>
       <tr>
         <td><?php echo $id; ?></td>
         <td><?php echo $nombres; ?></td>
         <td><?php echo $telefono; ?></td>
         <td><?php echo $direccion; ?></td>
         <td><?php echo $email; ?></td>
         <td><a href="update.php?id=<?php echo $id; ?>" class="edit btn btn-warning" title="Editar" data-toggle="tooltip">Editar<a>
         <a href="delete.php?id=<?php echo $id; ?>" class="delete btn btn-danger" title="Borrar" data-toggle="tooltip">Eliminar</a></td>
       </tr>

     <?php } ?>

    </tbody>
    
  </table>
</div>
     

<?php include("footer.php");?>