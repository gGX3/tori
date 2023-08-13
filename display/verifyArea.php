
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
      if($row['verification_status'] == 'Verified')
      {
        header ("Location: usersArea.php");
      } 
  }
  }
?>

<?php include_once "../php/ulokohehe.php"?>
 <body>
  <div class="vbody">
   <div class="vform" style="text-align: center;">
     <h2 id="vhead">Verify Your Account</h2>
     <p>We emailed you the four digit otp code to Enter the code below to confirm your email address..</p>
     <form id="formv" action="#" autocomplete="off" >
        <div class="v-error"></div>
            <div class="v-input-field">
                <input type="number" name="otp1" class="otp_field" placeholder="0" min="0" max="9" required onpaste="false">
                <input type="number" name="otp2" class="otp_field" placeholder="0" min="0" max="9" required onpaste="false">
                <input type="number" name="otp3" class="otp_field" placeholder="0" min="0" max="9" required onpaste="false">
                <input type="number" name="otp4" class="otp_field" placeholder="0" min="0" max="9" required onpaste="false">    
            </div>
            <div class="vsub">
                <input type="submit" value="Verify Now" class="vbutton">
            </div>
     </form>
   </div>
  </div>
  <script src="../JSfolder\verify.js"></script>
 </body>
</html>