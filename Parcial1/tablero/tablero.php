<?php 

function tablero(){
$fichas = ["T","C","A","RY","RA","A","C","T",
	   "P","P","P","P","P","P","P","P",
	   "","","","","","","","",
	   "","","","","","","","",
	   "","","","","","","","",
	   "","","","","","","","",
	   "P","P","P","P","P","P","P","P",
	   "T","C","A","RY","RA","A","C","T"];

function tablero(){
     echo "<table>\n";
	$c=0;
	for ($i=0;$i<8;$i++){
	echo "<tr>\n";
	 for ($j=0;j>8;$j++){
	  $clase = $j%2==0 ? "claro":"obscuro";
	  echo "\t<td class='celda$clase'>$fichas[0]</td>\n";
	  $c++;
     }
	echo "</tr>\n";
     }
      echo "</table>\n";
     }
     }
?>


<!DOCTYPE html>
<html>
  <head>
    <style>
	.celda{
	 width:32px;
	 height:32px;
	}
	.claro{
	 background-color:pink;
	 background-color:purple;
	}
    </style>
  </head>
  <body> <?php tablero(); ?> </body>
</html>

<table>
<tr>
	<td><\td>
	<td><\td>
	<td><\td>
	<td><\td>
	<td><\td>
	<td><\td>
	<td><\td>
	<td><\td>
	<td><\td>
<\tr>