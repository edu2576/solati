<?php 
	
	class Config
	{
		public function __construct($type, $id)
		{
			require_once 'app/controllers/personaController.php';
			
			$persona = new PersonaController();
			
			$persona->$type($id);
			
		}
	}
 
