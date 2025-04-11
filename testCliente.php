<?php
    include_once 'Cliente.php';
    include_once 'Moto.php';
    include_once 'Venta.php';

    $nuevoCliente = new Cliente("Paula", "Viggiano", "Activo", "Dni", 30410155);

    echo $nuevoCliente;

    $nuevaMoto = new Moto("M-08945", 1100000, 2023, "Kawasaky", 10, true);

    echo $nuevaMoto;

    echo "El valor de la moto es: $" . $nuevaMoto -> darPrecioVenta() . ".-\n";

   




?>