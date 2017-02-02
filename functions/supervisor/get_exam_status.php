<?php
session_start();
include '../../includes/database_connect.inc.php';
?>
<?php

//SELECT count(id) as 'total_questions',sum(value) as 'total marks' FROM `question` where question_paper_id=225 
$stmt = $con->prepare("SELECT count(id) as 'total_questions',sum(value) as 'total marks' FROM question where question_paper_id=" . $_SESSION['question_paper_id']);
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
        echo "</div>";
    }
}
else
{
    echo "<div class='well' style='color:black;'>";
    echo "<i class='mdi-action-backup'></i>";
    echo "Total Questions : 0 ";
    echo "Total Marks :0 ";
    echo "</div>";

    }
?>

