<?php
include './includes/database_connect.inc.php';
include './includes/cssheaders.inc.php';

session_start();
$group_id = $_POST['group_id'];
$schedule_id = $_POST['schedule_id'];
$ques_paper_id = $_POST['question_paper_id'];
$duration = $_POST['duration'];
$seconds = strtotime("1970-01-01 $duration UTC");
$name=$_POST['name']
?>

<body style="background-color: black">
    <div id="parent_div_of_exam_paper" class="container" style="margin-top: 20px;">  
        <div class="row">
            <div class="col-lg-4" style="color: white"><h3>Question Paper : <?php echo $name; ?></h3></div>
            <div class="col-lg-4" align="center"></div>
            <div align="center" class="col-lg-4">
                <div class="well well-material-grey-500" style="color: white" id="timer"></div>
            </div>
        </div>  
        <div class="row">
            <div class="progress progress-striped active" style="height:20px">
                <div class="progress-bar" id="pb" style="width: 100%"></div>
            </div>
        </div>    

        <div class="row" >
            <div  class="col-lg-4" style="height:580px;overflow-y: auto;">
                <h4 style="color:white">Question List:</h4>
                <div align="left" id="listofquestions" >

                </div>
            </div>
            <div class=" col-lg-8" style="color: black">
                <h4 style="color:white">Question Area:</h4>
                <div style="height:450px;" id="individual-question">

                </div>
            </div>
        </div>
    </div>
    <!--        <div class= "col-lg-3" >
            </div>-->

</div>
</body>
<?php
include './includes/jsheaders.inc.php';
$_SESSION['applicant_id'] = $_SESSION['id'];
$_SESSION['schedule_id'] = $schedule_id;
$_SESSION['group_id'] = $group_id;
$_SESSION['question_paper_id'] = $ques_paper_id;
?>
<script>
    var ques_paper_id = <?php echo $_SESSION['question_paper_id']; ?>;
    var duration = <?php echo $seconds; ?>;
    $(document).ready(function () {
        $.material.init();
        $.material.ripples();
        insertScores();
        display_c(duration);
//        loadTestQuestionList();
//        loadTestQuestion(0, 0, 1);

    });
    function insertScores()
    {
        $.ajax({
            url: "functions/test/insert_scores.php",
            type: "post",
            asynch : "false",
            success: function (data)
            {
                if(data === 'true')
                    alertify.success("Exams started");
                else
                    alertify.error("Opps .. Something went wrong");
            }
        });
        loadTestQuestion(0, 0, 1);
        
    }
    
    function loadTestQuestion(earlier_ques_id, question_id, serial_num)
    {
        var mcq_ans = $("input[name=options_" + earlier_ques_id + "]:checked").val();
        var ow_ans = $("#answer_" + earlier_ques_id).val();
        if (!mcq_ans)
            mcq_ans = "null";
        if (!ow_ans)
            ow_ans = "null";
        $.ajax({
            url: "functions/test/insert_answers.php",
            type: "post",
            asynch : "false" ,
            data: {'question_id': earlier_ques_id, 'mcq_answer': mcq_ans, 'ow_answer': ow_ans},
            success: function (data)
            {
                alertify.log(data);   
            }
        });
        $.ajax({
            url: "functions/test/loadQuestions.php",
            type: "post",
            asynch : "false" ,
            data: {'question_id': question_id, 'paper_id': ques_paper_id, 'serial_num': serial_num},
            success: function (data)
            {
                $('#individual-question').html(data);
                loadTestQuestionList();
            }
        });
        
    }

    function loadTestQuestionList()
    {
        $.ajax({
            url: "functions/test/loadQuestionsList.php",
            type: "post",
            asynch : "false",
            data: {'paper_id': ques_paper_id},
            success: function (data)
            {
                $('#listofquestions').html(data);
            }
        });
    }
    

//    function getPreviousAnswer_mcq(question_id, answer)
//    {
//        $("input[name=options_" + question_id + "][value=" + answer + "]").prop('checked', true);
//    }
//    function getPreviousAnswer_ow()
//    {
//    }

    function finishExam()
    {
        location.href = "result.php";
    }
    function display_c(start)
    {
        window.start = parseFloat(start);
        var end = 0; // change this to stop the counter at a higher value
        var refresh = 1000; // Refresh rate in milli seconds
        if (window.start >= end) {
            mytime = setTimeout('display_ct()', refresh);
        }
        else
        {
            alert("Time Over ");
        }
    }
    function display_ct()
    {
        var days = Math.floor(window.start / 86400);
        // After deducting the days calculate the number of hours left
        var hours = Math.floor((window.start - (days * 86400)) / 3600);
        // After days and hours , how many minutes are left
        var minutes = Math.floor((window.start - (days * 86400) - (hours * 3600)) / 60);
        // Finally how many seconds left after removing days, hours and minutes.
        var secs = Math.floor((window.start - (days * 86400) - (hours * 3600) - (minutes * 60)));
        if (days === 0 && hours === 0 && minutes === 0 && secs === 0)
        {
            location.href = "result.php";
        }
        //var x = window.start + "(" + days + " Days " + hours + " Hours " + minutes + " Minutes and " + secs + " Secondes " + ")";
        var x = "<h4>Time :"+ hours + " Hr " + minutes + " Mins and " + secs + " Seconds " + "</h4>";

        document.getElementById('timer').innerHTML = x;
        var percent = (window.start * 100) / duration;
        document.getElementById("pb").style.width = percent + "%";

        window.start = window.start - 1;
        tt = display_c(window.start);
    }
</script>