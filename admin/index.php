<?php

session_start();

$msg = "";

if (isset($_POST['submit'])) {
	
	$email = $_POST["email"];
	$pass = md5 ($_POST["pass"]);
	
	require ("../common/connect_db.php");
	
	$query = "SELECT * FROM users WHERE pass = '$pass' AND email = '$email'";	
	$rsLogin = mysqli_query($link, $query) or die(mysqli_error($link));
	$row_rsLogin = mysqli_fetch_assoc($rsLogin);
	$totalRows_rsLogin = mysqli_num_rows($rsLogin);

	if ($totalRows_rsLogin > 0 ) {
		$_SESSION["cc"] = $row_rsLogin["cc"];

		require('../common/rotinas.php');

		redirect("menu.php");
		
	} else {
		$msg = "E-mail ou palavra-passe incorretos.";	
	}
	
	mysqli_free_result($rsLogin);	
	mysqli_close($link);
}

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin - Home</title>
	<link href="../stylesheet/main.css" rel="stylesheet" type="text/css">
</head>

<body>

    <header id="top-page">
		<p><a href="../index.php" title="back to portfolio">back to portfolio</a></p>    
		<div id="top-logo">PJMotaL</div>
    </header>
     
    <article id="article-admin">        
    	<div id="textoadmin">
		<form id="login" name="login" method="post" action="">
		<fieldset>
		  	<legend>User Authentication</legend>
            <table>
                <tr>
                    <td>E-mail:</td>
                    <td><input name="email" type="text" id="email" size="38" required></td>
                </tr>
                <tr>                
                	<td>Password:</td>
                    <td><input name="pass" type="password" id="pass" size="38" required></td>
                </tr>
				<tr>                
                	<td colspan="2" style="color:#F00;"><?php echo $msg; ?></td>
                </tr>
                <tr>
                	<td colspan="2""><input type="submit" name="submit" value="Entrar"></td>
                </tr>
            </table>
		</fieldset>
		</form>
		</div>
    </article>
    
    <footer id="bottom-page">
        <div id="botton-zone">
            <h3>Follow me on:</h3>
            <a href="#"><img src="../img/icons/facebook.png" width="24px;" height="24px;" title="Facebook"></a>
            <a href="#"><img src="../img/icons/googleplusalt.png" width="24px;" height="24px;" title="Google Plus"></a>
            <a href="#"><img src="../img/icons/twitter.png" width="24px;" height="24px;" title="Twitter"></a>
        </div>
        <div id="botton-zone">
            <h3>Contact me:</h3>
            Email: <a href="mailto:paulomota79@gmail.com" title="paulomota79@gmail.com">paulomota79@gmail.com</a>                     
            <br>
            Mobile: 963 128 016
        </div>
        <div id="botton-copy">
            <p>Copyright © 2013 by Paulo Mota Lopes. All Rights Reserved.
            <a href="#">Politica de Privacidade</a> | <a href="#">Termos de uso</a></p>
            <p>Resolution:1024x768 Optimized for: Firefox, Internet 7+, Chrome</p>
        </div>
        	
    </footer>

</body>

</html>