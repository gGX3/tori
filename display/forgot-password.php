<?php
    session_start();
	if(isset($_SESSION['unique_id'])){
		header("location: usersArea.php ");
	}
?>

<?php include_once "../php/ulokohehe.php"?>
 <body>
   <div class="slcon">
    <div class="wrapper">
	  <section class="form login">
	    <header>Tori</header>
		<form method="post" action="../php\sendpass-reset.php">
		  <div class="error-txt">This is a error message!</div>
		  
			<div class="field input">
			  <label>Email Address</label>
			  <input type="email" placeholder="Enter your email" name="Email" required>
			  <span class="fa fa-envelope"></span>
			</div>
			
			
			
			<div class="field button">
			  <input type="submit" Value="Forgot Password">
			</div>
		</form>
		<div class="link">Not yet signed up? <a href="signupArea.php">Signup now</a></div>
	  </section>
	</div>
   </div>
	
	<script src="../JSfolder\SHpass.js"></script>
	<script src="../JSfolder\forgotMe.js"></script>
 </body>
</html>