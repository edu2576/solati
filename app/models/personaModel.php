<?php 
	
	class PersonaModel
	{
		
		public function __construct()
		{
			require_once 'app/libraries/connection.php';
		}
		
		public function __set($campo, $valor)
        {
        	$this->datos[$campo] = $valor;
        }
        
		public function __get($campo)
        {
            if(array_key_exists($campo, $this->datos))
            {
                return $this->datos[$campo];
            }
        }
        
		public function executeQuery($sql)
        {
			$db = Connection::getInstance();
        	$result = $db->executeQuery($sql);
        	
        	return $result;
        }
        
        public function ejecutarQuery($sql)
        {
			$db = Connection::getInstance();
        	$db->query($sql);
        }
        
	}
