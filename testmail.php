<?php 
     
     if (isset($_POST['sendmail'])) {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $job = $_POST['job'];			
        $user_sub = $_POST['subject'];
        $user_msg = $_POST['message'];	
        $career_page = $_POST['service_page'];			

        $subject_msg = "JVS EVENT AND SERVICES";
            $my_body_data = "
                Customer Details
                Customer request for contact
                
                Name : $user_name
                Email Id : $user_email
                Subject : $user_sub
                Message : $user_msg
                ";

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "jvseventandservice@gmail.com";
    $to = "jvseventandservice@gmail.com";
    $subject =$subject_msg;
    $body = $my_body_data;
    // $message = "This is a test to check the PHP Mail functionality";
    $headers = "From:" . $from;
    if (mail($to,$subject,$body, $headers)){
    
                ?>
				<script>
					alert('Mail Send Successfully');
                    window.location.href="contact.php";
                </script>
			    <?php
            } else {
				echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
			}

    // echo "Test email sent";
       
     }
?>