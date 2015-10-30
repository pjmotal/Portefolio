<?php

// redireccionar para um determinado destino 
function redirect($destiny){
	print("<script type='text/javascript'>document.location.href = '" . $destiny . "'</script>");
}

?>