<?php
$x=2;
$a = 1/2 + 1/4 + 1/8;
$b = pow($x,1/3);
$c = pow($x,1/2) / 2;
$d = (3*pow($x,2)) / 4;

$z = ($a*$b)/($c+$d);
?>

<html> 
  <body>
    <h2>d) Si X=2 determinar: </h2>
    <img src="images/4.png" width="400" height="300"/>
    <h2><span style="color:red">Resultado = </span><?php printf("%.3f",$z) ?></h2>
  </body>
</html>