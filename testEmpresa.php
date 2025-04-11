<?php
    include_once 'Cliente.php';
    include_once 'Moto.php';
    include_once 'Empresa.php';
    include_once 'Venta.php';

    //1.Creo dos instancias de la clase cliente - $objCliente1 $objCliente2
    $objCliente1 = new Cliente("Lisandro", "Temi", false, "Dni", 12345678);
    $objCliente2 = new Cliente("Ana", "Gonzalez", true, "Dni", 11234567);

    //2.Creo tres instancias moto con la info de la tabla - $objMoto1 $objMoto2 $objMoto3
    $objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
    $objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
    $objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

    //4.Creo un objeto empresa - $objEmpresa1
    $objEmpresa1 = new Empresa("Alta Gama", "Av. Argentina 123",[$objCliente1, $objCliente2],[$objMoto1, $objMoto2, $objMoto3], []);

    //5. 
    /* Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
     $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
     punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
    */
    $colCodigosMoto1 = [11,12,13];
    echo "---------Muestro el punto 5 registrarVenta--------------\n";
    $resultado1 = $objEmpresa1 -> registrarVenta($colCodigosMoto1, $objCliente2);
    echo "Resultado es: " . $resultado1  . "\n";
    echo "********************************************************\n";

    //6.
    /* Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
     $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
     punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido. 
    */
    echo "---------Muestro el punto 6 registrarVenta--------------\n";
    $colCodigosMoto2 = [0];
    $resultado2 = $objEmpresa1 -> registrarVenta($colCodigosMoto2, $objCliente2) . "\n";
    echo "Resultado es: " . $resultado2 . "\n";
    echo "********************************************************\n";

    //7.
    /* Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
     $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
     punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
    */
    echo "---------Muestro el punto 7 registrarVenta--------------\n";
    $colCodigosMoto3 = [2];
    $resultado3 = $objEmpresa1 -> registrarVenta($colCodigosMoto3, $objCliente2);
    echo "Resultado es: " . $resultado3 . "\n";
    echo "********************************************************\n";

    //8.
    /* Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
     corresponden con el tipo y número de documento del $objCliente1.
    */
    echo "-------Muestro el punto 8 retornarVentasXCliente--------\n";
    $resultadoVentasCliente = $objEmpresa1 -> mostrarListadoVentasCliente($objCliente1);
    echo $objCliente1;
    if ($resultadoVentasCliente != null) {
        echo $resultadoVentasCliente;
    } else {
        echo "No se ecnotraron ventas para el cliente \n";
    }
    echo "********************************************************\n";

    //9.
    /* Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
     corresponden con el tipo y número de documento del $objCliente2 
    */
    echo "-------Muestro el punto 9 retornarVentasXCliente--------\n";
    echo $objEmpresa1 -> mostrarListadoVentasCliente($objCliente2) ? $listado : "No se encontraron compras para el cliente\n";
    echo "********************************************************\n";

    //10/
    /* Realizar un echo de la variable Empresa creada en 2. */
    echo "--------------Muestro el punto 10 Empresa---------------\n";
    echo $objEmpresa1;
    echo "********************************************************\n";


?>