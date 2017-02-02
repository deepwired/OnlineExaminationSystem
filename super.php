<?php
include './includes/database_connect.inc.php';
session_start();



if (array_key_exists('role_id', $_SESSION)) {
    if ($_SESSION['role_id'] == 2) {
        
    } else {
        $_SESSION['invalid_login'] = "You do not have permission to view that page or your Session has expired";
        header("Location: login.php");
    }
} else {
    $_SESSION['invalid_login'] = "Kindly Log in to View that Page";
    header("Location: login.php");
    die;
}
?>
<style>* {
        box-sizing: border-box;
    }

    .strips {
        min-height: 100vh;

        text-align: center;
        overflow: hidden;
        color: white;
    }
    .strips__strip {
        will-change: width, left, z-index, height;
        position: absolute;
        width: 20%;
        min-height: 100vh;
        overflow: hidden;
        cursor: pointer;
        -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .strips__strip:nth-child(1) {
        left: 0;
    }
    .strips__strip:nth-child(2) {
        left: 20vw;
    }
    .strips__strip:nth-child(3) {
        left: 40vw;
    }
    .strips__strip:nth-child(4) {
        left: 60vw;
    }
    .strips__strip:nth-child(5) {
        left: 80vw;
    }
    .strips__strip:nth-child(1) .strip__content {
        //background: #005f8d;
        background: black;
        -webkit-transform: translate3d(-100%, 0, 0);
        transform: translate3d(-100%, 0, 0);
        -webkit-animation-name: strip1;
        animation-name: strip1;
        -webkit-animation-delay: 0.1s;
        animation-delay: 0.1s;
    }
    .strips__strip:nth-child(2) .strip__content {
        // background: #6da2c8;
        background: #454545;

        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
        -webkit-animation-name: strip2;
        animation-name: strip2;
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;
    }
    .strips__strip:nth-child(3) .strip__content {
        //background: teal;
        background: gray;

        -webkit-transform: translate3d(0, -100%, 0);
        transform: translate3d(0, -100%, 0);
        -webkit-animation-name: strip3;
        animation-name: strip3;
        -webkit-animation-delay: 0.3s;
        animation-delay: 0.3s;
    }
    .strips__strip:nth-child(4) .strip__content {
        // background: lightseagreen;
        background: #454545;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
        -webkit-animation-name: strip4;
        animation-name: strip4;
        -webkit-animation-delay: 0.4s;
        animation-delay: 0.4s;
    }
    .strips__strip:nth-child(5) .strip__content {
        background: black;
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
        -webkit-animation-name: strip5;
        animation-name: strip5;
        -webkit-animation-delay: 0.5s;
        animation-delay: 0.5s;
    }
    @media screen and (max-width: 760px) {
        .strips__strip {
            min-height: 20vh;
        }
        .strips__strip:nth-child(1) {
            top: 0;
            left: 0;
            width: 100%;
        }
        .strips__strip:nth-child(2) {
            top: 20vh;
            left: 0;
            width: 100%;
        }
        .strips__strip:nth-child(3) {
            top: 40vh;
            left: 0;
            width: 100%;
        }
        .strips__strip:nth-child(4) {
            top: 60vh;
            left: 0;
            width: 100%;
        }
        .strips__strip:nth-child(5) {
            top: 80vh;
            left: 0;
            width: 100%;
        }
    }
    .strips .strip__content {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-timing-function: cubic-bezier(0.23, 1, 0.32, 1);
        animation-timing-function: cubic-bezier(0.23, 1, 0.32, 1);
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-decoration: none;
    }
    .strips .strip__content:hover:before {
        -webkit-transform: skew(-30deg) scale(3) translate(0, 0);
        -ms-transform: skew(-30deg) scale(3) translate(0, 0);
        transform: skew(-30deg) scale(3) translate(0, 0);
        opacity: 0.1;
    }
    .strips .strip__content:before {
        content: "";
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: white;
        opacity: 0.05;
        -webkit-transform-origin: center center;
        -ms-transform-origin: center center;
        transform-origin: center center;
        -webkit-transform: skew(-30deg) scaleY(1) translate(0, 0);
        -ms-transform: skew(-30deg) scaleY(1) translate(0, 0);
        transform: skew(-30deg) scaleY(1) translate(0, 0);
        -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .strips .strip__inner-text {
        will-change: transform, opacity;
        position: absolute;
        z-index: 5;
        top: 50%;
        left: 50%;
        width: 70%;
        -webkit-transform: translate(-50%, -50%) scale(0.5);
        -ms-transform: translate(-50%, -50%) scale(0.5);
        transform: translate(-50%, -50%) scale(0.5);
        opacity: 0;
        -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .strips__strip--expanded {
        width: 100%;
        top: 0 !important;
        left: 0 !important;
        z-index: 3;
        cursor: default;
    }
    @media screen and (max-width: 760px) {
        .strips__strip--expanded {
            min-height: 100vh;
        }
    }
    .strips__strip--expanded .strip__content:hover:before {
        -webkit-transform: skew(-30deg) scale(1) translate(0, 0);
        -ms-transform: skew(-30deg) scale(1) translate(0, 0);
        transform: skew(-30deg) scale(1) translate(0, 0);
        opacity: 0.05;
    }
    .strips__strip--expanded .strip__title {
        opacity: 0;
    }
    .strips__strip--expanded .strip__inner-text {
        opacity: 1;
        -webkit-transform: translate(-50%, -50%) scale(1);
        -ms-transform: translate(-50%, -50%) scale(1);
        transform: translate(-50%, -50%) scale(1);
    }

    .strip__title {
        display: block;
        margin: 0;
        position: relative;
        z-index: 2;
        width: 100%;
        font-size: 3.5vw;
        color: white;
        -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }
    @media screen and (max-width: 760px) {
        .strip__title {
            font-size: 28px;
        }
    }

    .strip__close {
        position: absolute;
        right: 3vw;
        top: 3vw;
        opacity: 0;
        z-index: 10;
        -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        cursor: pointer;
        -webkit-transition-delay: 0.5s;
        transition-delay: 0.5s;
    }
    .strip__close--show {
        opacity: 1;
    }

    @-webkit-keyframes strip1 {
        0% {
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes strip1 {
        0% {
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @-webkit-keyframes strip2 {
        0% {
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @keyframes strip2 {
        0% {
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @-webkit-keyframes strip3 {
        0% {
            -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @keyframes strip3 {
        0% {
            -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @-webkit-keyframes strip4 {
        0% {
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @keyframes strip4 {
        0% {
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @-webkit-keyframes strip5 {
        0% {
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @keyframes strip5 {
        0% {
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    /* Demo purposes */
    body {
        font-family: 'Open Sans';
        -webkit-font-smoothing: antialiased;
        text-rendering: geometricPrecision;
        line-height: 1.5;
    }

    h1, h2 {
        font-weight: 300;
    }

    .fa {
        font-size: 30px;
        color: white;
    }

    h2 {
        font-size: 36px;
        margin: 0 0 16px;
    }

    p {
        margin: 0 0 16px;
    }

</style>
<?php
include './includes/cssheaders.inc.php';
//include './includes/sup_navbar.inc.php';
?>



<section class="strips">
    <article class="strips__strip">
        <div class="strip__content">
            <h1 class="strip__title" data-name="Lorem"  ><span id="home_groups">Groups</span></h1>
            <div class="strip__inner-text">
                <div id="parent_div_of_groups">    
                    <div align="center" ><h1><i class="fa fa-gears"></i>Groups</h1></div>
                    <br>
                    <div id="overall-group"  class="container" style="height:600px;overflow-y: auto;">
                        <div class="row">
                            <div class='col-lg-5' align="center"><h1>Available Groups</h1>
                                <div id='l' class="well" style="height:400px;overflow-y: auto;"></div>
                            </div>
                            <div class='col-lg-1'>&nbsp;</div>    
                            <div class='col-lg-6' style="color:white" align="center"><h1>Options</h1>    
                                <div id="c"  style="height:400px;" align='center' style="height:400px;overflow-y: auto;"></div>
                            </div>
                        </div>    
                    </div>

                    <!-- Second Pard of Page -->

                    <div id="individual-group" class="container" style="height:600px;overflow-y: auto;">

                        <div class="well col-lg-4" style="color:black" id="group-information">
                        </div>

                        <div class="col-lg-3 " id="in-group" style="height:450px;overflow-y: auto;">
                        </div>

                        <div class="col-lg-1">
                            <button class="btn-warning btn-raised"  style="margin-left: -2px;margin-top:170px" onClick="shift_members()"><i class="fa fa-4x fa-arrows-h"></i></button>
                        </div>

                        <div class="col-lg-3 " id="all-applicants" style="height:450px;overflow-y: auto;">
                        </div>
                        <div class="col-lg-1" >
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </article>
    <article class="strips__strip">
        <div class="strip__content">
            <h1 class="strip__title" data-name="Ipsum"><span id="home_exams">Exams</span></h1>
            <div class="strip__inner-text">
                <div id="parent_div_of_exams" class="container">    


                    <div id="overall-exams" class="col-lg-12" style="height:580px;overflow-y: auto;">
                        <div  align="center"><h1><i class="fa fa-pagelines"></i>Exams</h1></div>
                        <br>

                        <div class="row">
                            <div class='col-lg-5' align="center"><h1>Available Exams</h1>
                                <div id='listofavailableexams' class="well" hidden style="height:400px;overflow-y: auto;"></div>
                                <div id="refreshexam" hidden >Refresh Required Here,Click Me</div>
                            </div>
                            <div class='col-lg-2'>&nbsp;</div>    
                            <div class='col-lg-5' align="center"><h1>Options</h1>    

                                <br><br><br><br>
                                <div id="create_delete_exams">
                                    <button class="btn btn-lg btn-material-teal-500" onClick="startCreateExam()"><i class="fa fa-plus-circle"></i> Create an Exam </button>
                                    <br><br>
                                    <button class="btn btn-lg btn-material-teal-500" onClick="startDeleteExam()"><i class="fa fa-minus-circle"></i> Delete an Exam </button>                
                                </div>
                                <div hidden id="delete_exam">
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div id="createtheexam" class="col-lg-12" hidden style="height:710px;overflow-y: auto;" >

                        <div class="col-lg-4">

                        </div>
                        <div class="well well-material-teal-50 col-lg-4 " align="center" ><input style="width: 50%" type="text" class="form-control" id="examName" placeholder="Enter Exam Name">
                            <span class="error-text" id="rexamName"></span>
                            <div id="empty-space"><br><br></div>
                            <div id="examDescriptionOverall"  class="form-control-wrapper">
                                <textarea  id="examDescription" class="form-control empty"></textarea>
                                <div align="center" class="floating-label">Enter Exam Description</div>
                                <span class="material-input"></span>
                            </div>
                            <span class="error-text" id="rexamDescription"></span>
                            <button class="btn btn-lg btn-default" id="btncreateexam" onClick="insertExamDetails()">Confirm Create Exam</button>                            
                            <button class="btn btn-lg btn-default" id="btncalcelexam" onClick="cancelCreateExam()">Cancel and Go Back</button>
                        </div>
                        <div class="col-lg-4"></div>

                        <div class="col-lg-12" id="portaladdquestionstoexam">
                            <div  class="col-lg-3" id="displayquestionsofexam" style="color:black">
                                <div class="well" style="color:black;">Question List for this Paper</div>
                                <div id="listofquestions" class="list-group" style="height:580px;overflow-y: auto;">

                                </div>


                            </div>
                            <div class="col-lg-6" align="center" id="addquestionstoexam"></div>
                            <div class="col-lg-3" id="exam_status"></div>
                        </div>
                    </div>
                    <div id="edit_exam_paper" style='color:black' hidden>
                    </div>    

                </div>
            </div>
    </article>
    <article class="strips__strip">
        <div class="strip__content"  >


            <h1 class="strip__title" data-name="Dolor" ><span id="home_schedule" >Scheduling</span></h1>
            <div class="strip__inner-text">
                <div id="parent_div_of_schedule" class="container" style="height:600px;overflow-y: auto;">    

                    <div id="view_delete_schedule" class="col-lg-12" align="center" >
                        <div id="rschedule_the_test" ></div>
                        <h1><i class="fa fa-calendar-o"></i>Schedule</h1>
                        <div id='all_current_schedules' class="col-lg-5">

                            <div align="center"><h1>Current Schedule</h1></div>
                            <div id="complete_schedule" style="height:400px;overflow-y: auto;">
                                Entire Schedule List should be loaded here
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                        <div id='create_delete_schedules' class="col-lg-5">

                            <div align="center"><h1>Options</h1>    
                                <div id='create_delete_schedules_buttons' align="center">
                                    <div align='center' style="height:400px;overflow-y: auto;">
                                        <br><br><br><br>
                                        <button id='onClickCreateScheduleButton' class='btn btn-lg btn-default btn-material-teal-500'><i class="fa fa-plus-circle"btn-ma></i> Create Schedule</button>
                                        <br><br>
                                        <button id='onClickDeleteScheduleButton' onClick="startDeleteSchedule()" class='btn btn-lg btn-default btn-material-teal-500'><i class="fa fa-minus-circle"></i> Delete Schedule</button>                        
                                    </div>
                                </div>
                            </div>
                            <div hidden id='delete_schedules_view'>
                            </div>
                        </div>
                    </div>
                    <div col="col-lg-12" style="height:border-box; ">
                            <div id="create_schedule_form" hidden class="col-lg-6 well" >
                                <div style="color:black" align="center" class="col-lg-10">
                                    <legend>Please Fill in the Required Information</legend>
                                </div>
                                <div class="col-lg-1" align="right">
                                    <div class="btn btn-default" id="cancel_this_schedule">
                                        <i class="mdi-content-clear"></i>
                                    </div>
                                </div>
                                <div  class="col-lg-12" align="center">
                                    <label class="col-lg-3 control-label" style="color:black;">Question Paper</label>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-7 " id="ddquestion_paper">
                                        <?php
                                        $stmt2 = $con->prepare("select id,name from question_paper");
                                        $stmt2->execute();
                                        $stmt2->store_result();
                                        if ($stmt2->num_rows > 0) {
                                            ?>

                                            <select class="btn btn-default form-control  dropdown-toggle" id="schedule_question_paper">
                                                <option value="0">Select a Question Paper</option>
                                                <?php
                                                $stmt2->bind_result($id, $name);
                                                while ($stmt2->fetch()) {
                                                    echo "<option value='$id'>" . substr($name, 0, 15) . "</option>";
                                                }
                                                echo "</select>";
                                                $stmt2->close();
                                            } else {
                                                ?>
                                                <select class="btn btn-default form-control dropdown-toggle" id="schedule_question_paper">
                                                    <option value="0">Kindly Create a Question Paper First</option>
                                                </select>
                                                <?php
                                            }
                                            ?>
                                    </div>
                                    <div class='error-text' id='rs_q_p'></div>
                                </div>
                                <!--date time picker -->
                                <div   class="col-lg-12" align="center">
                                    <label class="col-lg-3 control-label" style="color:black;">Group Name</label>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-7" id="ddgroups">
                                        <?php
                                        $stmt2 = $con->prepare("select id,name from groups");
                                        $stmt2->execute();
                                        $stmt2->store_result();
                                        if ($stmt2->num_rows > 0) {
                                            ?>

                                            <select class="btn btn-default form-control dropdown-toggle" id="schedule_group">
                                                <option value="0">Select a Group</option>
                                                <?php
                                                $stmt2->bind_result($id, $name);
                                                while ($stmt2->fetch()) {
                                                    echo "<option value='$id'>" . substr($name, 0, 15) . "</option>";
                                                }
                                                echo "</select>";
                                                $stmt2->close();
                                            } else {
                                                ?>
                                                <select class="btn btn-default dropdown-toggle form-control" id="schedule_group">
                                                    <option value="0">Kindly Create a Question Paper First</option>
                                                </select>
                                                <?php
                                            }
                                            ?>
                                    </div>
                                    <div class='error-text' id='rs_g'></div>
                                </div>


                                <div style="color:black" class="col-lg-12">
                                    <label class="control-label col-lg-3" style="color:black;">Start Date</label>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-7 form-group" align="center">
                                        <div class='input-group date'  id='datetimepicker6'>
                                            <input type='text' onkeydown="return false" placeholder="Click on the icon" id='schedule_start_date' class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class='error-text' id='rs_s_d'></div> 


                                <div style="color:black" class="col-lg-12">
                                    <label class="control-label col-lg-3" style="color:black;">End Date</label>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-7 form-group" align="center">
                                        <div class='input-group date'  id='datetimepicker7'>
                                            <input type='text' onkeydown="return false" placeholder="Click on the icon" id="schedule_end_date" class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class='error-text' id='rs_s_e'></div>


                                <div class="col-lg-12">
                                    <label class="control-label col-lg-3" style="color:black;">Duration (in hrs)</label>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-7 input-group number-spinner">
                                        <select class="btn btn-default form-control dropdown-toggle" id="duration_hours">
                                            <option value="0">Test duration (hours)</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='error-text' id='rdh'></div>

                                <div class="col-lg-12">
                                    <label class="control-label col-lg-3" style="color:black;">Duration (in mins)</label>
                                    <div class="col-lg-2"></div>
                                    <div class="input-group number-spinner col-lg-7 ">
                                        <select class="btn btn-default form-control dropdown-toggle" id="duration_minutes">
                                            <option value="0">Test duration (minutes)</option>
                                            <option value="0">00</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="30">30</option>
                                            <option value="45">45</option>
                                        </select>
                                    </div>
                                    <div class='error-text' id='rdm'></div>
                                </div>
                                <div align="center" style="color:black">

                                    <button onClick="schedule_the_test()" class="btn btn-lg btn-warning"> Schedule The Test </button>
                                </div>  
                            </div>


                            <div id='selectedGroupSchedule' class="col-lg-6" hidden style="height:450px;overflow-y: auto;">

                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </article>
    <article class="strips__strip">
        <div class="strip__content">
            <h1 class="strip__title" data-name="Sit">Review</h1>
            <div class="strip__inner-text">

                <div id="overall_exams_review">
                    <div class="row">
                        <div class="col-lg-2"><h2>Search</h2></div>
                        <div class="col-lg-1"></div>
                        <div align="center" class="col-lg-9"><h2>Exam Reviews</h2></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2" id="options_review">

                        </div>
                        <div class="col-lg-1">

                        </div>
                        <div class="col-lg-9" id="table_for_review" style="height:500px;overflow-y: auto">

                        </div>
                    </div>
                </div>
                <div id="attempted_test_review" hidden class="row">

                </div>    




            </div>
        </div>
    </article>
    <article class="strips__strip">
        <div class="strip__content">
            <h1 class="strip__title" data-name="Amet">Settings</h1>
            <div class="strip__inner-text">
                <div id="settings" class="col-lg-12">

                </div>   
            </div>
    </article>
    <p onCLick="fixer()">
        <i class="mdi-content-clear strip__close" ></i></p>
</section>
<?php
include './includes/jsheaders.inc.php';
?>


<script>
    function fixer()
    {

        alertify.success("State has been saved for your convinience");
        $('#listofavailableexams').hide();
        $('#refreshexam').show();
        $('#table_for_review').html("Kindly hit the search button to Obtain Latest Results");



    }

    var gid;
    var pid;
    $(document).ready(function () {

        $.material.init();
        $.material.ripples();
//********************************************************
        loadReviewSearch();
        //loadTableForReview();
        $('#table_for_review').html("Kindly hit the refresh button to Obtain Latest Results");
        loadSettings();

//********************************************************
        $('#parent_div_of_groups').delay(500).fadeIn(500);
        LOAD_PAGE(); //Groups starter
        $('#supervisor_home').delay(500).fadeIn(500);
        $('#parent_div_of_schedule').delay(500).fadeIn(500);
        LoadUpdate_Schedule_List();
        $('#parent_div_of_schedule').delay(500).fadeIn(500);
        $('#refreshexam').hide();
        $('#parent_div_of_exams').delay(500).fadeIn(500);

        $('#home_groups').click(function () {

            hideAll();
            $('#parent_div_of_groups').delay(500).fadeIn(500);
            LOAD_PAGE(); //Groups starter
        });
        $('#home_home').click(function () {

            hideAll();
            $('#supervisor_home').delay(500).fadeIn(500);
            LOAD_PAGE();//Groups starter
        });
        $('#home_schedule').click(function () {

            hideAll();
            $('#parent_div_of_schedule').delay(500).fadeIn(500);
            LoadUpdate_Schedule_List();
        });
        $('#home_exams').click(function () {
            hideAll();
            loadExamList();
            //alert("LoadExamList");
            LoadUpdate_Schedule_List();
            $('#refreshexam').hide();
            $('#parent_div_of_exams').delay(500).fadeIn(500);
        });


        $('#l').hide();
        $('#c').hide();
        $('#individual-group').hide();
        LOAD_PAGE();
        loadExamList();
        LoadUpdate_Schedule_List();
        $('#listofavailableexams').hide();
        $('#refreshexam').show();



        $('#refreshexam').click(function () {
            $('#listofavailableexams').show();
            $('#refreshexam').hide();
            alertify.success("refreshing list of exams");
        });

        $(function () {
            $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker({
                useCurrent: false //Important! See issue #1075
            });
            $("#datetimepicker6").on("dp.change", function (e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker7").on("dp.change", function (e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        });
        $('#increase_minutes').click(function () {
            ds = $('#duration_minutes').val();
            if (!isNaN)
            {
            }
            else if (parseInt(ds) <= 60)
            {
                ds = parseInt(ds) + 10;
                $('#duration_minutes').val(ds);
            }
        });
        $('#decrease_minutes').click(function () {
            ds = $('#duration_minutes').val();
            if (!isNaN)
            {
            }
            else if (parseInt(ds) - 10 >= 0)
            {
                ds = parseInt(ds) - 10;
                $('#duration_minutes').val(ds);
            }
        });
        $('#increase_hours').click(function () {
            //alert("decrease hours");
            ds = $('#duration_hours').val();
            if (!isNaN)
            {
            }
            else if (parseInt(ds) < 50)
            {
                ds = parseInt(ds) + 1;
                $('#duration_hours').val(ds);
            }
        });
        $('#decrease_hours').click(function () {
            //alert("decrease hours");
            ds = $('#duration_hours').val();
            //alert("ds=" + ds);
            if (!isNaN)
            {
            }
            else if (parseInt(ds) - 1 >= 0)
            {

                ds = parseInt(ds) - 1;
                //alert("ds" + ds);
                $('#duration_hours').val(ds);
                //alert("done");
            }
        });

        $('#schedule_group').change(function () {

            $('#selectedGroupSchedule').hide();
            gid = $('#schedule_group').val();
            $.ajax({
                url: "functions/supervisor/load_group_schedule.php",
                type: "post",
                data: {'gid': gid},
                success: function (data)
                {
                    $('#selectedGroupSchedule').html(data);
                    $('#selectedGroupSchedule').delay(500).fadeIn(500);
                }
            });
        });


        function loadSettings()
        {
            $.ajax({
                url: "functions/supervisor/Settings/load_view.php",
                type: "post",
                data: {'gid': gid},
                success: function (data)
                {
                    $('#settings').html(data);
                }
            });
        }
        //<div id="user_list_review">




        function hideAll()
        {
            //alert("hide all");
            $('#supervisor_home').fadeOut(500);
            $('#parent_div_of_groups').fadeOut(500);
            $('#parent_div_of_schedule').fadeOut(500);
            $('#parent_div_of_exams').fadeOut(500);
        }

        $('#onClickCreateScheduleButton').click(function () {

            alertify.success("When you select a group, we will load the current schedule for that group :)");
            $('#view_delete_schedule').fadeOut(500);
            $('#create_schedule_form').delay(500).fadeIn(500);
            //$('#schedule_group').change();
            //$('#create_schedule_form').delay(500).fadeIn(500);
        });

        $('#cancel_this_schedule').click(function ()
        {
            //$('#create_schedule_form').fadeOut(500);
            alertify.success("Moving you back to the home page for Scheduling.");
            $('#create_schedule_form').fadeOut(500);
            $('#selectedGroupSchedule').fadeOut("500");
            $('#view_delete_schedule').delay(500).fadeIn(500);
            $('#selectedGroupSchedule').empty();
        });



    });

    ///////////////???************************************** Exam Creating Scenes ///////////////////////////////////////
    function onClickExamItem(examid, userid)
    {
        //alert("why");
        alertify.success("Loading Selected Exams information");
        $('#overall-exams').fadeOut(500);
        $.ajax({
            url: "functions/supervisor/edit_exam.php",
            type: "post",
            data: {'examid': examid, 'creatorid': userid},
            success: function (data)
            {
                $('#overall-exams').fadeOut(500);
                $('#edit_exam_paper').html(data);
                //loadQuestionNamesEdit(examid);
            }
        });

        $('#edit_exam_paper').delay(500).fadeIn(500);
    }
    function loadExamList()
    {
        //alert("calling create exam question");
        $.ajax({
            url: "functions/supervisor/getExamList.php",
            type: "post",
            success: function (data)
            {
                //alert(data);
                $('#listofavailableexams').html(data);
            }
        });
        $('#listofavailableexams').show();

    }
    function cancelCreateExam()
    {
        alertify.success("Canceling your request to create an Exam");
        $('#createtheexam').fadeOut(500);
        $('#overall-exams').delay(500).fadeIn(500);
        $('#empty-space').show();
        alertify.success("Canceling request successfuly implemented");
    }
    function startCreateExam()
    {
        alertify.success("Process for creating an Exam has been initiated");
        $('#empty-space').fadeIn();
        $('#overall-exams').fadeOut(500);
        $('#createtheexam').delay(500).fadeIn(500);
        $('#displayquestionsofexam').hide();
        $('#answer_f').hide();
    }
    function startDeleteExam()
    {

        alertify.success("Process for deleting an Exam has been initiated");
        $.ajax({
            url: "functions/supervisor/delete_exam_paper.php",
            type: "post",
            //data: {},
            success: function (data)
            {
                $('#delete_exam').html(data);
                $('#create_delete_exams').fadeOut(500);
                $('#delete_exam').delay(500).fadeIn(500);
            }
        });

        alertify.success("Kindly note that if an Exam is associated with a Schedule, it cannot be deleted, as we are maintaining records");

    }
    function insertExamDetails()
    {
        var status = 0;
        var en = $('#examName').val();
        if (en == '')
        {
            $('#rexamName').html("Exam Name Cannot be Empty");
            status = 1;
        }
        else
        {
            $('#rexamName').html("");
        }
        var ed = $('#examDescription').val();
        if (ed == '')
        {
            $('#rexamDescription').html("Exam Description Cannot be Empty");
            status = 1;
        }
        else
        {
            $('#rexamDescription').html("");
        }
        if (status == 0)
        {
            //alert("calling create exam paper");
            $.ajax({
                url: "functions/supervisor/create_exam_paper.php",
                type: "post",
                data: {'en': en, 'ed': ed},
                success: function (data)
                {
                    if (data == "false")
                    {
                        alertify.error("Test could not be created");
                    }
                    else
                    {

                        updateExamsSchedule();

                        alertify.success("Test Created Successfully");
                        $.ajax({
                            url: "functions/supervisor/create_exam_questions.php",
                            type: "post",
                            data: {'q': data},
                            success: function (data2)
                            {
                                //alert(data2);
                                $('#displayquestionsofexam').fadeIn(500);
                                $('#examDescriptionOverall').fadeOut(500);
                                $('#empty-space').fadeOut(500);
                                $('#btncreateexam').fadeOut(500);
                                $('#btncalcelexam').fadeOut(500);
                                //$('#addquestionstoexam').hide();
                                $('#addquestionstoexam').html(data2);
                                $('#addquestionstoexam').delay(500).fadeIn(500);
                                //$('#examName').attr("readonly", "readonly");
                                loadExamList();
                            }
                        });
                        //alert("called successfully")
                    }

                }
            });
        }
        LoadUpdate_Schedule_List();
    }

    ///////////////???************************************** Exam Creating Scenes ///////////////////////////////////////

    function startDeleteSchedule()
    {
        alertify.success("Process for deleting a Schedule has been initiated");
        $.ajax({
            url: "functions/supervisor/delete_schedule.php",
            type: "post",
            //data: {},
            success: function (data)
            {

                $('#create_delete_schedules_buttons').fadeOut(500);
                $('#delete_schedules_view').html(data);
                $('#delete_schedules_view').delay(500).fadeIn(500);

            }
        });
        alertify.success("Kindly note that if a Schedule has already occured, deleting is not permitted for maintaining records");
    }




    function schedule_the_test()
    {
        s_g = $('#schedule_group').val();
        s_q_p = $('#schedule_question_paper').val();
        s_s_d = $('#schedule_start_date').val();
        s_e_d = $('#schedule_end_date').val();
        d_h = $('#duration_hours').val();
        d_m = $('#duration_minutes').val();
        error = 0;
        if (isNaN(d_h))
        {
            error = 1;
            $('#rdh').html('must be a number');
        }
        else
        {
            $('#rdh').html('');
        }
        if (isNaN(d_h))
        {
            error = 1;
            $('#rdm').html('must be a number');
        }
        else
        {
            $('#rdm').html('');
        }
        if (s_s_d == '')
        {
            error = 1;
            $('#rs_s_d').html('please provide a start date time');
        }
        else
        {
            //alert(s_s_d)
//            var s_d = "";
//            s_d = s_d + s_s_d.substring(6, 10) + "-";
//            s_d = s_d + s_s_d.substring(0, 2) + "-";
//            s_d = s_d + s_s_d.substring(3, 5) + " ";
//            s_d = s_d + s_s_d.substring(11,15) ;
//            //s_s_d.substring(16,18)

            //alert(s_d)
            $('#rs_s_d').html('');
        }
        if (s_e_d == '')
        {
            error = 1;
            $('#rs_s_e').html('please provide a end date time');
        }
        else
        {
//            var e_d = "";
//            e_d = e_d + s_e_d.substring(6, 10) + "-";
//            e_d = e_d + s_e_d.substring(0, 2) + "-";
//            e_d = e_d + s_e_d.substring(3, 5);
            $('#rs_s_e').html('');
        }
        if (s_q_p == 0)
        {
            error = 1;
            $('#rs_q_p').html('please provide a valid question paper');
        }
        else
        {
            $('#rs_q_p').html('');
        }
        if (s_g == 0)
        {
            error = 1;
            $('#rs_g').html('please provide a valid group');
        }
        else
        {
            $('#rs_g').html('');
        }
        if (error == 0)
        {
            //alert(s_g + ":" + s_q_p + ":" + s_s_d + ":")
            $.ajax({
                url: "functions/supervisor/create_schedule.php",
                type: "post",
                async:false,
                        data: {'s_g': s_g, 's_q_p': s_q_p, 's_s_d': s_s_d, 's_e_d': s_e_d, 'd_h': d_h, 'd_m': d_m},
                success: function (data)
                {
//                    $('#schedule_group').val("");
//                    $('#schedule_question_paper').val("");
                    $('#schedule_start_date').val("");
                    $('#schedule_end_date').val("");
                    $('#duration_hours').val("1");
                    $('#duration_minutes').val("0");

                    alertify.success("Schedule Created Successfully");
                    //alert(data);
                    //$('#rschedule_the_test').html(data);
                    $('#create_schedule_form').fadeOut(500);
                    $('#selectedGroupSchedule').fadeOut(500);
                    $('#view_delete_schedule').fadeIn(500);
                    $('#datetimepicker6').data("DateTimePicker").maxDate(new Date(2023, 1, 18));
                    //$('#selectedGroupSchedule').fadeOut(500);
                    if(data!=0)
                    {
                        $.ajax({
                            url: "mailsender.php",
                            type: "post",
                            data: {'sid':data},
                            success: function (data2)
                            {
                            }
                        });
                        LoadUpdate_Schedule_List();
                    }
                }
            });
        }
        else
        {
            alertify.error("We detect invalid or empty data, kindly check and try again, Thank you!");
        }
    }
    function goBack()
    {
        $('#individual-group').fadeOut(500);
        //$('#overall-group').delay(500).slideDown(500);
        $('#overall-group').delay(500).fadeIn(500);
        //alert('click');
        //$('#goback').delay(1000).submit();
    }
    function LOAD_PAGE()
    {
        $('#parent_div_of_groups').fadeIn(500);
        $.ajax({
            url: "functions/supervisor/on_load.php",
            type: "post",
            //data: {'uid':,'rid':},
            success: function (data)
            {
                $('#l').html(data);
                $('#l').slideDown(500);
            }
        });
        $.ajax({
            url: "functions/supervisor/create_groups.php",
            type: "post",
            //data: {'uid':,'rid':},
            success: function (data)
            {
                $('#c').html(data);
                $('#group_description').hide();
                $('#group_name').hide();
                $('#dgroup_name').hide();
                $('#c').slideDown(1000);
            }
        });
    }
    function LoadUpdate_Schedule_List()
    {
        $.ajax({
            url: "functions/supervisor/load_all_schedule.php",
            type: "post",
            //data: {'uid':,'rid':},
            success: function (data)
            {
                $('#complete_schedule').html(data);
            }
        });

    }
    function startDeleteGroup()
    {
        alertify.success("If a has been associated with a schedule, it cannot be deleted as will be maintaining the records");
        $('#cgbtn').fadeOut(500);
        $('#dgroup_name').delay(500).fadeIn(500);
    }
    function startCreateGroup()
    {
        alertify.success("Initiating process for creating a group");

        $('#cgbtn').fadeOut(500);
        $('#group_name').delay(500).fadeIn(500);
    }
    function cancelButton()
    {
        $('#group_name').fadeOut(500);
        $('#group_description').fadeOut(500);
        $('#dgroup_name').fadeOut(500);
        $('#cgbtn').delay(500).fadeIn(500);
    }
    function backcreateButton()
    {
        $('#group_description').fadeOut(500);
        $('#group_name').delay(500).fadeIn(500);
    }
    function nextCreateGroup()
    {
        gn = $("#gn").val();
        if (gn == '')
        {
            $("#rgn").html("Group Name cannot be Empty");
        }
        else
        {
            $("#rgn").html("");
            $('#group_name').fadeOut(500);
            $('#group_description').delay(500).fadeIn(500);
        }
    }
    function createGroup()
    {
        gn = $("#gn").val();
        gd = $("#gd").val();
        //alert(gd.trim);
        pg = $("#parent_group").val();
        if (gd.trim == '')
        {
            $("#rgd").html("Group Description Cannot be Empty");
        }
        else
        {
            $("#rgd").html("");
            $.ajax({
                url: "functions/supervisor/create_groups.php",
                type: "post",
                async: false,
                data: {'gn': gn, 'gd': gd, 'pg': pg},
                success: function (data)
                {
                    updateGroupsSchedule();

                    alertify.success("Group has been Created Successfully!!");
                    $('#cgbtn').show(100);
                    $('#group_description').hide();
                    $('#group_name').hide();
                    LOAD_PAGE();
                }
            });

            $.ajax({
                url: "functions/supervisor/Review/update_group_dropdown.php",
                type: "post",
                success: function (data)
                {
                    $('#group_list_review').html(data);
                }
            });


        }

    }
    function deleteGroup()
    {
        delete_group_id = $("#delete_group_list").val();
        if (delete_group_id == 0)
        {
            $('rdeletegroup').html("Please select a Group to Delete");
        }
        else
        {
            $.ajax({
                url: "functions/supervisor/create_groups.php",
                type: "post",
                data: {'gid': delete_group_id, 'delete': 'true'},
                success: function (data)
                {
                    if (data == "true")
                    {
                        alertify.success("Group has been deleted Successfuly");
                        $('#cgbtn').show(100);
                        $('#dgroup_name').hide();
                        LOAD_PAGE();
                    }
                    else
                    {
                        alertify.error(data);
                    }
                }
            });
        }
    }


    function onClickGroupItem(id, pidd)
    {
        //alert(id);
        $('#overall-group').fadeOut(500);
        //alert(id+" "+pid);
        alertify.success("Loading complete group information");
        gid = id;
        pid = pidd;
        $.ajax({
            url: "functions/supervisor/get_group_information.php",
            type: "post",
            data: {'gid': id, 'pid': pid},
            success: function (data)
            {
                //$('#overall-group').fadeOut(1000);
                $('#group-information').html(data);
            }
        });
        $.ajax({
            url: "functions/supervisor/get_all_applicants.php",
            type: "post",
            data: {'gid': id, 'pid': pid},
            success: function (data)
            {
                //$('#overall-group').fadeOut(1000);
                $('#all-applicants').html(data);
            }
        });
        $.ajax({
            url: "functions/supervisor/get_group_members.php",
            type: "post",
            data: {'gid': id, 'pid': pid},
            success: function (data)
            {
                //$('#overall-group').fadeOut(1000);
                $('#in-group').html(data);
            }
        });
        $('#individual-group').delay(500).fadeIn(500);
    }

    function shift_members()
    {
        //alert($('.addkaro:checked').val());
        var checkedValue = null;
        var inputElements = document.getElementsByClassName('addkaro');
        for (var i = 0; inputElements[i]; ++i) {
            if (inputElements[i].checked) {
                checkedValue = inputElements[i].value;
                //alert(checkedValue);
                $.ajax({
                    url: "functions/supervisor/shift_members.php",
                    type: "post",
                    data: {'gid': gid, 'memberid': checkedValue, 'add': 'true'},
                    async: false,
                    success: function (data)
                    {

                        alertify.success(data);
                        //alert(checkedValue);                        
                        //alert(data);
                        //$('#overall-group').fadeOut(1000);
                        //$('#in-group').html(data);
                    }
                });
            }
            //alert("all Transfers Complete");

        }
        var inputElements = document.getElementsByClassName('removekaro');
        for (var i = 0; inputElements[i]; ++i) {
            if (inputElements[i].checked) {
                checkedValue = inputElements[i].value;
                //alert(checkedValue);
                $.ajax({
                    url: "functions/supervisor/shift_members.php",
                    type: "post",
                    data: {'gid': gid, 'pid': pid, 'memberid': checkedValue, 'remove': 'true'},
                    async: false,
                    success: function (data)
                    {

                        alertify.success(data);
                        //alert(checkedValue);                        
                        //alert(data);
                        //$('#overall-group').fadeOut(1000);
                        //$('#in-group').html(data);
                    }
                });
            }
            //alert("all Transfers Complete");

        }
        afterShifting(gid, pid);
        alertify.success("Member List has been updated");
    }


    function afterShifting(gid, pid)
    {
        $.ajax({
            url: "functions/supervisor/get_all_applicants.php",
            type: "post",
            data: {'gid': gid, 'pid': pid},
            success: function (data)
            {
                //$('#overall-group').fadeOut(1000);
                //alert("reached here");
                //$('#all-applicants').fadeOut(500).delay(500);    
                $('#all-applicants').html(data);
                //$('#all-applicants').fadeIn(500);
            }
        });
        $.ajax({
            url: "functions/supervisor/get_group_members.php",
            type: "post",
            data: {'gid': gid, 'pid': pid},
            success: function (data)
            {
                //$('#overall-group').fadeOut(1000);
                //alert("reached here also");
                //$('#in-group').fadeOut(500).delay(500);
                $('#in-group').html(data);
                //$('#in-group').fadeIn(data);
            }
        });
    }

//updaing Scheduling scenes
    function updateGroupsSchedule()
    {
        $.ajax({
            url: "functions/supervisor/ScheduleQuestionPaper/groups_dropdown.php",
            type: "post",
            success: function (data)
            {
                //$('#overall-group').fadeOut(1000);
                //alert("reached here also");
                //$('#in-group').fadeOut(500).delay(500);
                $('#ddgroups').html(data);
                //$('#in-group').fadeIn(data);
            }
        });
    }
    function updateExamsSchedule()
    {
        $.ajax({
            url: "functions/supervisor/ScheduleQuestionPaper/question_paper_dropdown.php",
            type: "post",
            success: function (data)
            {
                //$('#overall-group').fadeOut(1000);
                //alert("reached here also");
                //$('#in-group').fadeOut(500).delay(500);
                $('#ddquestion_paper').html(data);
                //$('#in-group').fadeIn(data);
            }
        });
    }

//////////////////////////////////////////////////////////////////////////////////////// For Review    
    function loadReviewSearch()
    {
        $.ajax({
            url: "functions/supervisor/Review/load_search_area.php",
            type: "post",
            async: false,
            success: function (data)
            {
                $('#options_review').html(data);
            }
        });
    }
    function loadTableForReview()
    {
        var uid = $('#review_user_id').val();
        var gid = $('#review_group_id').val();
        $.ajax({
            url: "functions/supervisor/Review/get_table_review.php",
            type: "post",
            data: {'uid': uid, 'gid': gid},
            success: function (data)
            {
                $('#table_for_review').html(data);
            }
        });
    }
    function backFromExamReview()
    {
        $("#attempted_test_review").fadeOut(500);
        $("#overall_exams_review").delay(500).fadeIn(500);
    }
    function onReviewItemSelect(qid, sid, uid)
    {
        $("#overall_exams_review").fadeOut(500);
        $.ajax({
            url: "functions/supervisor/Review/get_exam_for_review.php",
            type: "post",
            data: {'qid': qid, 'sid': sid, 'uid': uid},
            success: function (data)
            {
                $('#attempted_test_review').html(data);
            }
        });
        $("#attempted_test_review").delay(500).fadeIn(500);
    }


    //<div id="user_list_review">




    ///////////////////////////////////////////////////

    var Expand = (function () {
        var tile = $('.strips__strip');
        var tileLink = $('.strips__strip > .strip__content');
        var tileText = tileLink.find('.strip__inner-text');
        var stripClose = $('.strip__close');

        var expanded = false;

        var open = function () {

            var tile = $(this).parent();

            if (!expanded) {
                tile.addClass('strips__strip--expanded');
                // add delay to inner text
                tileText.css('transition', 'all .6s 1s cubic-bezier(0.23, 1, 0.32, 1)');
                stripClose.addClass('strip__close--show');
                stripClose.css('transition', 'all .6s 1s cubic-bezier(0.23, 1, 0.32, 1)');
                expanded = true;
            }
        };

        var close = function () {
            if (expanded) {
                tile.removeClass('strips__strip--expanded');
                // remove delay from inner text
                tileText.css('transition', 'all 0.15s 0 cubic-bezier(0.23, 1, 0.32, 1)');
                stripClose.removeClass('strip__close--show');
                stripClose.css('transition', 'all 0.2s 0s cubic-bezier(0.23, 1, 0.32, 1)')
                expanded = false;
            }
        }

        var bindActions = function () {
            tileLink.on('click', open);
            stripClose.on('click', close);
        };

        var init = function () {
            bindActions();
        };

        return {
            init: init
        };

    }());

    Expand.init();
</script>


