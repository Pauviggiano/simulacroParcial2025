<?php
    include_once 'Cliente.php';
    include_once 'Moto.php';
    include_once 'Venta.php';

    $nuevoCliente = new Cliente("Paula", "Viggiano", "Activo", "Dni", 30410155);

   /*  echo $nuevoCliente; */

    $nuevaMoto = new Moto("M-08945", 1100000, 2023, "Kawasaky", 0.10, true);

    /* echo $nuevaMoto; */

    echo "*************************************************************************************************";

    echo "El valor de la moto es: $" . $nuevaMoto -> darPrecioVenta() . ".-\n";

    $nuevaVenta = new Venta(1, 2025, $nuevoCliente , $nuevaMoto, 400000);
   echo $nuevaVenta; 

   




?>