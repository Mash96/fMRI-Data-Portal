<?php
include '../database.php';
session_start();
//$_SESSION['message'] = '';



//we are using this if statement to make sure the form is submitted.
// since the method is post. it will become true.
if($_SERVER['REQUEST_METHOD'] == 'POST') {
//two passwords are equal to each other
    if ($_POST['passwordsignup'] == $_POST['passwordsignup_confirm']) {
        //print_r($_FILES);
        //assigning variables
            $name = $mysqli->real_escape_string($_POST['name']);
            $email = $mysqli->real_escape_string($_POST['emailsignup']);
            $username = $mysqli->real_escape_string($_POST['usernamesignup']);
            $password = md5($_POST['passwordsignup']);
            $doc_path = $mysqli->real_escape_string('files/' .$_FILES['file']['name']);

            //check whether the email already exists

            $result = $mysqli->query("SELECT * FROM users WHERE email = '$email'") or die($mysqli->error());

            if($result->num_rows > 0){
                $_SESSION['message'] = 'User with this email already exists!';
                //$this->session->set_flashdata('msg',);
                header('location:../errors/error.php');
            }
            else{ //proceed


                //make sure file type is .zip
                if(preg_match("!application!", $_FILES['file']['type'])) {


                    if (copy($_FILES['file']['tmp_name'], $doc_path)) {
                        $_SESSION['usernamesignup'] = $username;
                        $_SESSION['file'] = $doc_path;

                        $sql = "INSERT INTO users (fname, email, cnfrm_doc, username, password)"
                            . "VALUES ('$name','$email','$doc_path','$username','$password')";

                        if ($mysqli->connect_errno) {
                            printf("connect failed:%s\n", $mysqli->connect_error);
                            exit();
                        }
                        else {
                            ////if the query is succesful, send a mail to the email
                            if ($mysqli->query($sql) == true) {
                                $_SESSION['active'] = 0;//0 until user activates their account with verify.php
                                $_SESSION['logged_in'] = true;

                                //$this->session->set_flashdata('success',"Confirmation link has been sent to your $email,
                                    //please verify your account by clicking on the link in the message!");
                                $_SESSION['message'] =
                                    "Confirmation link has been sent to your $email,
                                    please verify your account by clicking on the link in the message!";
                                header('location: ../successes/success.php');

                                //send registration confirmation link
                                $to     = $email;
                                $subject= 'Account Verification (fmridataportal.com)';
                                $message_body =

                                'Hello '.$name.',
                                
                                Thank you for signing up!
                                
                                Please click this link to activate your account:
                                
                                http://localhost/FMRI website/verify.php?username='.$username.'&password ='.$password;
                                $headers = "From: me@localhost"."\r\n";

                                if(mail($to, $subject, $message_body,$header)){
                                    //$this->session->set_flashdata('success','email has been sent to your $email');
                                    $_SESSION['message']="email has been sent to your $email";
                                    header('location: ../successes/success.php');

                                }
                                else{
                                    $_SESSION['message']="there was an error";
                                    $errorMessage = error_get_last()['message'];
                                    print_r($errorMessage);
                                    header('location:../errors/error.php');
                                }
                                //header('location:profile.php');
                            }
                            else {
                                //$this->session->set_flashdata('msg',"user couldn't added to the database");
                                $_SESSION['message'] = "user couldn't added to the database";
                                printf("Errormessage: %s\n", $mysqli->error);
                               header('location:../errors/error.php');
                            }
                        }
                    }
                    else {
                        //$this->session->set_flashdata('msg','file upload failed');
                        $_SESSION['message'] = "file upload failed";
                        header('location:../errors/error.php');
                    }
                }
                else{
                    //$this->session->set_flashdata('msg','file extension is not correct.check again!');
                    $_SESSION['message'] = "file extention is not correct.check again!";
                    header('location:../errors/error.php');
                }
            }
        }

        else{
           // $this->session->set_flashdata('msg',"two password didn't match");
           $_SESSION['message'] = "two password didn't match";
            header('location:../errors/error.php');
    }
}


?>
