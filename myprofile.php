
<?php
include 'database.php';
session_start();
$oldusername = $_SESSION['username'];
$result = $mysqli->query("SELECT * FROM users WHERE username ='$oldusername'") or die($mysqli->error());
$row = $result->fetch_assoc();
// echo $row['user_id'];
$user_id = $row['user_id'];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['newpass']) && empty($_POST['conpass'])){


        if(!empty($_POST['name']) && ($_POST['name']!= $row['fname'])){
            $name = $mysqli->real_escape_string($_POST['name']);
        }
        if(!empty($_POST['email']) && ($_POST['email']!= $row['email'])) {
            $email = $mysqli->real_escape_string($_POST['email']);
        }
        if(!empty($_POST['uname']) && ($_POST['uname']!= $row['username'])) {
            $username = $mysqli->real_escape_string($_POST['uname']);
        }
       /*echo $name;
       echo $email;
        echo $username;*/
        $role = $mysqli->real_escape_string($_POST['role']);
        $bio = $mysqli->real_escape_string($_POST['bio']);
        $website = $mysqli->real_escape_string($_POST['web']);

        /*echo $role;
        echo $bio;
        echo $website;*/

        $sql1 = "UPDATE users SET fname = '$name', email = '$email', username = '$username' WHERE user_id = '$user_id'";
        if ($mysqli->query($sql1) == true) {
            echo "success";
        }
        else{
            echo "failed";
        }

        $sql2 = "INSERT INTO profile (role,bio,websites,user_id,profile_image)". " VALUES ('$role','$bio','$website','$user_id','NULL')";
        if ($mysqli->query($sql2) == true) {
            echo "success";
        }
        else{
            echo "failed";
        }
    }
    else {
        if($_POST['newpass'] == $_POST['conpass']){


            if(!empty($_POST['name']) && $_POST['name']!= $row['fname']){
                $name = $mysqli->real_escape_string($_POST['name']);
            }
            if(!empty($_POST['email']) && $_POST['email']!= $row['email']) {
                $email = $mysqli->real_escape_string($_POST['email']);
            }
            if(!empty($_POST['uname']) && $_POST['uname']!= $row['username']) {
                $username = $mysqli->real_escape_string($_POST['uname']);
            }
            $password = md5($_POST['newpass']);
            $role = $mysqli->real_escape_string($_POST['role']);
            $bio = $mysqli->real_escape_string($_POST['bio']);
            $website = $mysqli->real_escape_string($_POST['web']);

            $sql1 = "UPDATE users SET fname = '$name', email = '$email', username = '$username', password = '$password' WHERE user_id = '$user_id'";

            $sql2 = "INSERT INTO profile (role,bio,websites,user_id) VALUES ('$role','$bio','$website','$user_id')";

        }
    }

}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="TemplateData/favicon.ico">
    <link rel="stylesheet" href="TemplateData/style.css">

    <title>fMRI Data Portal | user profile</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">

    <!--custome style sheet-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/user-style.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



</head>
   <body>
   <!--HEADER-->
   <header id="main-header">
       <div class="container">
           <div class="row">
               <div class="col-xs-12 col-sm-2 col-md-5 col-lg-5">
                   <h1><span class="primary-text">fMRI</span> Data Portal</h1>
               </div>
               <div class="col-xs-12 col-sm-10 col-md-7 col-lg-7">
                   <div class="pull-right">
                       <nav id="navbar">
                           <ul>
                               <li ><a href="index.php">Home</a></li>
                               <li><a href="contact.html">Contact</a></li>
                               <li><a href="contact.html">Forum</a></li>
                               <li class="dropdown">
                                   <a href="#" class="dropbtn" id="drop" data-toggle="dropdown" role="button" aria-expanded="false">Research <span class="caret"></span></a>
                                   <ul class="dropdown-content" id="content">
                                       <li><a href="motorcontrol.html">Motor Control</a>
                <a href="sensory.html">Sensory</a>
                <a href="regulation.html">Regulation</a>
                <a href="language.html">Language</a>
                <a href="laterlization.html">Laterlization</a>
                <a href="emotion.html">Emotion</a>
                <a href="executive">Executive function</a></li>
                                   </ul>
                               </li>
                               <li><a href="login/logout.php">Logout</a></li>

                           </ul>
                       </nav>
                   </div>

               </div>
           </div>
           <div class="row row-second">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   <div class="pull-right">
                       <div id="newbar">
                           Welcome, <span>
                               <div class="dropdown">
                                <a class='dropbtn' type="button" data-toggle="dropdown" style="color:#000000">
                                    <?php
                                    if(isset($_SESSION['username']) AND !empty($_SESSION['username'])) {
                                        echo $_SESSION['username'];
                                    }
                                    ?>

                                    <span class="caret"></span></a>
                                <div class="dropdown-content">
                                    <a class="current" href="myprofile.php">My Profile</a>
                                </div>
                                </div>

                                </span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </header>

   <div class="container target">
       <div class="row">
           <div class="col-sm-6">
               <h1 class=""><?php
                   if(isset($_SESSION['username']) AND !empty($_SESSION['username'])) {
                       echo $_SESSION['username'];
                   }
                   ?>
               </h1>


               <!--button trigger modal-->
               <button type="button" class="btn btn-success" data-toggle="modal" id="myBtn" data-target="#myModal">Edit</button>

               <!--Modal-->
               <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                   <div class="modal-dialog" >
                       <div class="modal-content">
                           <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <h4 class="modal-title" id="myModalLabel">Edit your Details</h4>
                           </div>
                           <div class="modal-body">
                               <form action="myprofile.php" method="post" role="form">
                                   <div class="form-group">
                                       <label>Name</label>
                                       <input type="text" class="form-control" name="name" placeholder="change your name">

                                   </div>
                                   <div class="form-group">
                                       <label>Username</label>
                                       <input type="text" class="form-control" name="uname" placeholder="change your Username">

                                   </div>
                                   <div class="form-group">
                                       <label>Email</label>
                                       <input type="email" class="form-control" name="email" placeholder="change your email">

                                   </div>
                                   <div class="form-group">
                                       <label>Role</label>
                                       <input type="text" class="form-control" name="role" placeholder="What is your role">

                                   </div>
                                   <div class="form-group">
                                       <label>Bio</label>
                                       <textarea class="form-control" rows="3" name="bio" placeholder="Enter your bio"></textarea>

                                   </div>
                                   <div class="form-group">
                                       <label>Change your Password</label>
                                       <input type="password" class="form-control" name="newpass" placeholder="change your password">

                                   </div>
                                   <div class="form-group">
                                       <label>Confirm your Password</label>
                                       <input type="password" class="form-control" name="conpass" placeholder="confirm password">

                                   </div>
                                   <div class="form-group">
                                       <label>Your Websites</label>
                                       <input type="url" class="form-control" name="web" placeholder="Blog urls">

                                   </div>

                                   <button type="submit" class="btn btn-primary">Save changes</button>
                               </form>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                           </div>
                       </div>
                   </div>
               </div>



                <!-- <button type="button" class="btn btn-info">Send me a message</button>
               <button type="button" class="btn btn-info" >Inbox</button>-->
               <br>
           </div>
           <div class="col-sm-6" style="padding-top: 20px; padding-right: 30px;">
                   <fieldset id="profilepic_controls">
                       <!--model 2 trigger-->
                       <button type="button" class="btn btn-warning" data-toggle="modal" id="myProBtn" data-target="#myModal2">Upload Image</button>

                       <!--modal content-->
                       <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                           <div class="modal-dialog" >
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                       <h4 class="modal-title" id="myModalLabel2"></h4>
                                   </div>
                                   <div class="modal-body">
                                       <form action="profile.php" method="post" enctype="multipart/form-data">
                                           <input type="file" name="file" id="camerainput1" hidden="hidden">
                                           <button type="submit" name="submit" class="btn btn-default btn-sm">Upload</button>

                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>


                       <?php
                       $q = $mysqli->query("SELECT * FROM profile WHERE user_id = '$user_id'");
                       /*if ($q) {
                           echo "success";
                       }
                       else{
                           echo "failed";
                       }*/
                       $row2 = $q->fetch_assoc();
                       if($row2['profile_image'] == ""){
                           echo "<img title='profile image' class='img-circle img-responsive' src='images/149071.png' alt='image' style='padding-top: 20px;'>";
                       }
                       else {
                           //$profile =  $row2['profile_image'];
                       //profile_pic/ ".$row2['profile_image']."
                           echo "<img title='profile image' class='img-circle img-responsive' src ='profile_pic/".$row2['profile_image']."' alt='image' style='padding-top: 20px; width:200px; height:200px;'>";
                       }?>

                   </fieldset>



           </div>
       </div>
       <br>

       <?php

       $sql3 = $mysqli->query("SELECT * FROM profile WHERE user_id = '$user_id'");
       $row1 = $sql3->fetch_assoc();

       ?>
       <div class="row">
           <div class="col-sm-5" style="" contenteditable="false">
               <div class="panel panel-default">
                   <div class="panel-heading" style="background-color: #888888; color:black">About Me</div>

                   <div class="panel-body"><?php echo $row1['bio'];?>

                   </div>
               </div>

               <div class="panel panel-default">
                   <div class="panel-heading" style="background-color: #888888; color:black">Website <span class="glyphicon glyphicon-link"></span>

                   </div>
                   <div class="panel-body"><a href="<?php echo $row1['websites']?>" target="_blank" class=""><?php echo $row1['websites']?></a>
                   </div>
               </div>

               <ul class="list-group">
                   <li class="list-group-item text-muted" style="background-color: #888888; color:black">Activity <span class="glyphicon glyphicon-dashboard"></span>

                   </li>
                   <li class="list-group-item text-right"><span class="pull-left"><strong class="">Post</strong></span> 25</li>
                   <li class="list-group-item text-right"><span class="pull-left"><strong class="">Comments</strong></span> 125</li>
                   <li class="list-group-item text-right"><span class="pull-left"><strong class="">Reply</strong></span> 13</li>
                   <li class="list-group-item text-right"><span class="pull-left"><strong class="">Suggesions</strong></span> 37</li>

               </ul>
           </div>
           <div class="col-sm-7">
               <!--right col-->
               <ul class="list-group">

                   <li class="list-group-item text-muted " contenteditable="false" style="background-color: #888888; color:black">Profile <span class="glyphicon glyphicon-user"></span> </li>

                   <li class="list-group-item text-right"><span class="pull-left"><strong class="">Username</strong></span>
                       <?php echo $_SESSION['username'];?>
                   </li>
                   <li class="list-group-item text-right"><span class="pull-left"><strong class="">Name</strong></span>
                       <?php echo $_SESSION['fname'];?>
                   </li>
                   <li class="list-group-item text-right"><span class="pull-left"><strong class="">Email</strong></span>
                       <?php echo $_SESSION['email']?>
                      </li>
                   <li class="list-group-item text-right"><span class="pull-left"><strong class="">Role</strong></span>
                       <?php echo $row1['role']?></li>
               </ul>

               </div>

           <!--/col-3-->

              </div>
       </div>


           <div id="push"></div>




   <!--FOOTER-->
   <footer id="main-footer">
       <div class="container">
           <div class="row text-center">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   <p>Copyright &copy; 2017 | BrainStorm</p>

               </div>
           </div>
       </div>
   </footer>


   </body>
</html>
