
<?php
error_reporting(0);

		use PHPMailer\PHPMailer\PHPMailer;
  		if (isset($_POST['sendmail'])) {
			$user_name = $_POST['name'];
			$user_email = $_POST['email'];		
			$user_sub = $_POST['subject'];
			$user_msg = $_POST['message'];				

			$subject_msg = "JVS EVENT AND SERVICES Contact Request Mail";
				$my_body_data = "
					<h1>Customer Details</h1>
					<span>Customer request for contact</span>
					
					<p>Name : <b>$user_name</b></p>
					<p>Email Id : <b>$user_email</b></p>
					<p>Subject : <b>$user_sub</b></p>
					<p>Message : <b>$user_msg</b></p>
				";
			$name = "JVS EVENT AND SERVICES";  // Name of your website or yours
			$to = "jvseventandservices@gmail.com";  // mail of reciever
			$subject = $subject_msg;
			$body = $my_body_data;
			$from = "jvseventandservices@gmail.com";  // you mail
			$password = "ipqdjjzvjeyojnia";  // your mail password

			// Ignore from here

			require_once "PHPMailer/PHPMailer.php";
			require_once "PHPMailer/SMTP.php";
			require_once "PHPMailer/Exception.php";
			$mail = new PHPMailer();

			// To Here

			//SMTP Settings
			$mail->isSMTP();
			// $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
			$mail->Host = "smtp.gmail.com"; // smtp address of your email
			$mail->SMTPAuth = true;
			$mail->Username = $from;
			$mail->Password = $password;
			$mail->Port = 587;  // port
			$mail->SMTPSecure = "tls";  // tls or ssl
			$mail->smtpConnect([
			'ssl' => [
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				]
			]);

			//Email Settings
			$mail->isHTML(true);
			$mail->setFrom($from, $name);
			$mail->addAddress($to); // enter email address whom you want to send
			$mail->Subject = ("$subject");
			$mail->Body = $body;
			if ($mail->send()) {
                ?>
				<script>
					alert('Mail Send Successfully');
                    window.location.href="index.html";
                </script>
			    <?php
            } else {
				echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
			}
		}
	?>