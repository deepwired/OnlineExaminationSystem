<?php
include './includes/database_connect.inc.php';
include './includes/cssheaders.inc.php';
include './includes/sup_navbar.inc.php';

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


<body class="background">

    <div id="supervisor_home">    
        <h1>Welcome to your Home Page Bro!!</h1>
    </div>

    <div id="parent_div_of_schedule" class=''>    
        <br>
        <div id="view_delete_schedule" class="container" align="center">
            <div id="rschedule_the_test" ></div>
            <h1><i class="fa fa-calendar-o"></i>Schedule</h1>
            <div id='all_current_schedules' class="col-lg-5">
                <br>
                <div align="center"><h1>Current Schedule</h1></div>
                Entire Schedule List should be loaded here
            </div>
            <div class="col-lg-2"></div>
            <div id='create_delete_schedules' class="col-lg-5">
                <div id='create_delete_schedules_buttons' align="center"><br>
                    <div align="center"><h1>Options</h1>    
                        <div style="height:400px;" align='center' style="height:400px;overflow-y: auto;">
                            <br><br><br><br>
                            <button id='onClickCreateScheduleButton' class='btn btn-lg btn-default'><i class="fa fa-plus-circle"></i> Create Schedule</button>
                            <br><br><br>
                            <button id='onClickDeleteScheduleButton' class='btn btn-lg btn-default'><i class="fa fa-minus-circle"></i> Delete Schedule</button>                        
                            <br><br>

                        </div>
                    </div>
                </div>
                <div id='delete_schedules_view'>
                </div>
            </div>
        </div>

        <div id="create_schedule_form" hidden class="col-lg-12 well" >
<div class="col-lg-11">
    
</div>
<div class="col-lg-1" align="right">
    <div class="btn btn-default" id="cancel_this_schedule">
    <i class="mdi-content-clear"></i>
    </div>
</div>
                <div class="col-lg-6" align="center">
                    <?php
                    $stmt2 = $con->prepare("select id,name from question_paper");
                    $stmt2->execute();
                    $stmt2->store_result();
                    if ($stmt2->num_rows > 0) {
                        ?>
                        <i class="fa fa-file-text"></i><select class="btn btn-default  dropdown-toggle" id="schedule_question_paper">
                            <option value="0">Select a Question Paper</option>
                            <?php
                            $stmt2->bind_result($id, $name);
                            while ($stmt2->fetch()) {
                                echo "<option value='$id'>".substr($name,0,15)."</option>";
                            }
                            echo "</select>";
                            $stmt2->close();
                        } else {
                            ?>
                            <select class="btn btn-default dropdown-toggle" id="schedule_question_paper">
                                <option value="0">Kindly Create a Question Paper First</option>
                            </select>
                            <?php
                        }
                        ?>

                        <div class='error-text' id='rs_q_p'></div>
                </div>
                <!--date time picker -->
                <div class="col-lg-6" align="center">
                    <?php
                    $stmt2 = $con->prepare("select id,name from groups");
                    $stmt2->execute();
                    $stmt2->store_result();
                    if ($stmt2->num_rows > 0) {
                        ?>
                        <i class="fa fa-group"></i><select class="btn btn-default dropdown-toggle" id="schedule_group">
                            <option value="0">Select a Group</option>
                            <?php
                            $stmt2->bind_result($id, $name);
                            while ($stmt2->fetch()) {
                                echo "<option value='$id'>".substr($name,0,15)."</option>";
                            }
                            echo "</select>";
                            $stmt2->close();
                        } else {
                            ?>
                            <select class="btn btn-default dropdown-toggle" id="schedule_group">
                                <option value="0">Kindly Create a Question Paper First</option>
                            </select>
                            <?php
                        }
                        ?>

                        <div class='error-text' id='rs_g'></div>

                </div>
                <br>
                <div class="col-lg-6" align="center">
                    Start Date <div class="form-group">
                        <div class='input-group date'  id='datetimepicker6'>
                            <input type='text' onkeydown="return false" id='schedule_start_date' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class='error-text' id='rs_s_d'></div> 
                </div>
                <br>
                <div class="col-lg-6" align="center">
                    End Date <div class="form-group">
                        <div class='input-group date'  id='datetimepicker7'>
                            <input type='text' onkeydown="return false" id="schedule_end_date" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class='error-text' id='rs_s_e'></div>
                </div>

                <div align="center">

                    <br>
                    <div class="col-lg-6">
                    <i class="fa fa-2x fa-clock-o"></i><br>
                    Hours:<div class="input-group number-spinner">
                        <span class="input-group-btn data-dwn">
                            <button class="btn btn-default  " id='decrease_hours' data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                        </span>
                        <input class="form-control text-center" value="1" id='duration_hours' type="text">
                        <span class="input-group-btn data-up">
                            <button  class="btn btn-default  " id='increase_hours' data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                        </span>
                            </div>
                    <div class='error-text' id='rdh'></div>
                    </div>
                    <div class="col-lg-6">
                    Minutes:<br><div class="input-group number-spinner">
                        <span class="input-group-btn data-dwn">
                            <button class="btn btn-default " id='decrease_minutes' ><span class="glyphicon glyphicon-minus"></span></button>
                        </span>
                        <input class="form-control text-center" value="0" id='duration_minutes' type="text">
                        <span class="input-group-btn data-up">
                            <button  class="btn btn-default " id='increase_minutes'><span class="glyphicon glyphicon-plus"></span></button>
                        </span>
                    </div>
                    <div class='error-text' id='rdm'></div>
                    </div>
                    <br><br>
                    <button onClick="schedule_the_test()" class="btn btn-lg btn-warning"> Schedule The Test </button>
                </div>            
        </div> 
        <div id='selectedGroupSchedule'class="col-lg-12" style="height:550px;overflow-y: auto;">


        </div>
    </div>

    <!--End of this Shit -->
</div>
<br>
<!--end date time picker -->
<div class="col-lg-4"></div>

</div>






<div id="parent_div_of_groups" class="container">    
    <div align="center"><h1><i class="fa fa-gears"></i>Groups</h1></div>
    <br>
    <div id="overall-group" class="">
        <div class="row">
            <div class='col-lg-5' align="center"><h1>Available Groups</h1>
                <div id='l' style="height:400px;overflow-y: auto;"></div>
            </div>
            <div class='col-lg-2'>&nbsp;</div>    
            <div class='col-lg-5' align="center"><h1>Options</h1>    
                <div id="c"  style="height:400px;" align='center' style="height:400px;overflow-y: auto;"></div>
            </div>
        </div>    
    </div>

    <!-- Second Pard of Page -->

    <div id="individual-group" class="container">

        <div class="col-lg-4" id="group-information">
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
<div id="parent_div_of_exams" class="container">    


    <div id="overall-exams">
        <div  align="center"><h1><i class="fa fa-pagelines"></i>Exams</h1></div>
        <br>

        <div class="row">
            <div class='col-lg-5' align="center"><h1>Available Exams</h1>
                <div id='listofavailableexams' style="height:400px;overflow-y: auto;"></div>
            </div>
            <div class='col-lg-2'>&nbsp;</div>    
            <div class='col-lg-5' align="center"><h1>Options</h1>    

                <br><br><br><br>
                <button class="btn btn-lg btn-default" onClick="startCreateExam()"><i class="fa fa-plus-circle"></i> Create an Exam </button>
                <br><br>
                <button class="btn btn-lg btn-default" onClick="startDeleteExam()"><i class="fa fa-minus-circle"></i> Delete an Exam </button>                
            </div>
        </div>    
    </div>
    <div id="createtheexam" class="col-lg-12" hidden >

        <div class="col-lg-4">

        </div>
        <div class="col-lg-4" align="center"><input type="text" class="form-control" id="examName" placeholder="Enter Exam Name">
            <span class="error-text" id="rexamName"></span>
            <br><br>
            <div id="examDescriptionOverall" class="form-control-wrapper">
                <textarea  id="examDescription" class="form-control empty">
                </textarea>
                <div class="floating-label">
                    Enter Exam Description
                </div>
                <span class="material-input"></span>
            </div>
            <span class="error-text" id="rexamDescription"></span>

            <button class="btn btn-lg btn-default" id="btncreateexam" onClick="insertExamDetails()">Confirm Create Exam</button>   

        </div>
        <div class="col-lg-4"></div>

        <div class="col-lg-12" id="portaladdquestionstoexam">
            <div class="col-lg-3" id="displayquestionsofexam">
                Question List for this Paper
                <div id="listofquestions" class="list-group">

                </div>


            </div>
            <div class="col-lg-6" align="center" id="addquestionstoexam"></div>
            <div class="col-lg-3" id="lol"></div>
        </div>
    </div>

    <div id="deletetheexam">

    </div>
    <div id="invidualexam">

    </div>
</div>    
<?php
include './includes/jsheaders.inc.php';
?>

<script>


    var gid;
    var pid;
    $(document).ready(function () {
        $.material.init();
        $.material.ripples();
        $('#l').hide();
        $('#c').hide();
        $('#individual-group').hide();
        $('#parent_div_of_schedule').hide();
        $('#parent_div_of_exams').hide();
        $('#parent_div_of_groups').hide();
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
            ds = $('#duration_hours').val();
            if (!isNaN)
            {
            }
            else if (parseInt(ds) - 1 >= 0)
            {
                ds = parseInt(ds) - 1;
                $('#duration_hours').val(ds);
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
        function hideAll()
        {
            //alert("hide all");
            $('#supervisor_home').fadeOut(500);
            $('#parent_div_of_groups').fadeOut(500);
            $('#parent_div_of_schedule').fadeOut(500);
            $('#parent_div_of_exams').fadeOut(500);
        }


        $('#home_groups').click(function () {

            hideAll();
            $('#parent_div_of_groups').delay(500).fadeIn(500);
            LOAD_PAGE(); //Groups starter
        });
        $('#home_home').click(function () {

            hideAll();
            $('#supervisor_home').delay(500).fadeIn(500);
            //LOAD_PAGE();//Groups starter
        });
        $('#home_schedule').click(function () {

            hideAll();
            $('#parent_div_of_schedule').delay(500).fadeIn(500);
        });
        $('#home_exams').click(function () {

            hideAll();
            loadExamList();
            $('#parent_div_of_exams').delay(500).fadeIn(500);
        });

        $('#onClickCreateScheduleButton').click(function () {

            $('#view_delete_schedule').fadeOut(500);
            $('#create_schedule_form').delay(500).toggle("slide");
            $('#schedule_group').change(); 
            //$('#create_schedule_form').delay(500).fadeIn(500);
        });

        $('#cancel_this_schedule').click(function ()
        {
            //$('#create_schedule_form').fadeOut(500);
            $('#create_schedule_form').toggle("slide");
            $('#selectedGroupSchedule').toggle("slide");
            $('#view_delete_schedule').delay(500).fadeIn(500);
            $('#selectedGroupSchedule').empty();
        });


    });

    ///////////////???************************************** Exam Creating Scenes ///////////////////////////////////////
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

    }
    function startCreateExam()
    {
        $('#overall-exams').fadeOut(500);
        $('#createtheexam').delay(500).fadeIn(500);
        $('#displayquestionsofexam').hide();
        $('#answer_f').hide();
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
                        alert("test could not be created");
                    }
                    else
                    {
                        alert("calling create exam question");
                        $.ajax({
                            url: "functions/supervisor/create_exam_questions.php",
                            type: "post",
                            data: {'q': data},
                            success: function (data2)
                            {
                                //alert(data2);
                                $('#displayquestionsofexam').fadeIn(500);
                                $('#examDescriptionOverall').fadeOut(500);
                                $('#btncreateexam').fadeOut(500);
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
    }

    ///////////////???************************************** Exam Creating Scenes ///////////////////////////////////////
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
            var s_d = "";
            s_d = s_d + s_s_d.substring(6, 10) + "-";
            s_d = s_d + s_s_d.substring(0, 2) + "-";
            s_d = s_d + s_s_d.substring(3, 5);

            alert(s_d)
            $('#rs_s_d').html('');
        }
        if (s_e_d == '')
        {
            error = 1;
            $('#rs_s_e').html('please provide a end date time');
        }
        else
        {
            var e_d = "";
            e_d = e_d + s_e_d.substring(6, 10) + "-";
            e_d = e_d + s_e_d.substring(0, 2) + "-";
            e_d = e_d + s_e_d.substring(3, 5);
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
            $.ajax({
                url: "functions/supervisor/create_schedule.php",
                type: "post",
                data: {'s_g': s_g, 's_q_p': s_q_p, 's_s_d': s_d, 's_e_d': e_d, 'd_h': d_h, 'd_m': d_m},
                success: function (data)
                {
                    $('#schedule_group').val("");
                    $('#schedule_question_paper').val("");
                    $('#schedule_start_date').val("");
                    $('#schedule_end_date').val("");
                    $('#duration_hours').val("1");
                    $('#duration_minutes').val("0");
                    //alert(data);
                    $('#rschedule_the_test').html(data);
                    $('#create_schedule_form').fadeOut(500);
                    $('#selectedGroupSchedule').fadeOut(500);
                    $('#view_delete_schedule').fadeIn(500);
                    //$('#selectedGroupSchedule').fadeOut(500);
                }
            });
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
                $('#l').slideDown(1000);
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
    function startDeleteGroup()
    {
        $('#cgbtn').fadeOut(500);
        $('#dgroup_name').delay(500).fadeIn(500);
    }
    function startCreateGroup()
    {



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
        alert(gd.trim);
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
                data: {'gn': gn, 'gd': gd, 'pg': pg},
                success: function (data)
                {
                    if (data == "true")
                    {
                        swal("Group Created Successfully!", "Well Done !", "success");
                        $('#cgbtn').show(100);
                        $('#group_description').hide();
                        $('#group_name').hide();
                        LOAD_PAGE();
                    }
                    else
                    {
                        swal(data);
                    }
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
                        swal("Group Deleted Successfully!", "Well Done !", "success");
                        $('#cgbtn').show(100);
                        $('#dgroup_name').hide();
                        LOAD_PAGE();
                    }
                    else
                    {
                        swal(data);
                    }
                }
            });
        }
    }


    function onClickGroupItem(id, pidd)
    {
        //alert(id);
        $('#overall-group').fadeOut(1000);
        //alert(id+" "+pid);
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
        $('#individual-group').delay(1000).slideDown(1000);
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
                        //alert(checkedValue);                        
                        //alert(data);
                        //$('#overall-group').fadeOut(1000);
                        //$('#in-group').html(data);
                    }
                });
            }
            //alert("all Transfers Complete");

        }
        alert("shifting done as such");
        afterShifting(gid, pid);
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


    //////////////////////////////////////////
    //
    //    $.ajax({
    //                url: "functions/supervisor/get_all_applicants.php",
    //                type: "post",
    //                data: {'gid': id},
    //                success: function (data)
    //                {
    //                    //$('#overall-group').fadeOut(1000);
    //                    
    //                    $('#all-applicants').fadeOut(500).delay(500);    
    //                    $('#all-applicants').html(data);
    //                    $('#all-applicants').fadeIn(500);
    //                }
    //            });
    //
    //            $.ajax({
    //                url: "functions/supervisor/get_group_members.php",
    //                type: "post",
    //                data: {'gid': id},
    //                success: function (data)
    //                {
    //                    //$('#overall-group').fadeOut(1000);
    //                    
    //                    $('#in-group').fadeOut(500).delay(500);
    //                    $('#in-group').html(data);
    //                    $('#in-group').fadeIn(data);
    //                }
    //            });
    //    ///////////////////////////////////MENU BAR CLICKS/////////////////////////////

    function onClickStudentsClassication()
    {

    }
    function onClickGroups()
    {

    }
    function onClickExams()
    {

    }
    function onClickResults()
    {

    }
</script>