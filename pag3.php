<?php
    function fechaUSaLetra($fecha){
        $fechaLetra =" ";
        $partes = explode ("-",$fecha); //toma un comodin en cadena y convierte la fecha en arreglo
        $meses = ["Enero","Febrero","Marzo",
                  "Abril","Mayo","Junio",
                  "Julio","Agosto", 
                  "Septiembre","Octubre",
                  "Noviembre","Diciembre"];
        $fechaLetra = $partes [2] ." de ".
          $meses [ $partes[1]-1 ] ." de ". //el . concatena pedazos de cadenas
          $partes[0];
          return $fechaLetra;
    }

$fecha = $_GET["fecha"];
$fechaLetra = fechaUSaLetra($fecha);
?>

<html>
  <head>

  </head>
  <body>
    <h1>Fechas</h1>
    <p>La Fecha <?php echo $fecha ?> en letra es: <?php echo $fechaLetra ?></p>
  </body>
</html>