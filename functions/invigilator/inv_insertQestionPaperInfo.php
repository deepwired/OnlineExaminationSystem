<?php
session_start();
include '../../includes/database_connect.inc.php';
?>
<?php
$test_name = htmlspecialchars($_POST["test_name"]);
$test_description = htmlspecialchars($_POST["test_description"]);

$user_id = $_SESSION["id"];
$stmt = $con->prepare("select max(id)+1 as id from question_paper;");
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id);
    $ques_num = 1;
    while ($stmt->fetch()) {
        $_SESSION["question_paper_id"] = $id;
        if(isset($_SESSION['question_paper_number']))
        {
            
        }
        else
        {
            $_SESSION['question_paper_number']=1;
        }
        $stmt2 = $con->prepare(" insert into question_paper values($id,?,?,?,now());");
        $stmt2->bind_param("sss", $user_id, $test_name, $test_description);
        $stmt2->execute();
        if ($stmt2->affected_rows > 0) {
            ?>
            <br><br><br>

            <div id="question-type">
            </div>
            <div id="question-type-html" style="display: none;">
                <div class='row' align='center'>
                    <label  class="control-label">Question Type</label>
                    <select id="ques_type" class="btn btn-primary btn-flat">
                        <option value="m">Multiple Choice Question</option>
                        <option value="f">Fill In the Blank</option>
                        <option value="o">True and False </option>
                    </select>
                </div>
                <br>

                <div class='row'>
                    <label class="col-lg-1 control-label">Q<?php
                        echo $_SESSION['question_paper_number'];
                          $_SESSION['question_paper_number']=$_SESSION['question_paper_number']+1;
                        ?></label>
                    <div align="center" class="col-lg-10">

                        <div class="form-control-wrapper" rows="3" >
                            <textarea class="form-control empty" rows="3" id="question"></textarea>
                            <div class="floating-label">Enter Question Here</div>
                            <span class="material-input"></span>
                        </div>
                    </div>
                </div>
                <br>
            </div>


            <?php
        } else {
            echo "Sorry Question Paper Could not be Created";
        }
        $stmt2->close();
    }
} else {
    echo "Sorry Question Paper Could not be Created !!!!";
}
?>
<div id="question-style"></div>

<div id="mcq-question-html" style="display: none;">
    <div class='row'>
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
    <br>
    <div class='row' align='center'>
        <label  class="control-label">Answer </label>       
        <select id = "answer_m" class="btn btn-primary btn-flat">
            <option value="A">A</option>                
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>   
        <label  class="control-label ">Question Weight </label>
        <select id="weight" class="btn btn-primary btn-flat">
            <?php
            for ($i = 1; $i <= 10; $i++)
                echo "<option value = '$i'> $i</option>";
            ?>
        </select>
    </div>
    <br>
    <div class='row' align='center'>

    </div>


    <div class="row">
        <div align="center" class="col-lg-4"><button class="btn btn-warning" onClick="insertQuestionDetails()" >Save and Next</button></div>
        <div align="center" class="col-lg-4"><button class="btn btn-warning" onClick="onClickFinish()" >Finish</button></div>
        <div align="center" class="col-lg-4"><button class="btn btn-warning " onClick="onClickClear()" >Clear</button></div>
    </div>
    <div class="row">
        <div align="center"><button class="btn btn-warning " onClick="onClickCancel()" >Cancel Test</button></div>
    </div>
</div>

<div id="fib-question-html" style="display: none;">

    <div class='row' align='center'>
        <div class="col-lg-1"><label  class="control-label">Ans </label>  
        </div>
        <div class="col-lg-10"><input id = "answer_f" class="form-control" type="text" placeholder="Write the correct answer"></input>
        </div>
        <div class="col-lg-1"></div>
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
        <div align="center" class="col-lg-4"><button class="btn btn-warning" onClick="insertQuestionDetails()" >Save and Next</button></div>
        <div align="center" class="col-lg-4"><button class="btn btn-warning" onClick="onClickFinish()" >Finish</button></div>
        <div align="center" class="col-lg-4"><button class="btn btn-warning" onClick="onClickClear()" >Clear</button></div>
    </div>
    <div class="row">
        <div align="center" ><button class="btn btn-warning" onClick="onClickCancel()" >Cancel Test</button></div>
    </div>

</div>

<div id="tf-question-html" style="display: none;">

    <div class='row' align='center'>
        <div class="col-lg-1"><label  class="control-label">Ans </label>  
        </div>
        <div class="col-lg-11">
            <div class="sample2">
                <div class="radio radio-inline">
                  <label>
                    <input name="sample2" value="option1" checked="" type="radio"><span class="circle"></span><span class="check"></span>
                    Auto
                  </label>
                </div>
                <div class="radio radio-inline">
                  <label>
                    <input name="sample2" value="option1" type="radio"><span class="circle"></span><span class="check"></span>
                    5 GHz only
                  </label>
                </div>
                <div class="radio radio-inline">
                  <label>
                    <input name="sample2" value="option1" type="radio"><span class="circle"></span><span class="check"></span>
                    2.4 GHz only
                  </label>
                </div>
              </div>
        </div>
        <div class="col-lg-1"></div>
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
        <div align="center" class="col-lg-4"><button class="btn btn-warning" onClick="insertQuestionDetails()" >Save and Next</button></div>
        <div align="center" class="col-lg-4"><button class="btn btn-warning" onClick="onClickFinish()" >Finish</button></div>
        <div align="center" class="col-lg-4"><button class="btn btn-warning" onClick="onClickClear()" >Clear</button></div>
    </div>
    <div class="row">
        <div align="center" ><button class="btn btn-warning" onClick="onClickCancel()" >Cancel Test</button></div>
    </div>

</div>


<script>
    $(document).ready(function()
    {
        var i = 1;
        loadQuestion();
    });

    function loadQuestion()
    {
        $('#question-type').html($('#question-type-html').html());
        loadMCQuestion();
        $('#ques_type').change(function()
        {

            //    alert($('#ques_type').val());
            loadTypeWiseQuestions();
        });

    }
    function loadTypeWiseQuestions()
    {
        if ($('#ques_type').val() === 'm')
            loadMCQuestion();
        else if ($('#ques_type').val() === 'f')
        {
            alert("Use '___' (underscore) for fill ups !!");
            loadFillUps();
        }
        else if ($('#ques_type').val() === 'o')
            loadTrueFalse();


    }

    function loadMCQuestion()
    {
        $('#question-style').hide();
        $('#question-style').empty();
        $('#question-style').html($('#mcq-question-html').html());
        $('#question-style').fadeIn(1000);
    }

    function loadFillUps()
    {
        $('#question-style').hide();
        $('#question-style').empty();
        $('#question-style').html($('#fib-question-html').html());
        $('#question-style').fadeIn(1000);
    }

    function loadTrueFalse()
    {
        $('#question-style').hide();
        $('#question-style').empty();
        $('#question-style').html($('#tf-question-html').html());
        $('#question-style').fadeIn(1000);
    }

    function insertQuestionDetails()
    {
        var question = $('#question').val();
        var answer = $('#answer').val();
        var weight = $('#weight').val();

        var option_a = 'null';
        var option_b = 'null';
        var option_c = 'null';
        var option_d = 'null';
        var answer_m = 'null';
        var answer_f = 'null';

        if ($('#option_a').val())
            option_a = $('#option_a').val();
        if ($('#option_b').val())
            option_b = $('#option_b').val();
        if ($('#option_c').val())
            option_c = $('#option_c').val();
        if ($('#option_d').val())
            option_d = $('#option_d').val();

        if ($('#answer_f').val())
            answer = $('#answer_f').val();
        else if ($('#answer_m').val())
            answer = $('#answer_m').val();

        $.ajax({
            url: "functions/invigilator/inv_insertQuestions.php",
            type: "post",
            data: {'question': question, 'option_a': option_a, 'option_b': option_b, 'option_c': option_c, 'option_d': option_d, 'answer': answer, 'weight': weight},
            success: function(data)
            {
                $('#question-style').empty();
                $('#ques-list').append(data);
                loadQuestion();
            }
        });
    }


    function onClickCancel()
    {
        $('#question-type').fadeOut(1000);
        $('#question-style').fadeOut(1000);
        $('#question-type').empty();
        $('#question-style').empty();
        $('#question-list').empty();

        $.ajax({
            url: "inv_cancelPaper.php",
            type: "post",
            success: function(data)
            {
                $('#question-type-n-ques').hide();
                onClickCreateTest();
            }
        });
    }

    function onClickClear()
    {
        $('#question-style').empty();
        loadQuestion();
    }

</script>