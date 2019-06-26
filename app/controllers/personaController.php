<?php

	class PersonaController
	{
		public $method;
		public $action;
		public $persona;
		public $resultado;
		
		public function __construct()
		{
			require_once 'app/models/personaModel.php';
			$this->persona = new PersonaModel();
		}
		
		public function index()
		{
			$sql = "SELECT * FROM persona";
			
			$this->resultado = $this->persona->executeQuery($sql);	
			require_once 'app/views/personaGridView.php';
		}
		
		public function create()
		{
			$this->method = 'insert';
			$this->action = 'Guardar';
			require_once 'app/views/personaView.php';
		}
		
		public function insert()
		{	
			$cedula = filter_var($_POST['cedula'],FILTER_SANITIZE_STRING);
			$nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
			$celular = filter_var($_POST['celular'],FILTER_SANITIZE_STRING);
			
			$sql = "INSERT INTO persona(cedula, nombre, celular)
					VALUES ('$cedula', '$nombre', '$celular')";
					
			
			$this->persona->ejecutarQuery($sql);
		}
		
		public function edit($id)
		{
			$this->method = 'update';
			$this->action = 'Modificar';
			
			$sql = "SELECT * FROM persona WHERE id = $id";
			
			$this->resultado = $this->persona->executeQuery($sql);	
			
			require_once 'app/views/personaView.php';
		}
		
		public function update()
		{	
			$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
			$cedula = filter_var($_POST['cedula'],FILTER_SANITIZE_STRING);
			$nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
			$celular = filter_var($_POST['celular'],FILTER_SANITIZE_STRING);
			
			$sql = "UPDATE persona SET 
							cedula = '$cedula',
							nombre = '$nombre',
							celular = '$celular'
					WHERE id = $id";
			
			echo $sql;
					
			$this->persona->ejecutarQuery($sql);
			
		}
		
		public function delete($id)
		{
			$sql = "DELETE FROM persona WHERE id = $id";
					
			$this->persona->ejecutarQuery($sql);
			header('Location: /ejercicio/?type=index');
		}
		
		public function show($id)
		{
			$this->method = 'index';
			$this->action = 'Volver';

			$sql = "SELECT * FROM persona WHERE id = $id";
			
			$this->resultado = $this->persona->executeQuery($sql);	
			
			require_once 'app/views/personaView.php';
		}
	}
