

<html>
 <head lang="en">
   <meta charset="UTF-8">
   <title>TORI</title>
   <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
 </head>
 <body>
   <div class="slcon">
    <div class="wrapper">
	  <section class="form reset-pass">
	    <header>Tori</header>
		<form action="#">
		  <div class="error-txt">This is a error message!</div>
		  <input type="hidden" name="token" Value='<?= htmlspecialchars($_GET['token']) ?>'>
		  
			<div class="field input">
			  <label>Password</label>
			  <input type="password" placeholder="Enter new your password" name="nPassword" required>
			  <i class="fas fa-eye"></i>
			</div>
			
			
			<div class="field input">
			  <label>Repeat Password</label>
			  <input type="password" placeholder="Repeat your password" name="rPassword" required>
			  <i class="fas fa-eye"></i>
			</div>
			
			
			<div class="field button">
			  <input type="submit" Value="RESET PASSWORD">
			</div>
		</form>
		<div class="link">Not yet signed up? <a href="signupArea.php">Signup now</a></div>
	  </section>
	</div>
   </div>
	
	<script src="../JSfolder\SHpass.js"></script>
	<script src="../JSfolder\ms.js"></script>
	
 </body>
</html>