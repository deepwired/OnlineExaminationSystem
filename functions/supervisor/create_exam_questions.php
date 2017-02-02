<?php
session_start();
include '../../includes/database_connect.inc.php';

if (array_key_exists('q', $_POST)) {
    $_SESSION['question_paper_id'] = $_POST['q'];
    ?>
 <div class="well well-material-teal-250" style="color: black">
    <div class='row' align='center'>
        <label  class="control-label">Question Type</label>
        <select id="ques_type" class="btn btn-primary btn-flat">
            <option value="m">Multiple Choice Question</option>
            <option value="f">One Word Answers</option>
        </select>
    </div>
    <br>
   
        <div class='row'>
            <div align="center" class="col-lg-12">
                Q<span id="question_number">1</span>
                <div class="form-control-wrapper" rows="3" >
                    <textarea class="form-control empty" rows="3" id="question"></textarea>
                    <div class="floating-label">Enter Question Here</div>
                    <span class="material-input"></span>
                </div>
            </div>
        </div>
        <div id="mcq">
            <div class='row'>
                <br><br>
                <label class="col-lg-1 control-label">A</label>
                <div class="col-lg-5">
                    <input id = "option_a" class="form-control" type="text" placeholder="Test Name (eg. Java SE)"></input>
                </div>

                <label class="col-lg-1 control-label">C</label>
                <div class="col-lg-5">
                    <input id = "option_c" class="form-control" type="text" placeholder="Test Name (eg. Java SE)"></input>
                </div>
            </div>
            <br>
            <div class='row'>
                <label class="col-lg-1 control-label">B</label>
                <div class="col-lg-5">
                    <input id = "option_b" class="form-control" type="text" placeholder="Test Name (eg. Java SE)"></input>
                </div>

                <label class="col-lg-1 control-label">D</label>
                <div class="col-lg-5">
                    <input id = "option_d" class="form-control" type="text" placeholder="Test Name (eg. Java SE)"></input>
                </div>
            </div>
        </div>
        <hr>
        <div class='row' align='center'>
            <label  class="">Answer </label>       
            <select id = "answer_m" class="btn btn-primary btn-flat">
                <option value="A">A</option>                
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
            <br>
            <input type="text" class="form-control" id = "answer_f" placeholder="Enter Answer here" hidden>
            <br>
            <label  class="control-label ">Question Weight </label>
            <select id="weight" class="btn btn-primary btn-flat">
                <?php
                for ($i = 1; $i <= 10; $i++)
                    echo "<option value = '$i'> $i</option>";
                ?>
            </select>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <button class="btn btn-lg btn-warning" onClick="insertQuestionofPaper(-1)"> Finish Exam</button>
            </div>
            <div id="createexambutton" class="col-lg-6">
                <button class="btn btn-lg btn-warning" id='insertedit' onClick="insertQuestionofPaper(0)"> Save and Next</button>
            </div>
        </div>
    </div>
    <?php
} //end of first call
?>

<script>
    temp = 1;

    //alert("rendered js");
    $(document).ready(function () {

        alertify.log("Go Ahead, add questions to your newly created question papers");
        $('#answer_f').hide();
        $('#displayquestionsofexam').fadeIn(500);

        $('#ques_type').change(function () {
            if ($('#ques_type').val() === "m")
            {
                $('#answer_f').fadeOut(500);
                $('#mcq').delay(500).fadeIn(500);
                $('#answer_m').delay(500).fadeIn(500);
            }
            else if ($('#ques_type').val() === "f")
            {
                $('#mcq').fadeOut(500);
                $('#answer_m').fadeOut(500);
                $('#answer_f').delay(500).fadeIn(500);
            }
        });
    });
//            function clearFields()
//            {
//                    $('#question').val("");
//                    $('#answer_m').val("");
//                    $('#answer_f').val("");
//                    $('#option_a').val("");
//                    $('#option_b').val("");
//                    $('#option_c').val("");
//                    $('#option_d').val("");
//            }
    function insertQuestionofPaper(x)
    {
        if (x == 0)
        {
            //$('#insertedit').html("Save and Next");
            //do validations
            //alert("here");
            //alert("1");
            var flag = 0;
            var q_type = $('#ques_type').val();
            var a = $('#option_a').val();
                var b = $('#option_b').val();
                var c = $('#option_c').val();
                var d = $('#option_d').val();
                var answer_m = $('#answer_m').val();
                var answer_f = $('#answer_f').val();
                
            
            var ques = $('#question').val();
            
            
            if (ques == '')
            {
                flag = 1;
            }
            if(q_type=='m')
            {
                if (a == '')
                {
                    flag = 1;
                }
                if (b == '')
                {
                    flag = 1;
                }
                if (c == '')
                {
                    flag = 1;
                }
                if (d == '')
                {
                    flag = 1;
                }
                if (answer_m == '')
                {
                    flag = 1;
                }
            }
            else
            {
                if (answer_f == '')
                {
                    flag = 1;
                }
            }
            var weight = $('#weight').val();
            

            if (flag == 0)
            {
                $.ajax({
                    url: "functions/supervisor/insert_exam_question.php",
                    type: "post",
                    data: {'ques': ques, 'oa': a, 'ob': b, 'oc': c, 'od': d, 'am': answer_m, 'af': answer_f, 'q_type': q_type, 'weight': weight},
                    success: function (data)
                    {
                        alertify.log("Question has been Saved");
                        //alert(data);
                        $('#question').val("");
                        //$('#answer_m').val();
                        $('#answer_f').val("");
                        $('#option_a').val("");
                        $('#option_b').val("");
                        $('#option_c').val("");
                        $('#option_d').val("");
                        //var temp=parseInt($('#question_number').val());
                        $('#question_number').html(++temp);
                        //var questionInfo=ques.toString().substr(0,15);
                        $('#listofquestions').append(data);
                        //alert(questionInfo);
                    }
                });
            }
            else
            {
                alertify.error("Missing Fields Detected, Kindly check and fill all details");
            }
            $.ajax({
                    url: "functions/supervisor/get_exam_status.php",
                    type: "post",
                    data: {'ques': <?php echo $_SESSION['question_paper_id'];?>},
                    success: function (data)
                    {
                        $('#exam_status').html(data);
                    }
                });
            
        }
        else if (x < 0)
        {
            $('#createtheexam').fadeOut(500);
            $('#overall-exams').delay(500).fadeIn(500);
            $('#examDescriptionOverall').delay(500).fadeIn(500);
            $('#addquestionstoexam').empty();
            $('#displayquestionsofexam').fadeOut(500);
            $('#listofquestions').empty("");
            $('#exam_status').empty(500);

            //$('#examName').attr("readonly", "");
            $('#examDescription').val("");
            $('#examName').val("");
            alertify.log("Changing Question Type!");
            $('#btncreateexam').delay(500).fadeIn(500);
        }
        else
        {
            $('#question_number').html(") Edit Question");
            $('#createexambutton').html('<button class="btn btn-lg btn-warning" id="insertedit" onClick="updateQuestionofPaper(' + x + ')"> Edit and Next </button>');
            $.ajax({
                url: "functions/supervisor/get_question_info.php",
                type: "post",
                data: {'ques_id': x},
                success: function (data)
                {
                    alertify.log("Question Retrieved Successfully");
                    data = JSON.parse(data);
                    $('#question').val(data['question']);
                
                    $('#option_a').val(data['a']);
                    $('#option_b').val(data['b']);
                    $('#option_c').val(data['c']);
                    $('#option_d').val(data['d']);
                    $('#answer_m').val(data['answer']);
                    $('#answer_f').val(data['answer']);
                    $('#weight').val(data['value']);
                    //alert("This is Question Type :" + data['question_type'] + " AAAA " + data['question']);
                    if (data['question_type'] == '1' || data['question_type'] == 1)
                    {
                        $('#answer_f').fadeOut(500);
                        $('#mcq').delay(500).fadeIn(500);
                        $('#answer_m').delay(500).fadeIn(500);
                    }
                    else if (data['question_type'] == '2' || data['question_type'] == 2)
                    {
                        $('#mcq').fadeOut(500);
                        $('#answer_m').fadeOut(500);
                        $('#answer_f').delay(500).fadeIn(500);
                    }

                }
            });
        }
        
    }

    function updateQuestionofPaper(x)
    {
        var flag = 0;
        var q_type = $('#ques_type').val();
        var a = $('#option_a').val();
        var b = $('#option_b').val();
        var c = $('#option_c').val();
        var d = $('#option_d').val();
        var answer_f = $('#answer_f').val();
        var answer_m = $('#answer_m').val();
        
        var ques = $('#question').val();
            if (ques == '')
            {
                flag = 1;
            }
        
        if(q_type=='m')
        {
            if (a == '')
            {
                flag = 1;
            }
            if (b == '')
            {
                flag = 1;
            }
            if (c == '')
            {
                flag = 1;
            }
            if (d == '')
            {
                flag = 1;
            }
            if (answer_m == '')
            {
                flag = 1;
            }
        }
        else
        {
        if (answer_f == '')
            {
                flag = 1;
            }
        }    
        var weight = $('#weight').val();
        
        if(flag==0)
        {
            $('#createexambutton').html('<button class="btn btn-lg btn-warning" id="insertedit" onClick="insertQuestionofPaper(0)"> Save and Next </button>');
            $.ajax({
                url: "functions/supervisor/insert_exam_question.php",
                type: "post",
                data: {'update': x, 'ques': ques, 'oa': a, 'ob': b, 'oc': c, 'od': d, 'am': answer_m, 'af': answer_f, 'q_type': q_type, 'weight': weight},
                success: function (data)
                {
                    alertify.log("Modified Question has been saved");
                    //alert("here");
                    $('#question').val("");
                    $('#answer_m').val("");
                    $('#answer_f').val("");
                    $('#option_a').val("");
                    $('#option_b').val("");
                    $('#option_c').val("");
                    $('#option_d').val("");
                    $('#question_number').html(temp);
                    $('#listofquestions').append(data);
                }
            });
        }
        else
        {
            alert("kindly fill all details before updating");
        }
         $.ajax({
                    url: "functions/supervisor/get_exam_status.php",
                    type: "post",
                    data: {'ques': <?php echo $_SESSION['question_paper_id'];?>},
                    success: function (data)
                    {
                        $('#exam_status').html(data);
                    }
                });
    }

</script>