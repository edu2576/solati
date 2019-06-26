<html>
	<head>
		<title>Persona</title>
	</head>
	<body>
		<div id="mensaje" ></div>
		<form id="persona" data-method="<?php echo $this->method;?>">
			<input type="hidden" id="id" name="id" value="<?php echo $this->resultado[0]['id'];?>" />
			<label>Cedula</label>
			<input type="text" id="cedula" name="cedula" value="<?php echo $this->resultado[0]['cedula'];?>" />
			<label>Nombre</label>
			<input type="text" id="nombre" name="nombre" value="<?php echo $this->resultado[0]['nombre'];?>" />
			<label>Celular</label>
			<input type="text" id="celular" name="celular" value="<?php echo $this->resultado[0]['celular'];?>" />
			<input type="button" id="guardar" name="guardar" value="<?php echo $this->action;?>">
		</form>
		<script type="text/javascript" src="public/js/persona.js"></script>
	</body>
</html>
