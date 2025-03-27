<?php
ini_set("display_errors",E_ALL); 
    include_once "persona.php";
    $lista = [
        new Persona("Andrea","1999-03-27","5616987536"),
        new Persona("Ivan", "1998-05-16","5571053012"),
        new Persona("Karina", "1982-05-07","5523648956"),
        new Persona("Ricardo", "1978-01-30","5532456987"),
        new Persona("Abraham", "2000-02-12","5520146732"),
        new Persona("Alicia", "1962-05-15","5523495761"),
        new Persona("Alfredo", "1978-12-18","5528964555"),
        new Persona("Alejandro", "1998-09-23","5632479865"),
        new Persona("Marcos", "1972-10-30","5531196472"),
    ];
?>    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de Personas</title>
        <style>
            td {
                background-color:cyan;
            }
        </style>
    </head>
    <body>
        <h1>Lista de Personas</h1>
        <table border>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Nacimiento</th>
                    <th>Edad Actual</th>
                    <th>Telefono</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista as $p): ?>
                <tr>
                    <td><?php echo $p->getNombre()?></td>
                    <td><?php echo $p->getFecNac()?></td>
                    <td><?php echo $p->getEdad()?></td>
                    <td><?php echo $p->getTel()?></td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </body>
</html>
</DOCTYPE>