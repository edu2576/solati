window.addEventListener("load",function(){

	document.getElementById('guardar').addEventListener("click", function(){
		save();
	}, false);

},false);


let save = function(){

	let formulario = new FormData(document.getElementById("persona"))
	let method = document.getElementById("persona").dataset['method'];
		
		

	if(method == 'index')
	{
		url = '/ejercicio/?type=index';
		location.href=url;
	}
	else
	{
		let data = {
			'cedula': document.getElementById('cedula').value,
			'nombre': document.getElementById('nombre').value,
			'celular': document.getElementById('celular').value
		}


		let sw = validate(data);

		if(sw == true)
		{
			url = '/ejercicio/?type='+method;

			fetch(url, {
			 	method: 'POST',
			  	body: formulario
			}).then(function(response) {
				if(response.ok)
				{
					url = '/ejercicio/?type=index';
					location.href=url;
		       		return response.text()

		   		}
		   		else
		   		{
		       		throw "Error en la llamada Ajax";
		       	}
		   	})
			.catch(error => console.error('Error:', error));
		}
	}
};

let validate = function(data){

	let mensaje = '';

	if(!data.cedula && data.cedula == '')
	{
		mensaje += 'El campo cedula es obligatorio.\n';
	}

	if(!data.nombre && data.nombre == '')
	{
		mensaje += 'El campo nombre es obligatorio.\n';
	}

	
	if(Object.keys(mensaje).length !== 0)
    {
    	document.getElementById('mensaje').innerText = mensaje;

    	return false;
    }

    return true;
};
