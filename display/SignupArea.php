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
	  <section class="form signup">
	    <header>Tori</header>
		<form action="#">
		  <div class="error-txt">This is a error message!</div>
		  <div class="name-details">
		  
		    <div class="field input">
			  <label>First Name</label>
			  <input type="text" placeholder="First Name" name="Fname" required>
			</div>
			
		    <div class="field input">
			  <label>Last Name</label>
			  <input type="text" placeholder="Last Name" name="Lname" required>
			</div>
			</div>
			
			<div class="field input">
			  <label>Email Address</label>
			  <input type="email" placeholder="Enter your email" name="Email" required>
			  <span class="fa fa-envelope"></span>
			</div>
			
			<div class="field input">
			  <label>Password</label>
			  <input type="password" placeholder="Enter new password" name="Password" required>
			  <i class="fas fa-eye"></i>
			</div>

			<div class="field input">
			  <label>Nickname</label>
			  <input type="text" placeholder="Create Your Nickname" name="Nickname" required>
			  <i class="fas fa-user-alt"></i>
			</div>
			
			<div class="field image">
			 <label>Select Profile</label>
			  <input type="file" name="image">
			</div>
			
			<div class="field button">
			  <input type="submit" Value="Create Account">
			</div>
		</form>
		<div class="link">Already signed up? <a href="loginArea.php">Login now</a></div>
	  </section>
	</div>
   </div>
	<script src="../JSfolder/SHpass.js"></script>
	<script src="../JSfolder/signup.js"></script>
 </body>
</html>