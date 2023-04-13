<?php
require(dirname(__FILE__, 1) . '/bootstrap.php');


//Todas las revistas del sistema.
echo "<br> Todas las revistas del sistema <br>";
$revistasAll = $entityManager->getRepository("Revista")->findAllRevistas();
foreach($revistasAll as $revista) {
    echo $revista;
    echo "<br>";

    $sucursal = $revista->getSucursal();
    echo $sucursal;
    echo "<br>";

    foreach($sucursal->getEmpleados() as $empleado){
        echo $empleado;
        echo "  ";
    }
}

//Listado de revistas del tipo “Deporte”.
echo "<br> <br> Listado de revistas del tipo Deporte <br>";
$revistasDeporte = $entityManager->getRepository("Revista")->findAllByTipoDeporte();
print_r($revistasDeporte);

//La sucursal de la revista con id 123”. 
echo "<br> <br> La sucursal de la revista con id 123 <br>";
$sucursalRevista = $entityManager->getRepository("Revista")->findSucursalByRevistaId('1');
print_r($sucursalRevista);

//Listado de periodistas junto al periódico al que pertenecen
echo "<br> <br> Listado de periodistas junto al periódico al que pertenecen <br>";
$periodistaRevista = $entityManager->getRepository("Revista")->findPeriodistasByRevistaId('1');
print_r($periodistaRevista);

//Numero de revistas publicadas por la revista con id “123”.
echo "<br> <br> Numero de revistas publicadas por la revista con id “123” <br>";
$periodistaRevista = $entityManager->getRepository("Revista")->numberEjemplareByRevista('1');
print_r($periodistaRevista);

//Numero de total de revistas vendidas por la revista con id “123”.
echo "<br> <br> Numero de total de revistas vendidas por la revista con id “123” <br>";
$periodistaRevista = $entityManager->getRepository("Revista")->sumaVentasEjemplareByRevista('1');
print_r($periodistaRevista);

//Números de la revista con título “Inventado” que tengan más de 500 ventas.
echo "<br> <br> Números de la revista con título “Inventado” que tengan más de 500 ventas. <br>";
$periodistaRevista = $entityManager->getRepository("Revista")->findEjemplarByTiTuloAndVentas('Inventado', '100');
print_r($periodistaRevista);