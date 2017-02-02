<?php
include './includes/database_connect.inc.php';
include './includes/cssheaders.inc.php';
include './includes/inv_navbar.inc.php';

//This will manage the session Variables
session_start();

if (array_key_exists('role_id', $_SESSION)) {
    if ($_SESSION['role_id'] == 3) {
        
    } else {
        $_SESSION['invalid_login'] = "You do not have permission to view that page or your Session has expired";
        header("Location: login.php");
    }
} else {
    $_SESSION['invalid_login'] = "Kindly Log in to View that Page";
    header("Location: login.php");
    die;
}
$ques_num = 1;
?>
<body>
<!--    ############################### CREATE TEST#############################-->

    <div class='row' id = 'row_createTest' >
        <div class="col-lg-3" ></div>
        <div class='col-lg-6' id = "createTest"></div>
        <div class="col-lg-3"></div>
    </div>
    <div id="questionpaper-html" class="well" >
        <div>
            <center><h3>Create Tests</h3></center>
            <div class="form-group ">
                <label for="inputEmail" class="col-lg-2 control-label">Subject</label>
                <div class="col-lg-10">
                    <input id="inputCourseName" class="form-control" type="text" placeholder="eg: Java SE 2014-2016"></input>
                    <div id="rinputCourseName" class="error-text"></div>
                </div>
                <br><br><br>
                <label for="inputEmail" class="col-lg-2 control-label">Description</label>
                <div class="col-lg-10">
                    <div class="form-control-wrapper">
                        <textarea class="form-control empty" rows="3" id="inputCourseDescription"></textarea>
                        <div class="floating-label">Enter Paper Description</div>
                        <span class="material-input"></span>
                    </div>
                    <div id="rinputCourseDescription" class="error-text"></div>
                </div>
                <center><button class="btn btn-warning" onClick="insertQuestionPaperInfo()">Submit</button></center>
            </div>
        </div>
    </div>

    <div class="col-lg-4 row" id="question-list" >
        <div class="well-sm" >
        <div class="list-group"  id="ques-list" style="height:70%;overflow-y:auto; ">
        </div>
        </div>
    </div>
    <div class='row col-lg-6 well' id="question-type-n-ques">
    </div>
    <div class="col-lg-2"></div>

    <!--    ############################### EDIT TEST#############################-->

    
    <?php
    include './includes/jsheaders.inc.php';
    ?> 
    <script>
        var i = 1;
        $(document).ready(function()
        {
            $.material.init();
            $.material.ripples();
            $('#row_createTest').hide();
            $('#createTest').hide();
            $('#question-list').hide();
            $('#question-type-n-ques').hide();
            $("#questionpaper-html").hide();
        });

        function onClickCreateTest()
        {
            $('#question-type-n-ques').hide();
            $("#questionpaper-html").hide();
       
            $('#row_createTest').show();
            $('#createTest').html($("#questionpaper-html").html());
            $('#createTest').fadeIn(500);
        }

        function insertQuestionPaperInfo()
        {
            var test_name = $('#inputCourseName').val();
            var test_description = $('#inputCourseDescription').val();
            var status=0;
            
            if(test_name=="")
            {
                status=1;
                $('#rinputCourseName').html("Test Name cannot be Empty");
            }
            else
            {
              $('#rinputCourseName').html("");
            }
            if(test_description=="")
            {
                status=1;
                $('#rinputCourseDescription').html("Description cannot be Empty");
            }
            else
            {
                $('#rinputCourseDescription').html("");
            }
            if(status==0)
            {
                $('#createTest').fadeOut(500).delay(500);
                $.ajax({
                    url: "functions/invigilator/inv_insertQestionPaperInfo.php",
                    type: "post",
                    data: {'test_name': test_name, 'test_description': test_description},
                    success: function(data)
                    {
                        $('#createTest').hide();
                        $('#question-list').show();
                        $('#question-type-n-ques').html(data);
                        $('#question-type-n-ques').fadeIn(1000);
                    }
                });
            }
        }

        
        function onClickEditTest()
        {
            
        }



    </script>    
