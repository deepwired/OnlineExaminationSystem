<?php
session_start();
include '../../includes/database_connect.inc.php';
$_SESSION['question_paper_id']=$_POST['examid'];
?>
<div class='col-lg-12'>
    <div class="col-lg-3">
        <div class="well-sm well-material-green-100">Question List</div>
    </div>
    <div class="col-lg-7 ">
        <div class="well-sm well-material-green-100">Question Load Area</div>        
    </div>
    <div class="col-lg-2">
        <div class="well-sm well-material-green-100">Status</div>         
    </div>
</div>
<br/><br/><br/>

<div class='col-lg-12'>
    <div id="edit_question_list" style="height:600px;overflow-y: auto;" class="col-lg-3">

    </div>

    <div id="editing_question"  style="height:600px;overflow-y: auto;" class="col-lg-7 well well-material-teal-250">

    </div>

    <div id="question_paper_info" class="col-lg-2">

    </div>
</div>

<script>
    qp=<?php echo $_SESSION['question_paper_id'] ?>;
            
    $(document).ready(function () {
        loadQuestionNamesEdit(<?php echo $_POST['examid'] ?>);
        loadQuestionPaperInfo(qp);        
        
        $("#defaultQuestion" ).trigger( "click" );
        
    });
    function loadQuestionPaperInfo()
    {
        $.ajax({
            url: "functions/supervisor/EditQuestionPaper/load_exam_info.php",
            type: "post",
            data: {'qp': qp},
            success: function (data)
            {
                $('#question_paper_info').html(data);
            }
        });
    }
    function loadQuestionNamesEdit(examid)
    {
        $.ajax({
            url: "functions/supervisor/EditQuestionPaper/load_all_questions.php",
            type: "post",
            async:false,
            data: {'examid': examid},
            success: function (data)
            {
                $('#edit_question_list').html(data);
            }
        });
    }
    function loadQuestionEdit(qid)
    {
        $.ajax({
            url: "functions/supervisor/EditQuestionPaper/load_selected_question.php",
            type: "post",
            data: {'qid': qid},
            success: function (data)
            {
                $('#editing_question').html(data);
            }
        });
    }
    function updateQuestionEdit(qid)
    {
        var qid=qid;
        var flag=0;
        var q_type = $('#ques_type_edit').val();
        var a = $('#option_a').val();
        var b = $('#option_b').val();
        var c = $('#option_c').val();
        var d = $('#option_d').val();
        var answer_m = $('#answer_m').val();
        var answer_f = $('#answer_f').val();
        var ques = $('#question').val();
        var weight = $('#weight').val();
        
             if (ques == '')
            {
                flag = 1;
            }
            if(q_type=='m')
            {
                q_type=1;
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
                q_type=2;
                if (answer_f == '')
                {
                    flag = 1;
                }
            }
            

            if (flag == 0)
            {
                if(qid==0)
                {
                    $.ajax({
                    url: "functions/supervisor/EditQuestionPaper/update_exam_question.php",
                    type: "post",
                    data: {'ques': ques, 'oa': a, 'ob': b, 'oc': c, 'od': d, 'am': answer_m, 'af': answer_f, 'q_type': q_type, 'weight': weight},
                    async:false,
                    success: function (data)
                    
                    {
                        alert(weight);
                        alertify.log("New Question Inserted Successfuly....");
                        alert(data);
                    }
                });
                }
                else
                {
                $.ajax({
                    url: "functions/supervisor/EditQuestionPaper/update_exam_question.php",
                    type: "post",
                    async:false,
                    data: {'qid':qid,'ques': ques, 'oa': a, 'ob': b, 'oc': c, 'od': d, 'am': answer_m, 'af': answer_f, 'q_type': q_type, 'weight': weight},
                    success: function (data)
                    {
                        if(data == 1)
                        {
                        //alert(weight);
                        alertify.log("Question Updated Successfuly");
                        //alert(data);
                        }
                        else if (data == 0)
                            alertify.log("No Update Occured as there were no registered Changes!!");
                            
                            
                    }
                });
                }
                loadQuestionPaperInfo(qp);
                loadQuestionNamesEdit(qp);
                alertify.log("Edit Question View Synchronized successfuly");
            }
            else
            {
                alertify.error("Kindly Fill all the required details before updating!");
            }
    }
    function insertNewQuestionEdit()
    {
        $.ajax({
            url: "functions/supervisor/EditQuestionPaper/load_selected_question.php",
            type: "post",
            data: {},
            success: function (data)
            {
                $('#editing_question').html(data);
            }
        });
    }
    function deleteQuestion(qid)
    {
        $.ajax({
            url: "functions/supervisor/EditQuestionPaper/delete_exam_question.php",
            type: "post",
            data: {'qid':qid},
            success: function (data)
            {
                alertify.success(data);
            }
        });
        loadQuestionPaperInfo(qp);
        loadQuestionNamesEdit(qp);
        alertify.log("Edit Question View Synchronized successfuly");
    }
</script>

