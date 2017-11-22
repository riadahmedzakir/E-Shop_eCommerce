 <?php 
    if($_SESSION['userCat']==1)
    {
        echo "
        <nav>
		  <ul>
		    <li><a href='home.php'>Home</a></li>
			<br>
			<br>
		    <li><a href='saleslog.php'>Sales Log</a></li>
			<br>
			<br>
			<li><a href='product.php'>Products</li>
			<br>
			<br>
			<li><a href='profile.php'>Profile</li>
			<br>
			<br>
		    <li><a href='logout.php'>Logout</a></li>
			<br>
			<br>
		  </ul>
		</nav>
        ";
    }
    else
    {
        echo "
            <nav>
			  <ul>
			    <li><a href='home.php'>Home</a></li>
				<br>
			    <li><a href='profile.php'>Profile</a></li>
				<br>
			    <li><a href='logout.php'>Logout</a></li>
				<br>
			  </ul>
			</nav>            
            ";
        } 
?> 



