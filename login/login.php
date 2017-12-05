<?php

/**
 * Created by PhpStorm.
 * User: maneesha
 * Date: 9/20/2017
 * Time: 10:32 AM
 */
include '../database.php';
session_start();
//user login process, check if user exists and password is correct.
//escape username to protect against SQL injections.
$_SESSION['login']="Login";
if(isset($_POST['username']) && isset($_POST['password'])){

    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $mysqli->escape_string($_POST['username']);
        $result = $mysqli->query("SELECT * FROM users WHERE username = '$username'");

        if($mysqli->connect_errno){
            printf("connect failed:%s\n",$mysqli->connect_error);
            exit();
        }
        else {
            if($result->num_rows == 0){
                //user doesn't exist
                //$this->session->set_flashdata('error',"User with that username doesn't exist");
                $_SESSION['message'] = "User with that username doesn't exist";
                header("location:../errors/error.php");
            }
            else{ //user exists
                $user = $result->fetch_assoc();

                $password = md5($_POST['password']);
                if($password == $user['password']){
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fname'] = $user['fname'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['cnfrm_doc'] = $user['cnfrm_doc'];

                    //this is how we will know the user is logged in
                    $_SESSION['logged_in'] = true;
                    $_SESSION['logout'] = "Logout";
                    header("location: ../index.php");

                }
                else{
//                    $this->session->set_flashdata('error','you have entered wrong password');
                    $_SESSION['message'] = 'you have entered wrong password';
                    header('location:../errors/error.php');




                }
            }


        }
    }
}
?>