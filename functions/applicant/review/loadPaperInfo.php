<?php
session_start();
include '../../../includes/database_connect.inc.php';
?>
<?php

//{'qpid':qpid,'sid':sid},

$query=" select count(q.id) as total_questions , sum(q.value) as total_marks ,"
        . " (select score from scores where schedule_id=".$_POST['sid']." and user_id=".$_SESSION['id']." ) "
        . "as marks_scored from question q , schedule s "
        . "where s.id = ".$_POST['sid']." and q.question_paper_id=s.question_paper_id;
";
//echo $query;
$stmt = $con->prepare($query);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    //$serial = 1;
    $stmt->bind_result($tq,$tm,$ts);
    while ($stmt->fetch()) {              
        echo "<div class='well' style='color:black;'>";
        echo "<i class='mdi-action-backup'></i><br>";
        echo "<br>Total Questions : ".$tq;
        echo "<br>Total Marks : ".$tm;
        echo "<br>Your Score : ".$ts;
       
    }
}
else
{
    echo "<div class='well' style='color:black;'>";
    echo "<i class='mdi-action-backup'></i>";
    echo "Total Questions : 0 ";
    echo "Total Marks :0 ";
    echo "<br>Your Score :0 ";
    
    }
?>


<div align='center'><button class='btn btn-warning' onClick="closeReview()" >Go Back</button></div>
</div>
      