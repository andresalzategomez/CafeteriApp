function validarFormVacio(formulario){
		datos=$('#' + formulario).serialize();
		d=datos.split('&');
		vacios=0;
		for(i=0;i< d.length;i++){
				controles=d[i].split("=");
				if(controles[1]=="A" || controles[1]==""){
					vacios++;
				}
		}
		return vacios;
	}

	function validateStockAvailable(stock){
		swAvailable = true
		if (stock == 0){
			swAvailable = false
		}
		return swAvailable
	}