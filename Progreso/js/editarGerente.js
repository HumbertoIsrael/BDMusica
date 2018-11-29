function Emular(resp){

    $("#rfc").attr("disabled", false);    
    $("#rfc").focus();
    $("#rfc").val(resp.rfc);
    $("#nombre").attr("disabled", false);    
    $("#nombre").focus();
    $("#nombre").val(resp.nombre);
    $("#apPat").attr("disabled", false);    
    $("#apPat").focus();
    $("#apPat").val(resp.apPat);
    $("#apMat").attr("disabled", false); 
    $("#apMat").focus();
    $("#apMat").val(resp.apMat);
    $("#usuario").attr("disabled", false);    
    $("#usuario").focus();    
    $("#usuario").val(resp.usuario);
    $("#tel").attr("disabled", false);     
    $("#tel").focus();
    $("#tel").val(resp.tel);
    $("#dir").attr("disabled", false);    
    $("#dir").focus();
    $("#dir").val(resp.dir);
    $("#rfc_in").focus();
    $("#rfc").attr("disabled", true);    
    $("#btnCrear").attr("disabled", false);

}

function Limpia(){

    
    $("#rfc").attr("disabled", false);    
    $("#rfc").focus();
    $("#rfc").val("");                
    $("#nombre").val("");
    $("#nombre").focus();            
    $("#apPat").val("");
    $("#apPat").focus();    
    $("#apMat").val("");    
    $("#apMat").focus();          
    $("#usuario").val("");  
    $("#usuario").focus();           
    $("#tel").val("");
    $("#tel").focus();        
    $("#dir").val("");    
    $("#dir").focus();        
    $("#rfc_in").focus();    
    $("#rfc").attr("disabled", true);
    $("#nombre").attr("disabled", true);
    $("#apPat").attr("disabled", true);
    $("#apMat").attr("disabled", true);
    $("#usuario").attr("disabled", true);
    $("#tel").attr("disabled", true);
    $("#dir").attr("disabled", true);
    $("#btnCrear").attr("disabled", true);
}

function Busca(){

	$.ajax({
        method:"post",
        url:"cargaGerente.php",
        data:$("#formulario").serialize(),                
        success:function(resp){              
            if(resp == ""){
                $("#contenido").html("No se encontraron resultados.");
                Limpia();
            }  else { 
                $("#contenido").html("");
                Emular(JSON.parse(resp));
            }
        }
    });

	return false;
}

$(document).ready(function(){
    $("#formulario2").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        validators: {
            regExp: {
                rfcExp : {
                    pattern : /[A-Z|a-z][A-Z|a-z][A-Z|a-z][A-Z|a-z]\d\d\d\d\d\d/,
                    errorMessage : 'Debe contener formato de RFC'
                }
            }
        },
        onValid:function(e){
            e.preventDefault();
            $("#rfc").attr("disabled", false);    
            $("#btnCrear").attr("disabled", true);
            $.ajax({
                method:"post",
                url:"editarGerenteBE.php",
                data: $("#formulario2").serialize(),        
                success:function(resp){                                            
                    if(resp == 1){
                        $.alert({
                            title: 'Todo bien',
                            content: 'Se ha editado al Gerente',
                            onDestroy:function(){
                                $(location).attr("href", "./editarGerente.php");
                            }                           
                        });
                    } else {
                        if(resp == 0) msj = 'Ese usuario ya está registrado';
                        else msj = 'Ese RFC ya está registrado';                        
                        $.alert({
                            title: 'Error',
                            content: msj,
                            onDestroy:function(){
                                $("#btnCrear").attr("disabled", false);
                                $("#btnCrear").blur();
                            }                           
                        });
                    }
                }
            });
        }
    });
});