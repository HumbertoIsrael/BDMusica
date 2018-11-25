function terminarConsulta(){				
	    $.confirm({
	        title: 'Seguridad requerida',
	        content: '' +
	        '<form action="chosto" class="formName" id = "formularioConsulta">' +
	        '<div class="form-group">' +
	        '<label>Ingrese su contraseña</label>' +
	        '<input type="password" placeholder="Contraseña" class="name form-control"  required id= "contra"/>' +
	        '</div>' +
	        '</form>',
	        buttons: {
	            formSubmit: {
	                text: 'Confirmar',
	                btnClass: 'btn-blue',
	                action: function () {
	                    var contra = $("#contra").val();				                   
	                    if(!contra){
		                    $.alert('No se puede dejar el campo vacío');
		                    return false;
		                }

		                $.ajax({
					        method:"post",
					        url:"terminarConsulta.php",
					        data: "contra="+contra,
					        success:function(resp){								       		
					        	if(resp == 1) window.location = 'index.php';
					        	else {
					        		$.alert("Contraseña incorrecta");
					        	}
					        }
		                });

		                return false;
	                    
	                }
	            },
	            cancel: function () {
	                //close
	            },
	        },
		    onContentReady: function () {
		        
		        var jc = this;
		        $("#formularioConsulta").on('submit', function (e) {					            
		            e.preventDefault();
		            jc.$$formSubmit.trigger('click'); // reference the button and click it
		        });
		    }			      
	    });
	/*$.ajax({
        method:"post",
        url:"terminarConsulta.php",
        data: "contra=",
        success:function(resp){                                    	                	
            alert(resp);
        }
    })*/
	return false;
}