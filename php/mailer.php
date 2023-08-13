 <?php
 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require 'PHPMailer/PHPMailer/src/Exception.php';
  require 'PHPMailer/PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/PHPMailer/src/SMTP.php';
  
  $mail = new PHPMailer;
  
  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com'; 
  $mail->Port = 587;
  $mail->SMTPAuth = true;
  $mail->Username = 'tori.team.message@gmail.com';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Password = 'jmvggnemgepmskdx';
  $mail->isHtml(true);
  
  return $mail;