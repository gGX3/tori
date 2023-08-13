

<?php include_once "../php/ulokohehe.php"?>
 <body>
   <div class="slcon">
    <div class="wrapper">
	  <section class="form login">
	    <header>Tori</header>
		<form action="#">
		  <div class="error-txt">This is a error message!</div>
		  
			
			<div class="field input">
			  <label>Email Address</label>
			  <input type="email" placeholder="Enter your email" name="Email" required>
			  <span class="fa fa-envelope"></span>
			</div>
			
			<div class="field input">
			  <label>Password</label>
			  <input type="password" placeholder="Enter your password" name="Password" required>
			  <i class="fas fa-eye"></i>
			</div>
			<div class="fpass"><a href="forgot-password.php">Forgot Password</a></div>
			
			<div class="field button">
			  <input type="submit" Value="Login">
			</div>
		</form>
		<div class="link">Not yet signed up? <a href="signupArea.php">Signup now</a></div>
	  </section>
	</div>
   </div>
	
	<script src="../JSfolder\SHpass.js"></script>
	<script src="../JSfolder\login.js"></script>
 </body>
</html>