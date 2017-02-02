<html>
    <head>
        <title>Exam Portal</title>
    </head>
    <body style="background-color: #666666">

        <?php
        include './includes/database_connect.inc.php';
        session_start();
        ?>
        <?php
        include './includes/cssheaders.inc.php';

        if (array_key_exists('role_id', $_SESSION)) {
            if ($_SESSION['role_id'] == 4) {
                header('Location: app.php');
            } else if ($_SESSION['role_id'] == 3) {
                header('Location: invigilator.php');
            } else if ($_SESSION['role_id'] == 2) {
                header('Location: super.php');
            } else if ($_SESSION['role_id'] == 1) {
                header('Location: admin_home.php');
            } else if ($_SESSION['role_id'] == 5) {
                header('Location: wait.php');
            }
        }
        ?>

        <!-- Title and Stufff -->

        <div class="row">

            <!-- Description and Stuff -->

            <!-- Login Or Sign Up -->
            <div class="container">
                <div class="row">

                    <div class="col-md-5 col-md-offset-4 well" style="margin-top: 5%;">
                        <div class="login-banner text-center">
                            <h1 style="color:black"><i class="fa fa-gears"></i> Online Exam Portal</h1>
                        </div>

                        <div class="row">
                            <div class="col-lg-1">
                                <h4  style="margin-top: 17px"><strong style="font-size: 20px;">Login</strong>
                                </h4>
                            </div>
                            <div class="col-lg-9"></div>
                            <div  class="col-lg-2">
                                <a data-toggle="modal" data-target="#SignUpModal" align='center' href="#"><i class="fa fa-plus-circle fa-2x" data-toggle="tooltip" data-placement="left" title="Create Account"> </i></a>
                            </div>
                        </div>


                        <div class="">
                            <form id='loginform' method="post" action='functions/login/authenticate_user.php'>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="input-lg form-control" placeholder="E-mail" id="login_email" name='e' type="text">
                                        <span class="error-text margintopbottom" id='rlogin_email'></span>
                                    </div>
                                    <div class="form-group ">
                                        <input class="input-lg form-control" placeholder="Password" id="login_password" name='p' type="password" value="">
                                        <span class="error-text margintopbottom" id='rlogin_password'></span>
                                    </div>
                                    <div>
                                        <span style="color: red">
<?php
if (array_key_exists('invalid_login', $_SESSION)) {
    echo $_SESSION['invalid_login'];
}
?>
                                        </span>
                                    </div>
                                    <br>
                                    <button class="btn btn-lg btn-info btn-block" onclick="onClickLogIn()" >Sign In</button>
                                </fieldset>
                                <br>
                                <p>
                                    <a href="#">Forgot your password?</a>
                                </p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>





            <!-- Pop Up for Sign Up !-->
            <div class="modal fade" id="SignUpModal" tabindex="-1" role="dialog" aria-labelledby="SignUpModalView" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="standardModalLabel"><div align='center'><b>Registration</b> Portal</div></h4>
                        </div>
                        <!--Sign Up Text Boxes !-->
                        <div class="modal-body" id="signupview" align='center'>
                            <input class="form-control marginbottom" type="text" id='nun' placeholder="Enter User Name"><br><span class="error-text margintopbottom" id="rnun"></span><br><br>
                            <input class="form-control marginbottom" type="text" id='em' placeholder="Enter Email Id"><br><span class="error-text margintopbottom" id="rem"></span><br><br>
                            <input class="form-control marginbottom" type="text" id='mo' placeholder="Enter Mobile Number"><br><span class="error-text margintopbottom" id="rmo"></span><br><br>                                
                            <input class="form-control marginbottom" type="password" id='npa' placeholder="Enter Password"><br><span class="error-text margintopbottom" id="rnpa"></span><br><br>
                            <input class="form-control marginbottom" type="password" id='ncpa' placeholder="Enter Confirm Password"><br><span class="error-text margintopbottom" id="rncpa"></span><br><br>

                        </div>


                        <!--Sign Up Text Boxes End!-->

                        <div class="modal-footer" align="center">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-green" data-dismiss="modal" onclick="onClickSignUp()">Sign Up</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- End of Pop Up for Sign Up -->






        </div>


<?php include './includes/jsheaders.inc.php'; ?>

        <!-- JS of Death -->
        <script>
            var flagn = 1, flagp = 1, flagcp = 1, flagm = 1, flage = 1;
            $(document).ready(function () {
                //UI look and feel
                //$('#signupview').slideUp();

                //$('#switchsignup').click(function () {
                //    $('#signupview').slideDown(400);
                //    $('#loginview').slideUp(400);
                //});

                //$('#switchlogin').click(function () {
                //    $('#loginview').slideDown(400);
                //    $('#signupview').slideUp(400);
                //});
                //UI look and feel end

                //*********************************************************************//

                //Set Up for sign up Validations    

                $("#rnun").hide();
                $("#rem").hide();
                $("#rmo").hide();
                $("#rnpa").hide();
                $("#rncpa").hide();
                //Set Up for Sign Up Validations Ends

                //*********************************************************************//

                //Sign Up Validations
                $('#nun').blur(function () {
                    var new_user_name = $('#nun').val();
                    var ck_name = /^[a-zA-Z\s]*$/;
                    if (!ck_name.test(new_user_name))
                    {
                        $("#rnun").html(" User name can only contain letters and spaces");
                        $("#rnun").show();
                        $("#nun").css("border-color", "#FF0000");
                        flagn = 1;
                    }
                    else
                    {
                        $("#rnun").hide();
                        $("#rnun").html("");
                        $("#nun").css("border-color", "");
                        flagn = 0;
                    }
                });
                $('#em').blur(function () {
                    var email = $('#em').val();
                    var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                    if (!ck_email.test(email))
                    {
                        flage = 1;
                        $("#rem").html(" Please enter a valid email id");
                        $("#rem").show();
                        $("#em").css("border-color", "#FF0000");
                    }
                    else
                    {
                        flage = 0;
                        $("#rem").hide();
                        $("#rem").html("");
                        $("#em").css("border-color", "");
                    }
                });
                $('#mo').blur(function () {
                    var mobile = $('#mo').val();
                    var ck_mobile = /^[0-9]{10,12}$/;
                    if (!ck_mobile.test(mobile))
                    {
                        flagm = 1;
                        $("#rmo").html(" Please enter a valid mobile number");
                        $("#rmo").show();
                        $("#mo").css("border-color", "#FF0000");
                    }
                    else
                    {
                        flagm = 0;
                        $("#rmo").hide();
                        $("#rmo").html("");
                        $("#mo").css("border-color", "");
                    }
                });
                $('#npa').blur(function () {
                    var password = $('#npa').val();
                    var ck_password = /^[A-Za-z0-9!@#$%^&*()_]{6,40}$/;
                    if (!ck_password.test(password))
                    {
                        flagp = 1;
                        $("#rnpa").html(" Password must contain atlease 6 characters");
                        $("#rnpa").show();
                        $("#npa").css("border-color", "#FF0000");
                    }
                    else
                    {
                        flagp = 0;
                        $("#rnpa").hide();
                        $("#rnpa").html("");
                        $("#npa").css("border-color", "");
                    }
                });
                $('#ncpa').keyup(function () {
                    var password = $('#npa').val();
                    var cpassword = $("#ncpa").val();
                    if (password === cpassword)
                    {
                        flagcp = 0;
                        $("#rncpa").hide();
                        $("#rncpa").html("");
                        $("#rncpa").css("border-color", "");
                    }
                    else
                    {
                        flagcp = 1;
                        $("#rncpa").html(" Password do not match");
                        $("#rncpa").show();
                        $("#ncpa").css("border-color", "#FF0000");
                    }
                });
                //Sign Up Validations Ends

                //*********************************************************************//

                //

            }); //End of Document Ready Function of JQUERY

            //sign up functionality
            function onClickSignUp()
            {
                if (flagcp == 0 && flagp == 0 && flage == 0 && flagm == 0 && flagn == 0)
                {
                    var nun = $('#nun').val();
                    var em = $('#em').val();
                    var mo = $('#mo').val();
                    var npa = $('#npa').val();


                    $.ajax({
                        url: "functions/login/register_user.php",
                        type: "post",
                        data: {'u': nun, 'em': em, 'mo': mo, 'npa': npa},
                        success: function (data)
                        {
                                alertify.log("Registered Successfully");
                                $.ajax({
                                    url: "loginverification.php",
                                    type: "post",
                                    data: {'uid':data},
                                    success: function (data)
                                    {
                                alertify.log("A mail has been sent to you, kindly verify your account to become an applicant");
                                    }
                                });
                                alertify.log("Admin has been acknowledged.");


                                //swal("Registered Successfully!", "check your email to activate your account!", "success");
                                $('#modal').modal('toggle');
                            }
                        });
                }
                else
                {
                    alertify.error("<b>Kindly provide your correct information before clicking on sign up<b>");



                    //alertify.log("For security reasons, This incident will be logged");
                }
            }

            //login functionality
            function onClickLogIn()
            {
                var em = $("#login_email").val();
                var pa = $('#login_password').val();
                if (em == "")
                {
                    $('#rlogin_email').html('email cannot be blank');
                }
                else
                {
                    $('#rlogin_email').html('');
                    if (pa == "")
                    {
                        $('#rlogin_password').html('password cannot be blank');
                    }
                    else
                    {
                        $('#rlogin_password').html('');
                        $('#loginform').submit();
                    }
                }


            }
        </script>
    </body>
</html>