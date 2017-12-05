<?php
include 'database.php';
session_start();
$oldusername = $_SESSION['username'];
//echo $oldusername;
$result = $mysqli->query("SELECT * FROM users WHERE username ='$oldusername'") or die($mysqli->error());
$row = $result->fetch_assoc();
// echo $row['user_id'];
$user_id = $row['user_id'];


if(isset($_POST['submit'])) {
   // echo $user_id;
    $name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    if (isset($name)) {
        if (!empty($name)) {
            $location = 'profile_pic/';
            if (move_uploaded_file($temp_name, $location . $name)) {
                $q = "UPDATE profile SET profile_image = '$name'WHERE user_id = '$user_id'";

                if($mysqli->query($q)==true){
                    echo "successfull";
                    header('location:myprofile.php');
                }
                else{
                    echo "failed";
                }
                //echo 'file uploaded successfully';
            }
        } /*else {
            echo 'select a file to upload';
        }*/
    }
    //echo $_FILES['file'];
    /* if(($_FILES['file']['tmp_name'],"file/".$_FILES['file']['name'])){
         $q = "UPDATE profile SET profile_image = '".$_FILES['file']['name']."'WHERE user_id = '$user_id'";
     }
     else{
         echo "failed";
     }
 }
 else{
     echo "failed";
 }*/
}
?>