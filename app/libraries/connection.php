<?php
    class Connection
    {
        private $error, $conexion;
        private static $instance = NULL;
        /**
         * @method __construct() inicializamos las propiedades con los parámetros de la base de datos y realizamos la conexion a la base de datos
         */
        private function __construct()
        {
            $data = array(
                'domain' => '',
                'host' => 'localhost',
                'user' => 'root',
                'password' => 'Solati123*_',
                'charset' => 'utf8',
                'db' => 'ejercicio'
            );
            $this->conexion=new mysqli($data['host'], $data['user'], $data['password'], $data['db']);
            $this->conexion->query("SET NAMES '".$data['charset']."'");
            if($this->conexion->connect_error)
            {
                die('Error de Conexión ('.$this->conexion->connect_errno.') '.$this->conexion->connect_error);
            }
        }
        
        public static function getInstance()
		{
			if(is_null(self::$instance)) 
			{
				self::$instance = new Connection();
			}
			return self::$instance;
		}
        
        /**
         * @method executeQuery() método para ejecutar consultas en la base de datos
         * @param  string $sql Consulta que se realizará a la base de datos
         * @return array[]      Datos que se consultan de la base de datos
         */
        public function executeQuery($sql)
        {
			$query=$this->conexion->query($sql);
            if($this->conexion->error)
            {
                try {
                    throw new Exception("MySQL error ".$this->conexion->error." <br> Query:<br> $sql", $this->conexion->errno);
                } catch(Exception $e ) {
                    if($this->error === true)
                    {
                        echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
                        echo nl2br($e->getTraceAsString());
                    }
                }
            }
            $resultSet = array();
            if($query==true)
            {
                if($query->num_rows)
                {
                    while($row = $query->fetch_array())
                    {
                       $resultSet[]=$row;
                    }
                }
            }
            return $resultSet;
        }
        /**
         * @method  query() método para almacenar datos en la base de datos
         * @param  string $sql Query que se realizará a la base de datos
         * @return integer          Último id de la tabla
         */
        public function query($sql)
        {
			$query = $this->conexion->query($sql);
            if($this->conexion->error)
            {
                try {
                    throw new Exception("MySQL error ".$this->conexion->error." <br> Query:<br> $sql", $this->conexion->errno);
                } catch(Exception $e ) {
                    if($this->error === true)
                    {
                        echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
                        echo nl2br($e->getTraceAsString());
                    }
                }
            }
            return $this->conexion->insert_id;
        }
         
    }
