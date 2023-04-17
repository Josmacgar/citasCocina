<?php
use Doctrine\Common\Collections\ArrayCollection;
require_once dirname(__FILE__, 1) . "/bootstrap.php";
require_once dirname(__FILE__, 1) . "/Entity/Usuario.php";


// $profesor = new Profesor();
// $profesor->setDni('49123288A');
// $profesor->setNombre('Jose Antonio');
// $profesor->setApellidos('Macho Garcia');
// $profesor->setFecha_nac(2023-04-10);
// $profesor->setEmail('aguila.elenita@gmail.com');
// $profesor->setTelefono(609044332);
// $profesor->setBaneado(0);
// // La persistencia se añade a cada objeto, al final se tiene que hacer un flush
// $entityManager->persist($profesor);

$resultado = $entityManager->getRepository("Profesor")
    ->findOneBy(array('dni' => '5555'));
    
echo($resultado);
// $result = $entityManager->getRepository("Profesor")
//     ->findAll();
// print_r($result);
// $noticia= new Noticias();
// $noticia->setProfesor($result);
// $noticia->setTitulo('noticia1');
// $noticia->setCuerpo('cuerpo');
// $noticia->setFecha(2023-04-10);
// $entityManager->persist($noticia);



// $empleado = new Empleado();
// $empleado->setDni_empleado("12345678A");
// $empleado->setTelefono(123456789);
// // La persistencia se añade a cada objeto, al final se tiene que hacer un flush
// $entityManager->persist($empleado);

// $empleado2 = new Empleado();
// $empleado2->setDni_empleado("12345678W");
// $empleado2->setTelefono(123456789);
// $entityManager->persist($empleado2);

// $ejemplar = new Ejemplar();
// $ejemplar->setFecha("30-01-2023");
// $ejemplar->setNPagina("20");
// $ejemplar->setNCopias("200");
// $entityManager->persist($ejemplar);

// $periodista = new Periodista();
// $periodista->setDni_periodista("987456432B");
// $periodista->setTelefono(987456123);
// $periodista->setEspecialidad("Deporte");
// $entityManager->persist($periodista);

// $periodista2 = new Periodista();
// $periodista2->setDni_periodista("15935785B");
// $periodista2->setTelefono(789456123);
// $periodista2->setEspecialidad("Cine");
// $entityManager->persist($periodista2);

// $sucursal = new Sucursal();
// $sucursal->setDomicilio("C/Falsa");
// $sucursal->setTelefono("741852963");
// $empleadosSucursal = new ArrayCollection([$empleado]);
// $empleadosSucursal->add($empleado2);
// $sucursal->setEmpleados($empleadosSucursal);
// $entityManager->persist($sucursal);

// $revista = new Revista();
// $revista->setTitulo("Inventado");
// $revista->setPeriocidad("Mensual");
// $revista->setTipo("Deporte");
// $revista->setPeriodista(new ArrayCollection([$periodista, $periodista2]));
// //Como la revista solo tiene una sucursal no se usa un arrayCollection
// $revista->setSucursal($sucursal);
// $revista->setEjemplar(new ArrayCollection([$ejemplar]));
// $entityManager->persist($revista);

$entityManager->flush();
