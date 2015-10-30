<?php

session_start();

if (!isset($_SESSION["cc"])){
	
	require('../../common/rotinas.php');
	
	redirect("../index.php");
	
}

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin - insert user - step 02</title>
	<link href="../../stylesheet/main.css" rel="stylesheet" type="text/css">
</head>

<body>

    <header id="top-page">
		<p><a href="../../index.php" title="back to portfolio">back to portfolio</a></p>    
		<div id="top-logo">PJMotaL</div>
    </header>
     
    <article id="article-admin">
    	<div id="article-modules">
        	<p>Modules</p>
			<ul>
            	<li><a href="index.php" title="Users information">Users</a></li>
                <li><a href="../work/index.php" title="Portfolio information">Portfolio</a></li>
            </ul>
		</div>
		<div id="article-op">
		  <p><a href="../menu.php">Home</a> > <a href="index.php">Users</a> > Update</p>
	  	  <div id="article-db">
          
            <form action="search.php" method="post">
                Name to search: 
                <input type="text" name="nome" size="50" required>
                <input type="submit" name="OK" value="OK">
            </form>
          
			<br>
            
			<?php 
			
			$cc 		= $_POST['cc'];
			$nome		= $_POST['nome'];	
			$morada 	= $_POST['morada'];
			$localidade = $_POST['localidade'];
			$telemovel 	= $_POST['telemovel'];
			$email 		= $_POST['email'];
			$pass 		= $_POST['pass'];
					
			if (strlen ($cc) * strlen ($nome) * strlen ($email) * strlen ($pass)){
			
				require ("../../common/connect_db.php");			
				
				$pass = md5($pass);
				$query ="insert into users(cc, nome, morada, localidade, telemovel, email, pass) values($cc, '$nome', '$morada', '$localidade', '$telemovel', '$email', '$pass')";
				$result = mysqli_query($link, $query) or die(mysqli_error($link));
				if ($result) {
					echo "User successfully inserted. <br><br>";
				}
				else {
					echo "Error. The user wasn't inserted.<br><br>";				
				}			
				
				//mysqli_free_result($result);
				mysqli_close($link);
			
			}else{
					echo 'You must fulfill all the fields.';
			}			
			?>                
        	<a href="index.php">Return to users</a>  
         </div>
       </div>
    </article>
    
    <footer id="bottom-page">
        <div id="botton-zone">
            <h3>Follow me on:</h3>
            <a href="#"><img src="../../img/icons/facebook.png" width="24px;" height="24px;" title="Facebook"></a>
            <a href="#"><img src="../../img/icons/googleplusalt.png" width="24px;" height="24px;" title="Google Plus"></a>
            <a href="#"><img src="../../img/icons/twitter.png" width="24px;" height="24px;" title="Twitter"></a>
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