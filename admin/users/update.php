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
	<title>Admin - update user - step 01</title>
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
                
				require ("../../common/connect_db.php");
				
				$query = "SELECT * FROM users WHERE cc = " . $_GET["cc"];
				$result = mysqli_query($link, $query) or die(mysql_error($link));
				$row_users = mysqli_fetch_assoc($result)
            
            ?>    
          	<form action="update_bd.php" method="post">
			<table border="0">
              <tr>
                <th align="right">CC</th>
                <td><input type="text" name="cc" size="20" value="<?php echo $row_users['cc']; ?>" readonly></td>                
              </tr>
              <tr>
                <th align="right">Nome:</th>
                <td><input type="text" name="nome" size="50" value="<?php echo $row_users['nome']; ?>" required></td>                
              </tr>
              <tr>                
                <th align="right">Morada:</th>
                <td><input type="text" name="morada" size="50" value="<?php echo $row_users['morada']; ?>"></td>
              </tr>
              <tr>                
                <th align="right">Localidade:</th>
                <td><input type="text" name="localidade" size="50" value="<?php echo $row_users['localidade']; ?>"></td>
              </tr>
              <tr>                
                <th align="right">Telemovel:</th>
                <td><input type="text" name="telemovel" size="50" value="<?php echo $row_users['telemovel']; ?>"></td>
              </tr>
              <tr>                
                <th align="right">E-mail:</th>
                <td><input type="text" name="email" size="50" value="<?php echo $row_users['email']; ?>" required></td>
              </tr>
              <tr>                
                <th align="right">Palavra-passe;</th>                
                <td><input type="text" name="pass" size="50" value="<?php echo $row_users['pass']; ?>" readonly></td>
              </tr>              
              <tr>                
                <td align="right"><input type="submit" value="Update" name="submit"></td>
                <td>&nbsp;</td>
              </tr>              
            </table>            
            </form>	
			
            <?php

			mysqli_free_result($result); 
			
			mysqli_close($link);
				
			?>
            
          	<br>
            
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