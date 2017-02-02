<?php
session_start();
include '../../../includes/database_connect.inc.php';
//$user_id=$_POST['uid'];
$question_paper_id=$_POST['qpid'];
$schedule_id=$_POST['sid'];

?>

<?php
?>



<div class="col-lg-12">    
    <div class="row">
        <div  class="col-lg-2">
        <h3>Question List</h3> 
        </div>

        <div  class=" col-lg-8">
        <h3>Selected Question</h3>    
        </div>

        <div  class="col-lg-2">
        <h3>Exam Status</h3>   
        </div>
    </div>
    
    <div class="row">
        <div id="question_list" class="col-lg-2" style="height:500px;overflow-y: auto;">
        </div>

        <div id="question_load" class="well col-lg-8" style="height:500px;overflow-y: auto;">            
        </div>

        <div id="paper_info" class=" col-lg-2">
        </div>
    </div>
</div>

<script>

  qpid=<?php echo $question_paper_id; ?>;
  sid=<?php echo $schedule_id; ?>;
  $(document).ready(function () {
        loadQuestionList();
        loadPaperInfo();
  });

  function loadQuestionList()
  {
   $.ajax({
            url: "functions/applicant/review/loadQuestionList.php",
            type: "post",
            data: {'qpid':qpid,'sid':sid},
            success: function (data)
            {
                $('#question_list').html(data);
            }
        });    
  }
  
  function loadQuestion(qid)
  {
      
   $.ajax({
            url: "functions/applicant/review/loadQuestion.php",
            type: "post",
            data: {'qpid':qpid,'sid':sid,'qid':qid},
            success: function (data)
            {
                $('#question_load').html(data);
            }
        });    
  }
  function loadPaperInfo()
  {      
   $.ajax({
            url: "functions/applicant/review/loadPaperInfo.php",
            type: "post",
            data: {'qpid':qpid,'sid':sid},
            success: function (data)
            {
                $('#paper_info').html(data);
            }
        });    
  }
 
    
</script>

<?php


?>
