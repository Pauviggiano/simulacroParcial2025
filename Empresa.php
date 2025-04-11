<?php
    class Empresa {
        //VARIABLES INSTANCIA - ATRIBUTOS
        private $denominacion;
        private $direccion;
        private $colClientes;
        private $colMotos;
        private $objVentas = [];

        //METODO CONSTRUCTOR
        public function __construct($denominacion, $direccion, $colClientes, $colMotos, $objVentas) {
            $this -> denominacion = $denominacion;
            $this -> direccion = $direccion;
            $this -> colClientes = $colClientes;
            $this -> colMotos = $colMotos;
            $this -> objVentas = $objVentas;
        }

        //METEDO DE ACCESO GET
        
        public function getDenominacion(){
            return $this->denominacion;
        }

        public function getDireccion(){
            return $this->direccion;
        }
         
        public function getColClientes(){
            return $this->colClientes;
        }
        
        public function getColMotos(){
            return $this->colMotos;
        }

        public function getobjVentas(){
            return $this->objVentas;
        }

        //METODOS DE ACCESO SET

        public function setDenominacion($denominacion){
            $this->denominacion = $denominacion;

        }
       
        public function setDireccion($direccion){
            $this->direccion = $direccion;

        }
    
        public function setColClientes($colClientes){
            $this->colClientes = $colClientes;

        }

        public function setColMotos($colMotos){
            $this->colMotos = $colMotos;

        }

        public function setobjVentas($objVentas){
            $this->objVentas = $objVentas;

        }

        /** Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
         * retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
         *@param int $codigoMoto
         *@return obj   
        */

        public function retornarMoto($codigoMoto) {
            $i = 0; //variable para recorrer posiciones de una coleccion
            $motoEncontrada = null; //declaro en null por si no encuentra la moto
            $cantMotos = count($this -> getcolMotos());//Indica la cantida de posiciones del arreglo colMotos

            //Recorro la coleccion de motos para saber si el codigo por parametros coincide con alguno de la col
            while ($i < $cantMotos && $motoEncontrada == null) {
                $moto = $this -> getColMotos()[$i]; //Con esto recorro el arreglo de motos guardando en cada iteracion el valor para poder entrar cada vez en el valor getCodigo()
                if ($moto-> getCodigo() == $codigoMoto) {
                    $motoEncontrada = $moto;
                }
                $i++;
            }

            return $motoEncontrada;
        }

        /** Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
         *parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
         *se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
         *Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
         *para registrar una venta en un momento determinado.
         *El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
         *venta.
         * @return float $importeFinal 

        */

        public function registrarVenta($colCodigosMoto, $objCliente) {
            $importeFinal = 0; //Variable retorn
            /* $venta = null; // por si no se puede hacer la venta */
            
            if (!$objCliente -> getBaja()) {//Verifica que el cliente este activo
                $venta = new Venta(null, date('y-m-d'), $objCliente, [], 0);
                foreach ($colCodigosMoto as $codigoMoto) {
                    $moto = $this -> retornarMoto($codigoMoto);
                    if ($moto && $moto -> getEstado()) {
                        $venta -> incorporarMoto($moto); //Metodo de venta
                        $importeFinal += $moto -> darPrecioVenta();
                    }
                }

                if ($venta -> getMotos()) {//Si hay motos en la venta
                    $this -> objVentas = $venta;
                }
            }
            

            return $importeFinal;
        }

        /** Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
         *número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
         *@param string $tipo
         *@param int $numDoc
         *@return array $cantVentasCliente
        */

        public function retornarVentasXCliente($tipo, $numDoc) {
            $i = 0;
            $cantVentas = count($this -> getobjVentas());
            $ventasCliente = [];

            while ($i < $cantVentas) {
                $venta = $this -> getobjVentas()[$i]; //Guarda cada cliente y va controlando con el if si coincide tipo y num documento
                if ($venta -> getCliente() -> getTipoDocumento() == $tipo && $venta -> getCliente() -> getDocumento() == $numDoc) {
                    $ventasCliente[] = $venta;
                }

                $i++;
            }
            return $ventasCliente;
        }

        //Muestra el listado de clientes
        public function mostrarListadoClientes(){
            $listadoClientes = $this -> getColClientes();
            $listadoClientesEnNum = count($listadoClientes);
            $listado = "";

            for ($i=0; $i < $listadoClientesEnNum; $i++) { 
                $clientes = $listadoClientes[$i]; //Guarda cada uno de los clientes que estan en colClientes
                $listado .= $clientes . "\n"; // Muesta cada cliente
            }

            return $listado;
        }

        //Funcion que muestra el listado de motos
        public function mostrarListadoMotos(){
            $listadoMotos = $this -> getcolMotos();
            $listadoMotosEnNum = count($listadoMotos);
            $listado = "";

            for ($i=0; $i < $listadoMotosEnNum ; $i++) { 
                $motos = $listadoMotos[$i];
                $listado .= $motos . "\n";
            }

            return $listado;
        }

        //Muestra el listado de ventas
        public function mostrarListadoVentas(){
            $listaVentas = $this -> getobjVentas();
            $listaVentasEnNum = count($listaVentas);
            $listado = "";

            for ($i=0; $i < $listaVentasEnNum ; $i++) { 
                $ventas = $listaVentas[$i];
                $listado .= $ventas . "\n";
            }

            return $listado;
        }

        //Esta funcion va a mostrar el listado de ventas del cliente si es que tiene
        public function mostrarListadoVentasCliente($cliente) {
            $ventasCliente = $this -> retornarVentasXCliente($cliente -> getTipo(), $cliente -> getNumDoc());// Guardo los datos del cliente llamando a la funcion retornarVentasXCliente
            $listado = null;

            if ($ventasCliente != null) {
                $listado = "";
                foreach($ventasCliente as $venta){
                    $listado .= $venta . "\n";
                }
            }

            return $listado;
        }







        //METODO TOSTRING // TERMINAR
        public function __toString() {
            $mensaje = "Denominoacion: " . $this -> getDenominacion() . "\n";
            $mensaje .= "Direccion: " . $this -> getDireccion() . "\n";
            $mensaje .= "Lista clientes: " . $this -> mostrarListadoClientes() . "\n";
            $mensaje .= "Lista Motos: " . $this -> mostrarListadoMotos() . "\n";
            $mensaje .= "Listado de ventas: " . $this -> mostrarListadoVentas() . "\n";

            return $mensaje;
        }

    }



?>