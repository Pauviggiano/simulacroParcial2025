<?php
    class Moto {
        //ATRIBUTOS - VARIABLES INSTANCIA
        private $codigo;
        private $costo;
        private $anioFabricacion;
        private $descripcion;
        private $porcentajeIncrementoAnual;
        private $estado;

        //METODO CONSTRUCTOR
        public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $estado)
        {
            $this -> codigo = $codigo;
            $this -> costo = $costo;
            $this -> anioFabricacion = $anioFabricacion;
            $this -> descripcion = $descripcion;
            $this -> porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
            $this -> estado = $estado;
        }

        //METODO DE ACCESO GET
        public function getCodigo() {
            return $this->codigo;
        }

        
        public function getCosto() {
            return $this->costo;
        }

        
        public function getAnioFabricacion() {
            return $this->anioFabricacion;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function getPorcentajeIncrementoAnual() {
            return $this->porcentajeIncrementoAnual;
        }

        public function getEstado() {
            return $this->estado;
        }

        //METODO DE ACCESO SET
        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        public function setCosto($costo)  {
            $this->costo = $costo;
        }

        public function setAnioFabricacion($anioFabricacion) {
            $this->anioFabricacion = $anioFabricacion;
        }

      
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

    
        public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual) {
            $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        }

        public function setEstado($estado) {
            $this->estado = $estado;
        }

        //METODO TOSTRING
        public function __toString() {
            $mensaje = "El codigo de la moto es: " . $this -> getCodigo() . "\n";
            $mensaje .= "Costo: $" . $this -> getCosto() . "\n";
            $mensaje .= "Año de fabricacion: " . $this -> getAnioFabricacion() . "\n";
            $mensaje .= "Descripcion: " . $this -> getDescripcion() . "\n";
            $mensaje .= "Porcentaje de incremento anual: " . $this -> getPorcentajeIncrementoAnual() . "\n";
            $mensaje .= "Estado: " . $this -> getEstado() . "\n";

            return $mensaje;
        }

        public function darPrecioVenta() {
            $_venta = -1;
            $_compra = $this -> getCosto();
            $anio = Date("Y");
            $anioFab = $anio - $this -> getAnioFabricacion();
            $por_inc_anual = $this -> getPorcentajeIncrementoAnual();
            $estadoMoto = $this -> getEstado();

            if ($estadoMoto) {
                $_venta = $_compra + $_compra * ($anioFab * $por_inc_anual);

            }

            return $_venta;
        }


    }



?>