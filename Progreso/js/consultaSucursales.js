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

function Busca(){
	sucursales = document.getElementsByName("sucursales");
	busqueda = $("#busqueda").val();

	for(i = 0; i < sucursales.length; i++){
		act = sucursales[i].id;				

		if(busqueda == "" || similar(busqueda, act.replace("_"," ")))
			sucursales[i].hidden = false;
		else 
			sucursales[i].hidden = true;
	}	

}