<?php
require_once 'verificar_sesion.php';
if (!in_array($_SESSION['rol'], ['Administrador'])) {
    exit("Acceso no autorizado.");
}

require_once 'conexionbd.php';
require 'vendor/autoload.php';

use Dompdf\Dompdf;

$sql = "SELECT V.Num_Venta, V.FechaHora, P.NombreProd, DV.Cantidad, V.MetodoPago, DV.Subtotal 
        FROM Ventas V 
        JOIN Detalle_Ventas DV ON V.Num_Venta = DV.V_Num_Venta 
        JOIN Productos P ON DV.P_CodProd = P.CodProd 
        ORDER BY V.Num_Venta DESC";

$resultado = $conexion->query($sql);

// Formato del HTML
$html = '
<h2 style="text-align:center;">Papeleria el Trebol</h2>
<h3 style="text-align:center;">Reporte de Ventas</h3>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#Venta</th>
            <th>Fecha</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Metodo de Pago</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>';
while ($row = $resultado->fetch_assoc()) {
    $html .= '
        <tr>
            <td>' . $row['Num_Venta'] . '</td>
            <td>' . $row['FechaHora'] . '</td>
            <td>' . $row['NombreProd'] . '</td>
            <td>' . $row['Cantidad'] . '</td>
            <td>' . $row['MetodoPago'] . '</td>
            <td>$' . number_format($row['Subtotal'], 2) . '</td>
        </tr>';
}
$html .= '
    </tbody>
</table>';

// Genera el PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("resumen_ventas.pdf", ["Attachment" => false]); // false para verlo en navegador
exit;