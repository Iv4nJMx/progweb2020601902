<?php
  function suma ($a, $b){
	return $a + $b;
}

$a= $_GET["a"];
$b= $_GET["b"];
$c= suma($a,$b);

?>
<html>
  <head>
   <title>Suma de dos numeros</title>
  </head>
  <body>
    <p><?php echo $a ?> + <?php echo $b ?> = <?php echo $c ?></p>
  </body>
</html>