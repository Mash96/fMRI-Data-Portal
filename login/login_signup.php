<?php session_start();
//session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>fMRI Data Portal | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" >
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" >
        <meta name="author" content="Codrops" >

        <link rel="shortcut icon" href="../../favicon.ico">
		<link rel="stylesheet" type="text/css" href="../css/animate-custom.css" >
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">

    </head>
    <body>
        <div class="container-main">
        <!--HEADER-->
        <header id="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-2 col-md-6 col-lg-6">
                        <h1><span class="primary-text">fMRI</span> Data Portal</h1>
                    </div>
                    <div class="col-xs-12 col-sm-10 col-md-6 col-lg-6">
                        <div class="pull-right">
                             <nav id="navbar">
                                <ul>
                                    <li ><a href="../index.php">Home</a></li>
                                    <li><a href="../contact.html">Contact</a></li>
                                     <li><a href="">Forum</a></li>
                                    <li class="current"><a href="login_signup.php">Login</a></li>

                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </header>

            <!--LOGIN/SIGNUP FORM-->
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <!--Login form-->
                        <div id="login" class="animate form-sm">
                            <form action="login.php" autocomplete="on" method="post">
                                <h1>Log in</h1>

                                <p>

                                    <label  class="uname" data-icon="u"> Your email or username </label>
                                    <input class="form-control" name="username" required="required" type="text"
                                           placeholder="myusername or mymail@mail.com"/>

                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password"
                                           placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="keeplogin">
                  									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
                  									<label for="loginkeeping">Keep me logged in</label>
                                </p>
                                <p class="forgotpass">
                                    <a href="forgot.php">Forgot Password</a>
                                </p>
                                <p class="login button">
                                    <input type="submit" value="Login" />
                								</p>
                                <p class="change_link">
                									Not a member yet ?
                									<a href="#toregister" class="to_register">Join us</a>
                								</p>
                            </form>
                        </div>
                        <!--Registratio form-->
                        <div id="register" class="animate form">
                            <form action="register.php" autocomplete="on" method="post" enctype="multipart/form-data">
                                <h1> Sign up </h1>

                                    <div class="form-row firstrow">
                                        <div class="form-group col-md-6">
                                            <div class="pull-left">

                                                <label for="uname" class="uname" data-icon="u">Your name</label>
                                                <input id="uname" name="name" required="required" type="text" placeholder="A.U.S. de silva" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                            <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                        </div>

                                    </div>

                                <div class="form-group">
                                     <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/>
                                </div>

                                <div class="form-group">
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </div>

                              <div class="form-group">
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </div>

                                <div class="form-group">

            									<label for="file_upload">Please upload a valid zipped document to prove your identity </label>
            									<input id="file_upload"  type="file" name="file" accept="application/*">
                                </div>

                                <div class="signin button">
              									<input type="submit" value="Sign up"/>
              								</div>
                              <div class="change_link">
              									Already a member ?
              									<a href="#tologin" class="to_register"> Go and log in </a>
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
        </div>
    </body>
</html>
