<?php
require_once 'verificar_sesion.php';
require_once 'conexionbd.php';

// Obtener productos
$productos = $conexion->query("SELECT CodProd, NombreProd, PrecioV FROM Productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Realizar Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script>
     //Contenedores para agregar productos   
    function agregarProducto() {
        const contenedor = document.getElementById('productos');
        const item = document.querySelector('.producto-item').cloneNode(true);
        item.querySelector('select').value = '';
        item.querySelector('input').value = '';
        contenedor.appendChild(item);
    }
    //Elimina la fila de un producto
    function eliminarProducto(btn) {
        const contenedor = document.getElementById('productos');
        if (contenedor.children.length > 1) {
            btn.parentElement.parentElement.remove();
        }
    }
    </script>

</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<div class="container mt-4">
    <h2>🛒 Realizar Venta</h2>
    <form action="procesar_venta.php" method="POST">



        <div id="productos">
            <div class="row g-3 producto-item mb-2">
                <div class="col-md-6">
<!-- Crea el menú desplegable para elegir productos -->
                    <select name="producto[]" class="form-select" onchange="mostrarPrecio(this)" required>
                        <option value="">-- Seleccione un producto --</option>
                        <!-- bucle que recorre los resultados al consultar la BD -->
                        <?php 
                        $productos->data_seek(0); // Reiniciar puntero de resultados
                        while ($prod = $productos->fetch_assoc()): ?>
                            <option value="<?= $prod['CodProd'] ?>" data-precio="<?= $prod['PrecioV'] ?>">
                                <?= $prod['NombreProd'] ?>
                            </option>
                         <?php endwhile; ?>
                    </select>
                    <!-- Campo donde se mostrará el precio -->


                </div>
                <div class="col-md-4">
                    <input type="number" name="cantidad[]" class="form-control" placeholder="Cantidad" min="1" required>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control precio-unitario" placeholder="Precio" readonly>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger" onclick="eliminarProducto(this)">✖</button>
                </div>
            </div>
        </div>
        <br>

        <button type="button" class="btn btn-secondary mb-3" onclick="agregarProducto()">➕ Agregar otro producto</button>
        <br>

        <div class="col-md-1">
            <label for="total" class="form-label">💲 Total:</label>
            <input type="text" id="total" class="form-control" value="0.00" readonly>
        </div>

        <div class="col-md-6">
            <label for="tipo_pago" class="form-label">💳 Tipo de pago</label>
            <select class="form-select" name="tipo_pago" id="tipo_pago" required>
                <option value="">-- Seleccione un tipo de pago --</option>
                <option value="efectivo">Efectivo</option>
                <option value="tarjeta">Tarjeta</option>
                <option value="transferencia">Transferencia</option>
                </select>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">💾 Registrar Venta</button>
    </form>
</div>

<script>
function mostrarPrecio(select) {
  const fila = select.closest('.producto-item');
  const precioInput = fila.querySelector('.precio-unitario');
  const precio = select.selectedOptions[0]?.dataset.precio || 0;
  precioInput.value = parseFloat(precio).toFixed(2);

  calcularTotal();
}

function calcularTotal() {
  let total = 0;
  document.querySelectorAll('.producto-item').forEach(fila => {
    const select = fila.querySelector('select');
    const cantidad = parseInt(fila.querySelector('input[name="cantidad[]"]').value) || 0;
    const precio = parseFloat(select.selectedOptions[0]?.dataset.precio || 0);
    total += precio * cantidad;
  });
  document.getElementById('total').value = total.toFixed(2);
}

function agregarProducto() {
  const contenedor = document.getElementById('productos');
  const original = document.querySelector('.producto-item');
  const clon = original.cloneNode(true);

  // Limpiar campos
  clon.querySelector('select').value = '';
  clon.querySelector('input[name="cantidad[]"]').value = '';
  clon.querySelector('.precio-unitario').value = '';

  contenedor.appendChild(clon);
}

function eliminarProducto(btn) {
  const fila = btn.closest('.producto-item');
  const contenedor = document.getElementById('productos');
  if (contenedor.children.length > 1) {
    fila.remove();
    calcularTotal();
  }
}

// Actualizar total al escribir cantidad
document.addEventListener('input', function(e) {
  if (e.target.matches('input[name="cantidad[]"]')) {
    calcularTotal();
  }
});
</script>
</body>
</html>