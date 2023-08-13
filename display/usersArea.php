<?php
session_start();

if (empty($_SESSION['unique_id'])) {
    header("Location: LoginArea.php");
    exit(); // Terminate script after redirection
}

include_once "../php/config.php";

$qry = mysqli_query($conn, "SELECT verification_status FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");

if (mysqli_num_rows($qry) > 0) {
    $row = mysqli_fetch_assoc($qry);
    
    if ($row['verification_status'] !== 'Verified') {
        header("Location: verifyArea.php");
        exit(); // Terminate script after redirection
    }
}
?>




<?php include_once "../php/ulokohehe.php"?>
 <body>
   <div class="mcon">
     <?php
		   include_once "../php/config.php";
		   $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
		   if(mysqli_num_rows($sql) > 0){
			   $row = mysqli_fetch_assoc($sql);
		   }
		?>
     <div class="top">
         <div class="logo"><span class="ti">T</span><span class="ow">O</span><span class="ar">R</span><span class="ay">I</span></div>
         <button class="menu-hamburger">
			<div class="ham"></div>
			<div class="ham"></div>
			<div class="ham"></div>
		 </button>
		 <div class="nav-links">
			<ul class="top-con">
				 <li><button class="bbt back"><i class="fa fa-angle-double-left"></i></button></li>
				 <li><button class="bbt bBtn"><i class="fas fa-crow"></i></button></li>
				 <li><button onclick="location.replace('chatAreaG.php')" id="home" class="bbt"><i class="fas fa-globe"></i></button></li>
				 <li><button onclick="location.replace('settings.php')" class="bbt"><i class="fas fa-cog"></i></button></li>
				 <li><a href="../php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a></li>
			</ul>
		 </div>
		 
		  
		 
    </div>
	
    <div class="userscon">
	  <section class="users">
	    <header>
		
		  <div class="content">
		    <img src="../images/<?php echo $row['img'] ?>" alt="">
			<div class="details">
			  <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
			  <p><?php echo $row['status'] ?></p>
			</div>
		  </div>
		</header>
		
		<div class="search">
		  <span class="text">   Select an user to start chat</span>
		  <input type="text" placeholder="Enter a name to search...">
		  <button id="sbtn"><i class="fas fa-search"></i></button>
		</div>
		<div class="users-list">
		                 
		  
		   
		</div>
	  </section>
	  
	 <div class="mbogart" id="bogart">
	     <div class="hbogart">
	       <img src="../images/bogart.JPG" alt="">
	       <div class="details">
	         <span>Bogart</span>
		     <p>Active now</p>
	       </div>
	    </div>
		<div class="form">
	   
			
			
		</div>
		<div class="typing-field">
		  <div class="input-data">
		    <input id="data" type="text" placeholder="Type something here..">
			<button id="send-btn"><i class="fab fa-telegram-plane"></i></button>
		  </div>
		</div>
		
	  </div>
	  
	 
	 
   </div>
   <div class="menu-cp">
		<ul class="top-con-cp">
		    <li><button onclick="location.replace('chatAreaG.php')" id="home" class="bbt">GLOBAL CHAT</button></li>
			<li><button class="bbt back-cp">BACK</i></button></li>
	     	<li><button class="bbt bBtn-cp">BOGART</button></li>
			<li><button class="bbt">SETTINGS</button></li>
			<li><a href="../php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a></li>
		</ul>
   </div>
  
   <footer style="text-align: center; padding: 20px 0; background-color: #212121;">
    <p style="margin: 0; font-size: 0.9rem; color: #ffffff;">&copy; 2023 Tori Chat. All rights reserved.</p>
  </footer>
</div>
	<script src="../JSfolder/users.js?v=<?php echo time(); ?>"></script>
	<script src="../JSfolder/pgrmbogart.js?v=<?php echo time(); ?>"></script>
 </body>
</html>