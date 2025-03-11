<?php
$x=2;
$w = sqrt(pow(2*$x,2) + pow(3, 2))/5;
$y = sqrt(pow($x,2));
$z = $w + $y;
?>

<html> 
  <body>
    <h2>c) Si X=2 determinar: </h2>
    <img src="images/3.png" width="400" height="200"/>
    <h2><span style="color:red">Resultado = </span><?php printf("%.2f",$z) ?></h2>
  </body>
</html>