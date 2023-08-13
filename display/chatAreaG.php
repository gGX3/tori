<?php 
  session_start();
  include "../php/config.php";
  $unique_id = $_SESSION['unique_id'];
  if(empty($unique_id))
  {
      header ("Location: LoginArea.php");
  } 
  $qry = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$unique_id}'");
  if(mysqli_num_rows($qry) > 0){
    $row = mysqli_fetch_assoc($qry);
    if($row){
      $_SESSION['verification_status'] = $row['verification_status'];
      if($row['verification_status'] != 'Verified')
      {
        header ("Location: verifyArea.php");
      } 
  }
  }
?>

<?php include_once "../php/ulokohehe.php"?>
 <body>
   <div class="Mconchat">
    <div class="chatWrapper">
	  <section class="chat-area">
	    <header class="headerG">
		  <div class = "leftside">
			  <a href="usersArea.php" class="back-icon"><i class="fas fa-caret-square-left"></i></a>
			  <h2>Global Chat</h2>
		  </div>
		  <p class="timer"></p>
		</header>
		<div class="g-chat-box">
		
					
		</div>
		<div class="typing-area input_msg">
		  <input type="text" name="message" class="input-field" id="input_msg" placeholder="Type a message here...">
		  <button onclick="update()"><i class="fab fa-telegram-plane"></i></button>
		</div>
	  </section>
	</div>
   </div>
	
	<script src="../JSfolder/GChat.js"></script>
	<script src="../JSfolder/timer.js"></script>
 </body>
</html>

