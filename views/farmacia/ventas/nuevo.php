<?php
require_once 'views/farmacia/includes/header.php';
require_once 'views/farmacia/includes/sidebar.php';
?>

<div class="main-panel">
  <?php
  require_once 'views/farmacia/includes/navbar.php';
  ?>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Nueva Orden</h4>
          </div>
          <div class="card-body">
            <form action="<?=URL?>ordenes/listar" method="POST">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputEmail4">Cedula Cliente</label>
                  <input type="text" class="form-control" name="id_cliente">
                </div>

              <div class="form-group col-md-3">
                  <label for="inputEmail4">Precio Producto</label>
                  <input type="text" class="form-control" name="cod_producto" class="monto" onkeyup="multi();">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputEmail4" >Cantidad</label>
                  <input type="text" class="form-control" name="cantidad" class="monto" onkeyup="multi();" >
                </div>
                <div class="form-group col-md-6">
                <label for="tipoProducto" '> Metodo Pago </label>
                <select name='cod_metodoPago' class="form-control" required>
                  
                    <option value="1">
                      Datafono
                    </option>
                    <option value="2">
                      Efectivo
                    </option>
                 
                </select>
                  </div>
                <div class="form-group col-md-3">
                  <label for="inputEmail4">fecha</label>
                  <input type="date" class="form-control" name="fecha">
                </div>
              </div>
                  </div>
            
              
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputEmail4">Usuario</label>
                  <input type="text" class="form-control" name="usuario">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputEmail4">Total</label>
                  <input type="text" class="form-control" name="Costo" disabled>
                </div>
              </div>
             

              <button type="submit" class="btn btn-primary">Ordenar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once 'views/farmacia/includes/navbar.php';
?>

</div>

<?php
require_once 'views/farmacia/includes/scripts.php';
?>