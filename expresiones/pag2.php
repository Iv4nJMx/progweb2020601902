<?php
$x=3;
$y = (((1/2)*$x) + ((3+$x)/2)*(2* pow($x,2)))/((2 + 3)*$x);
?>

<html> 
  <body>
    <h2>b) Para X=3 obtener: </h2>
    <img src="images/2.png" width="400" height="200"/>
    <h2><span style="color:red">Resultado = </span><?php printf("%.2f",$y) ?></h2>
  </body>
</html>