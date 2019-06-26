<html>
	<head>
		<title>Persona</title>
	</head>
	<body>
		<table border="1">
			<tr>
				<th>
					<a href="<?php echo '/ejercicio/?type=create'.$this->resultado[$j]['id'];?>" title="Adicionar">Adicionar</a>
					</th>
				<th>Cedula</th>
				<th>Nombre</th>
				<th>Celular</th>
			</tr>
			<?php
				for($j=0; $j < count($this->resultado); $j++)
				{

			?>
			<tr>
				<td>
					<a href="<?php echo '/ejercicio/?type=edit&id='.$this->resultado[$j]['id'];?>" title="Modificar">
						Modificar
					</a>
					<a href="<?php echo '/ejercicio/?type=delete&id='.$this->resultado[$j]['id'];?>" title="Eliminar">
						Eliminar
					</a>
					<a href="<?php echo '/ejercicio/?type=show&id='.$this->resultado[$j]['id'];?>" title="Mostrar">
						Mostrar
					</a>
				</td>
				<td><?php echo $this->resultado[$j]['cedula'];?></td>
				<td><?php echo $this->resultado[$j]['nombre'];?></td>
				<td><?php echo $this->resultado[$j]['celular'];?></td>
			</tr>
			<?php

				}
			?>
		</table>
	</body>
</html>
