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
	<title>Admin - All users</title>
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
		  <p><a href="../menu.php">Home</a> > Users</p>
	  	  <div id="article-db">
          
            <form action="search.php" method="post">
                Name to search: 
                <input type="text" name="nome" size="50" required>
                <input type="submit" name="OK" value="OK">
            </form>
          
			<br>
            
			<?php 
                
				require ("../../common/connect_db.php");
				
				$query = "SELECT * FROM users";
				$result = mysqli_query($link, $query) or die(mysqli_error($link));
            
            ?>    
			<table border="0">
              <tr>
                <th>cc</th>
                <th>nome</th>
                <th>morada</th>
                <th>localidade</th>
                <th>telemovel</th>
                <th>email</th>
              </tr>          
            <?php while ($row_users = mysqli_fetch_assoc($result)) { ?>                        
              <tr>
                <td><?php echo $row_users['cc']; ?></td>
                <td><?php echo $row_users['nome']; ?></td>
                <td><?php echo $row_users['morada']; ?></td>
                <td><?php echo $row_users['localidade']; ?></td>
                <td><?php echo $row_users['telemovel']; ?></td>
                <td><?php echo $row_users['email']; ?></td>
                <td><a href="update.php?cc=<?php echo $row_users['cc']; ?>">update</a></td>
                <td><a href="delete.php?cc=<?php echo $row_users['cc']; ?>">delete</a></td>                  
            </tr>  	
            
            <?php } ?>
            
            </table>                      
            
            <?php 
			
			mysqli_free_result($result); 
			
			mysqli_close($link);
			
			?>
          
          	</div>
       	  
          <p><a href="insert.php">Insert</a></p>
          
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