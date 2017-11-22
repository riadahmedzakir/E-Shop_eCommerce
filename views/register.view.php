<?php require 'statics/header.view.php'; ?>

<div class="portfolio_two_wrapper container-fluid clear">
    <div class="portfolio_two container">
        <div class="heading_white">
            <h1>Register :</h1>
            
        </div>
		
		
   </div>
</div>

<script>
    function validate()
    {
        if((document.getElementById('name').value=='') || (document.getElementById('email').value=='') || (document.getElementById('address').value=='') || (document.getElementById('phone').value=='') || (document.getElementById('password').value=='') || document.getElementById('confirmpassword').value=='')
        {            
            document.getElementById('error_msg').innerHTML="Plese provide all Informations";
            return false;
        }
        else
        {
            var x = document.getElementById('email').value;
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");
            
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) 
            {
                document.getElementById('error_msg').innerHTML="Not a valid Email";
                return false;
            }
            if(document.getElementById('password') != document.getElementById('confirmpassword'))
            {
                document.getElementById('error_msg').innerHTML="Password Didn't Match!";
                return false;
            }
        }
    }
</script>
    
<div class="container"> 
      <form action="register.php" onsubmit="return validate()" method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name">

        <label for="email">Email</label>
        <input type="text" id="email" name="email">

        <label for="address">Address</label>
        <input type="text" id="address" name="address">
    	
    	<label for="phone">Phone</label>
        <input type="text" id="phone" name="phone">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <label for="confirmpassword">Confirm Password</label>
        <input type="password" id="confirmpassword" name="confirmpassword">
      
        <input type="submit" value="Confirm Registration">
        <span id="error_msg"></span>
      </form>
  </div>     

<?php require 'statics/footer.view.php'; ?>
	