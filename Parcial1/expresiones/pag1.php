<?php
$x=2;
$y=4;
$z;
$z = 1/$x + ($x + $y)/3 + 2*($x/$y);
?>

<html> 
  <body>
    <h2>a) Para X=2, Y=4, obtener: </h2>
    <img src="images/1.png" width="400" height="200"/>
    <h2><span style="color:red">Resultado = </span><?php printf("%.2f",$z) ?></h2 >
  </body>
</html>