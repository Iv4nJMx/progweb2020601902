<?php
ini_set("display_errors",E_ALL); 
    include_once "alumno.php";
    $lista = [
        new Alumno("FREDI", "ALVARADO", "6", "6", "10"),
        new Alumno("OSVALDO", "AREVALO", "3", "7", "10"),
        new Alumno("GERARDO", "ARIAS", "8", "2", "5"),
        new Alumno("BENJAMIN", "CAMPOS", "4", "10", "8"),
        new Alumno("OMAR", "CAMBRIA", "7", "3", "7"),
        new Alumno("IVAN", "CARBAJAL", "0", "9", "7"),
        new Alumno("ISAAC", "CASTILLO", "8", "3", "9"),
        new Alumno("JAVIER", "CASTRO", "1", "2", "5"),
        new Alumno("GUADALUPE", "CHAVEZ", "9", "3", "5"),
        new Alumno("ANTONIO", "CHABELO", "8", "10", "7"),
        new Alumno("JACQUELINE", "CLIMACO", "7", "9", "9"),
        new Alumno("URIEL", "COLIN", "7", "6", "8"),
        new Alumno("ANTONIO", "CUATECO", "9", "7", "10"),
        new Alumno("ABIGAIL", "DIAZ", "8", "8", "8"),
        new Alumno("JAQUELINE", "ESPARZA", "6", "8", "6"),
        new Alumno("JOEL", "ESPINOSA", "7", "10", "7"),
        new Alumno("ALBERTO", "ESQUIVEL", "9", "8", "10"),
        new Alumno("PABLO", "FAUSTINO", "8", "8", "8"),
        new Alumno("IVAN", "GARCIA", "6", "10", "7"),
        new Alumno("ALEJANDRO", "GOMEZ", "10", "8", "8"),
        new Alumno("ALDAIR", "GONZALEZ", "7", "10", "9"),
        new Alumno("EDUARDO", "HERNANDEZ", "9", "8", "6"),
        new Alumno("MONTSERRAT", "HURTADO", "6", "10", "10"),
        new Alumno("HUMBERTO", "LEON", "6", "9", "9"),
        new Alumno("KEVIN", "LIRA", "6", "9", "9"),
        new Alumno("OMAR", "LOBATO", "2", "8", "9"),
        new Alumno("GUADALUPE", "LOPEZ", "3", "8", "5"),
        new Alumno("LETICIA", "MARTINEZ", "8", "6", "3"),
        new Alumno("ESMERALDA", "MENDOZA", "8", "9", "8"),
        new Alumno("RODOLFO", "MOCIÑOS", "6", "9", "8"),
        new Alumno("ANGEL", "MONDRAGON", "8", "4", "6"),
        new Alumno("ZURIZADAI", "MORALES", "8", "0", "8"),
        new Alumno("MONSERRAT", "MORENO", "2", "3", "8"),
        new Alumno("EDUARDO", "NUÑEZ", "8", "7", "7"),
        new Alumno("ROBERTO", "OLVERA", "10", "8", "6"),
        new Alumno("CARLOS", "PEREZ", "8", "7", "9"),
        new Alumno("GUSTAVO", "PORTILLO", "3", "6", "6"),
        new Alumno("CARLOS", "ROMERO", "9", "4", "0"),
        new Alumno("IVAN", "SANCHEZ", "7", "6", "7"),
        new Alumno("AXEL", "TELLEZ", "0", "8", "8"),
        new Alumno("EDGAR", "TAVERA", "1", "6", "6"),
        new Alumno("MIGUEL", "VALERO", "6", "7", "4"),
        new Alumno("ARMANDO", "VARGAS", "6", "4", "9"),
        new Alumno("ALEXIS", "YAÑEZ", "6", "10", "1"),
   ];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
    <style>
        //Colocar estilos para la tabla
    </style>
</head>
<body>

    <h2>Tabla de Calificaciones</h2>

    <table>
        <thead>
            <tr>
                <th>Apellidos</th>
                <th>Nombre</th>
                <th>Parcial 1</th>
                <th>Parcial 2</th>
                <th>Parcial 3</th>
                <th>Promedio Final</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($lista as $p): ?>
                <tr>
                    <td><?php echo $p->getApellido()?></td>
                    <td><?php echo $p->getNombre()?></td>
                    <td><?php echo $p->getp1()?></td>
                    <td><?php echo $p->getp2()?></td>
                    <td><?php echo $p->getp3()?></td>
                    <td><?php echo $p->getfinal()?></td>
                </tr>
                <?php endforeach?>
        </tbody>
    </table>
<h2>Alumnos Aprobados: </h2>
</body>
</html>
