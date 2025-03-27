<html>
    <head>
    <title>Serie de Fibonacci </title>
</head>
        <body>
        <h1>Serie Fibonacci</h1>
            <?php
            $Num1=0;
            $Num2=1;
            for($i=0; $i<2048; $i++){
                printf("%d </br>",$Num1);  
                $Num3 = $Num1 + $Num2;
                $Num1 = $Num2;
                $Num2 = $Num3;
            }
            ?>
        </body>
</html>
