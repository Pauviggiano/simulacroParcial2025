<?php
    class Cliente {
        //Atributos o variables Instancia
        private $nombre;
        private $apellido;
        private $baja; //Podria cambiarlo por estado
        private $tipoDocumento;
        private $documento;

        //METODO CONSTRUCTOR
        public function __construct($nombre, $apellido, $baja, $tipoDocumento, $documento) {
            $this -> nombre = $nombre;
            $this -> apellido = $apellido;
            $this -> baja = $baja;
            $this -> tipoDocumento = $tipoDocumento;
            $this -> documento = $documento;
            
        }


        /* Metodos de acceso GET y SET */
        public function getNombre()
        {
             return $this->nombre;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;

        }

        public function getApellido()
        {
            return $this->apellido;
        }

        public function setApellido($apellido)
        {
            $this->apellido = $apellido;

          
        }

       
        public function getBaja()
        {
             return $this->baja;
        }

        public function setBaja($baja)
        {
            $this->baja = $baja;

            
        }

       
        public function getTipoDocumento()
        {
            return $this->tipoDocumento;
        }

       
        public function setTipoDocumento($tipoDocumento)
        {
            $this->tipoDocumento = $tipoDocumento;

        }

       
        public function getDocumento()
        {
            return $this->documento;
        }

      
        public function setDocumento($documento)
        {
            $this->documento = $documento;

        }


        //Metodo toString
        public function __tostring(){
            $mensaje = "Nombre: " . $this -> getNombre() . "\n";
            $mensaje .= "Apellido: " . $this -> getApellido() . "\n";
            $mensaje .= "Tipo de documento: " . $this -> getTipoDocumento() . "\n";
            $mensaje .= $this -> getDocumento() . "\n";
            $mensaje .= "El estado del cliente es: " . $this -> getBaja() ? "Activo" : "No activo" . "\n";

            return $mensaje;
        }
    }



?>