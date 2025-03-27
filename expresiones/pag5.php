<?php
$x=4;
$a = (pow($x,2)/2) + (1/pow($x,1/2));
$b = 3 + (1/2*pow($x,3));

$z = sqrt($a / $b);
?>

<html> 
  <body>
    <h2>e) Si X=4 determinar: </h2>
    <img src="images/5.png" width="400" height="400"/>
    <h2><span style="color:red">Resultado = </span><?php printf("%.4f",$z) ?></h2>
  </body>
</html>