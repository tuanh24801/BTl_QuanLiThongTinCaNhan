<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    function sendEmail($recipient,$code){
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->Username = 'anh034207@gmail.com';// SMTP username
            $mail->Password = 'tuanh123456'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('anh034207@gmail.com', 'Website Quản lí thông tin cá nhân');
        
            $mail->addReplyTo('anh034207@gmail.com', 'Website Quản lí thông tin cá nhân');
            
            $mail->addAddress("$recipient"); // địa chỉ người nhận
            
        
            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $mail->Subject = '[Xác nhận đăng kí]';
            
            // Mail body content 
            $bodyContent = 'Nhấn vào đây để kích hoạt : <a href="localhost/project20/index.php?email='.$recipient.'&code='.$code.'">Click here</a>'; 
            
            $mail->Body = $bodyContent;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if($mail->send()){
                echo 'Thư đã được gửi đi';
            }else{
                echo 'Lỗi. Thư chưa gửi được';
            }  
        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>
