<?php

    include_once 'Moto.php';
    class Venta {
        //ATRIBUTOS - VARIABLES INSTANCIA
        private $numero;
        private $fecha;
        private $cliente;
        private $motos;
        private $precioFinal;

        //METODO CONSTRUCTOR
        public function __construct($numero, $fecha, $cliente, $motos, $precioFinal){
            $this -> numero = $numero;
            $this -> fecha = $fecha;
            $this -> cliente = $cliente;
            $this -> motos = $motos;
            $this -> precioFinal = $precioFinal;

        }

        //METODO DE ACCESO GET
        public function getNumero() {
            return $this->numero;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function getCliente(){
            return $this-> cliente;
        }

        public function getMotos(){
            return $this->motos;
        }
 
        public function getPrecioFinal(){
            return $this->precioFinal;
        }

        //METODOS DE ACCESO SET
        public function setNumero($numero){
            $this->numero = $numero;

        }

        public function setFecha($fecha){
            $this->fecha = $fecha;

        }

        public function setCliente($cliente){
            $this -> cliente = $cliente;

        }

        public function setMotos($motos){
            $this->motos = $motos;
        
        }

        public function setPrecioFinal($precioFinal){
            $this->precioFinal = $precioFinal;

        }

        //METODO TO STRING
        public function __toString() {
            $mensaje = "Numero de venta: " . $this -> getNumero() . "\n";
            $mensaje .= "Fecha: " . $this -> getFecha() . "\n";
            $mensaje .= "Cliente: " . $this -> getCliente() . "\n";
            $mensaje .= "Moto: " . $this -> getMotos() . "\n";
            $mensaje .= "Precio Final: $" . $this -> getPrecioFinal() . "\n";

            return $mensaje;
        }

        /** Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
         * incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
         *vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
         *Utilizar el método que calcula el precio de venta de la moto donde crea necesario 
         * @param object
        */

        public function incorporarMoto($objMoto) {
            if ($objMoto -> getEstado()) {
                if ($objMoto -> darPrecioVenta() > 0) {
                    $this -> getMotos()[] = $objMoto;
                    $suma = $objMoto -> getCosto() + $this -> getPrecioFinal();
                    $this -> setPrecioFinal($suma);
                }
            }
        }
    }

?>