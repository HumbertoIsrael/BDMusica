function similar(s, t){

	n = s.length;
	m = t.length;				

	dp = new Array(n+1);

	for(var i = 0; i <= n; i ++)	
		dp[i] = new Array(m+1);


	for(var i = n; i >= 0; i = i-1){
		for(var j = m; j >= 0; j = j-1){						
			menor = 1000000000;
			if(i == n && j == m) dp[i][j] = 0;							
			else {							

				if(i < n) menor = Math.min(menor, dp[i+1][j]+1);

				if(j < m) menor = Math.min(menor, dp[i][j+1]+1);

											
				if(i < n && j < m){							
					if(s.charAt(i) == t.charAt(j))
						menor = Math.min(menor, dp[i+1][j+1]);
					else 
						menor = Math.min(menor, dp[i+1][j+1]+1);
				}

				dp[i][j] = menor;

			}
		}
	}

	dif = Math.abs(t.length - Math.min(dp[0][0],t.length));			
	dif /=	t.length;				

	return dif > 0.50;
}

function sufijo(s, t){
	n = s.length;
	m = t.length;

	k = Math.min(n, m);


	for(i = 0; i < k; i = i+1){
		
		if(s.charAt(i) != t.charAt(i))						
			return false;
	}
	return true;

}


function Busca(){
	compras = document.getElementsByName("ventas");
	busqueda = $("#busqueda").val();
	criterio = $('input[name=criterio]:checked').val();

	if(criterio == "cajero"){
		idx = 0;
	} else {
		idx = 1;
	}

	for(i = 0; i < compras.length; i++){
		act = compras[i].id;						

		if(busqueda == "" || similar(busqueda, act.split(";")[idx].replace("_"," ")))
			compras[i].hidden = false;
		else 
			compras[i].hidden = true;
	}	

}

function Cambia(){
	$("#busqueda").val("");
	Busca();
}

function Muestra(idVenta){
	
	$.ajax({
        method:"post",
        url:"venta.php",              
        data: "idVenta="+idVenta,
        success:function(resp){        	
                $.dialog({
			        title: 'Sobre la venta',
			        content: resp,
			    });
        }
    });
  
}