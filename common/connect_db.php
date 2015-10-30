<?php

	$link = mysqli_connect("localhost","root","");
	
	if($link) {
		mysqli_select_db($link, "portefolio");
	}
	else {
		die("Nao foi possivel ligar à base de dados.");
	}
	
?>	