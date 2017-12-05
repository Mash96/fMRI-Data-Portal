<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>fMRI Data Portal | Home</title>

    <!-- Style sheets-->
      <link rel="shortcut icon" href="TemplateData/favicon.ico">
      <link rel="stylesheet" href="TemplateData/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/font-awesome.css" rel="stylesheet">

      <!--custom style sheets-->
      <link href="css/style.css" rel="stylesheet">
      <link href="css/user-style.css" rel="stylesheet">






      <!-- <script src="TemplateData/UnityProgress.js"></script>
       <script src="Build/UnityLoader.js"></script>
       <script>
         var gameInstance = UnityLoader.instantiate("gameContainer", "Build/brain.json", {onProgress: UnityProgress});
       </script>-->


    </head>
    
    <body>
        <!--HEADER-->
        <header id="main-header">
            <div class="container">
                <div class="row ">
                    <div class="col-xs-2 col-sm-2 col-md-6 col-lg-6">
                        <h1><span class="primary-text">fMRI</span> Data Portal</h1>
                    </div>
                   <div class="col-xs-10 col-sm-10 col-md-6 col-lg-6">
                        <div class="pull-right">
                            <nav id="navbar">
                                <ul>
                                    <li class="current"><a href="index.php">Home</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="contact.html">Forum</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropbtn" id="drop" data-toggle="dropdown" role="button" aria-expanded="false">Research<span class="caret"></span></a>
                                        <ul class="dropdown-content" id="content">
                                            <li><a href="sensory.html">Sensory</a></li>
                                            <li><a href="motorcontrol.html">Motor Control</a></li>
                                            <li><a href="regulation.html">Regulation</a></li>
                                            <li><a href="language.html">Language</a></li>
                                            <li><a href="laterlization.html">Laterlization</a></li>
                                            <li><a href="emotion.html">Emotion</a></li>
                                            <li><a href="executive.html">Executive function</a></li>
                                        </ul>
                                    </li>



                                   <!-- <li><a href="">Forum</a></li>-->

                                    <?php
                                           if(isset($_SESSION['username']) AND !empty($_SESSION['username'])){
                                               //echo $_SESSION['logout'];
                                               echo '<li><a href="login/logout.php">';
                                               echo 'Logout';
                                               echo '</li>';

                                           }
                                           else {
                                               //echo $_SESSION['login'];
                                                echo '<li><a href="login/login_signup.php">';
                                               echo 'Login';
                                               echo '</li>';

                                           }
                                            ?>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <?php if(isset($_SESSION['username']) AND !empty($_SESSION['username'])) {
                    echo "<div class='row'>";
                  echo " <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'> ";
                       echo " <div class='pull-right'>
                            <div id='newbar'>
                                <span>
                                    <div class='dropdown' hidden>";
                                        echo "<span class='primary-text'>"; echo "Welcome,"; echo "</span>";
                                        echo " <a class='dropbtn' type='button' data-toggle='dropdown'>";
                                            echo $_SESSION['username'];
                                            echo"  <span class='caret'></span></a>
                                            <div class='dropdown-content'>
                                                <a href='myprofile.php'>My Profile</a>
                                            </div>
                                    </div>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>"; }?>
            </div>
        </header>
        
      
        <!--SHOWCASE-->
        <section id="showcase">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 showcase-content">
                        <h2>Welcome to <span class="primary-text">fMRI Data Portal</span></h2>
                        <p>fMRI scans are using for measuring Human Brain Activities.
                            What we are doing is helping the people who are interested in fMRI studies to identify the conflict areas of the research papers and take the actual domain area and visualize it through 3D brain models.</p>
                    </div>
                    
                </div>
            </div>
        </section>
        
        <!--FEATURES-->
        <section id="functions">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <h2><strong>Core Functions</strong></h2>

                        <!--discriptions-->

                        <div class="row content">

                            <div class="pull-left" id="buttons">
                            <!-- Trigger/Open The Modal -->
                                <ul>
                                    <li><button class="btn" data-id="0" >Motor Control</button></li>
                                    <li><button class="btn" data-id="1"> Sensory</button> </li>
                                    <li><button class="btn" data-id="2" onclick="showReg()"> Regulation</button> </li>
                                    <li><button class="btn" data-id="3" onclick="showLan()"> Language</button> </li>
                                    <li><button class="btn" data-id="4" onclick="showLat()"> Laterlization</button> </li>
                                    <li><button class="btn" data-id="5" onclick="showEmo()"> Emotion</button> </li>
                                    <li><button class="btn" data-id="6" onclick="showExe()"> Executive function</button> </li>
                                </ul>
                            </div>

                            <div id="pages" class="model-content">
                                <div class="mydivshow div0" id="motorDis" style="display: none; padding: 50px; color:black;">
                                    <p>Motor control is the process by which humans and animals use their brain/cognition to activate and coordinate the muscles and limbs involved in the performance of a motor skill.
                                    Fundamentally, it is the integration of sensory information, both about the world and the current state of the body,
                                    to determine the appropriate set of muscle forces and joint activations to generate some desired movement or action.
                                    This process requires cooperative interaction between the central nervous system and the musculoskeletal system, and is thus a problem of information processing, coordination, mechanics, physics, and cognition.
                                        Successful motor control is crucial to interacting with the world, not only determining action capabilities, but regulating balance and stability as well.
                                    </p>
                                </div>

                                <div class="mydivshow div1" id="senDis" style="display: none; padding: 50px;color:black;">
                                    <p>The sensory nervous system is a part of the nervous system responsible for processing sensory information. A sensory system consists of sensory neurons (including the sensory receptor cells), neural pathways, and parts of the brain involved in sensory perception.
                                        Commonly recognized sensory systems are those for vision, hearing, touch, taste, smell, and balance.
                                        In short, senses are transducers from the physical world to the realm of the mind where we interpret the information, creating our perception of the world around us</p>
                                </div>

                                <div class="mydivshow div2" id="senDis" style="display: none; padding: 50px;color:black;">
                                    <p>The sensory nervous system is a part of the nervous system responsible for processing sensory information. A sensory system consists of sensory neurons (including the sensory receptor cells), neural pathways, and parts of the brain involved in sensory perception.
                                        Commonly recognized sensory systems are those for vision, hearing, touch, taste, smell, and balance.
                                        In short,</p>
                                </div>

                                <div class="mydivshow div3" id="senDis" style="display: none; padding: 50px;color:black;">
                                    <p>The sensory nervous system is a part of the nervous system responsible for processing sensory information. A sensory system consists of sensory neurons (including the sensory receptor cells), neural pathways, and parts of the brain involved in sensory perception.
                                        Commonly recognized sensory systems are those for vision, hearing, touch, taste, smell, and balance.
                                        In short, senses are transducers from the physical world to the realm of the mind where we interpret the information, creating our perception of the world around us</p>
                                </div>

                                <div class="mydivshow div4" id="senDis" style="display: none; padding: 50px; color:black;">
                                    <p>The sensory nervous system is a part of the nervous system responsible for processing sensory information. A sensory system consists of sensory neurons (including the sensory receptor cells), neural pathways, and parts of the brain involved in sensory perception.
                                        Commonly recognized sensory systems are those for vision, hearing, touch, taste, smell, and balance.
                                        In short, senses are transducers from the physical world to the realm of the mind where we interpret the information, creating our perception of the world around us</p>
                                </div>

                                <div class="mydivshow div5" id="senDis" style="display: none; padding: 50px;color:black;">
                                    <p>The sensory nervous system is a part of the nervous system responsible for processing sensory information. A sensory system consists of sensory neurons (including the sensory receptor cells), neural pathways, and parts of the brain involved in sensory perception.
                                        Commonly recognized sensory systems are those for vision, hearing, touch, taste, smell, and balance.
                                        In short, senses are transducers from the physical world to the realm of the mind where we interpret the information, creating our perception of the world around us</p>
                                </div>

                                <div class="mydivshow div6" id="senDis" style="display: none; padding: 50px;color:black;">
                                    <p>The sensory nervous system is a part of the nervous system responsible for processing sensory information. A sensory system consists of sensory neurons (including the sensory receptor cells), neural pathways, and parts of the brain involved in sensory perception.
                                        Commonly recognized sensory systems are those for vision, hearing, touch, taste, smell, and balance.
                                        In short, senses are transducers from the physical world to the realm of the mind where we interpret the information, creating our perception of the world around us</p>
                                </div>

                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </section>

        <section id="brain">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p align="center">To launch the brain to see the highlighted areas click below</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button class="btn btn-default">Launch Brain</button>
                </div>
            </div>

        </section>

        <!--COMPANY-->
        <section id="company">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <h2>Contact Us</h2>
                        <ul>
                           <!-- <li><span class="glyphicon glyphicon-phone-alt"></span> </li>-->
                            <li><span class="glyphicon glyphicon-envelope"></span> fmribrainstorm@gmail.com</li>
                        </ul>
                    </div>               
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <h2>Read More</h2>
                        <p>Blog link</p>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <h2>Search</h2>
                        <form>
                            
                            <div class="form-inline">
                                <input type="text" class="form-control" placeholder="search here">
                                <input type="submit" class="btn btn-info" value="Submit">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
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

        <!--script files-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("button").click(function() {
                    var id = $(this).attr("data-id"); // Using a custom attribute.
                    $("#pages div").hide(); // gather all the div tags under the element with the id pages and hide them.
                    $(".div" + id).show(); // Show the div with the class of .divX where X is the number stored in the data-id of the object that was clicked.
                });
            });
        </script>​​​​
    </body>
</html>