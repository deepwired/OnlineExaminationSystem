<?php
session_start();
include '../../../includes/database_connect.inc.php';
?>
<?php

//SELECT count(id) as 'total_questions',sum(value) as 'total marks' FROM `question` where question_paper_id=225 
$stmt = $con->prepare("SELECT count(id) as 'total_questions',sum(value) as 'total marks' FROM question where question_paper_id=" . $_POST['qp']);
//echo "select question,a,b,c,d,answer,value,question_type from question where  question_paper_id = " . $_SESSION['question_paper_id'] . " and id= " . $_POST['ques_id'] . "";
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    //$serial = 1;
    $stmt->bind_result($tq, $tm);
    while ($stmt->fetch()) {              
        echo "<div class='well' style='color:black;'>";
        echo "<i class='mdi-action-backup'></i><br>";
        echo "<br>Total Questions : ".$tq;
        echo "<br>Total Marks : ".$tm;
       
    }
}
else
{
    echo "<div class='well' style='color:black;'>";
    echo "<i class='mdi-action-backup'></i>";
    echo "Total Questions : 0 ";
    echo "Total Marks :0 ";
    
    }
?>

<div align='center'><button class='btn btn-warning btn-material-teal-500' onClick='insertNewQuestionEdit()' >Add Q</button></div>

<div align='center'><button class='btn btn-warning btn-material-deep-orange-A400' id='doneEditingExam' >Go Back</button></div>
</div>
      
<script>      
$(document).ready(function () {
        $('#doneEditingExam').click(function() {
            $('#edit_exam_paper').fadeOut(500);
            $('#overall-exams').delay(500).fadeIn(500);
            
            //$('#edit_exam_paper').html("");
        });
    });
</script>