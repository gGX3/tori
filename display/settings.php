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
    <div class="setwrap">
	  <ul>
	    <li><button onclick="location.replace('.php')" id="home" class="bbt">Reset Password</button></li>
		<li></li>
		<li></li>
		<li></li>
	  </ul>
	</div>
   </div>
	
	<script src="../JSfolder/Chat.js"></script>
 </body>