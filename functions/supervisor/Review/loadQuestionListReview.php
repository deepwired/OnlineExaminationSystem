<?php
session_start();
include '../../../includes/database_connect.inc.php';
?>
<?php
    //echo "here";
    
    $query="select q.id,q.question,q.value,q.question_type,q.a,q.b,q.c,q.d,q.answer,a.answer "
            . "as correct from question q,schedule s,answers a where q.id=a.question_id and "
            . "q.question_paper_id=a.question_paper_id and q.question_paper_id=s.question_paper_id "
            . "and a.user_id=".$_POST['uid']." and a.schedule_id=".$_POST['sid']." and a.schedule_id=s.id";
    
    
    $stmt = $con->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    //echo $query;
        if ($stmt->num_rows > 0) {
        //echo " now here ";
        $serial = 1;
        $stmt->bind_result($id, $question, $value,$question_type,$a,$b,$c,$d,$answer,$correct);
        while ($stmt->fetch()) {
?>
     <div class="well well-sm">
         <?php
         if($answer==$correct)
         {
         ?>    
         <button onClick="loadQuestion(<?php echo $id.",".$_POST['sid']; ?>)" class="list-group-item list-group-item-success">
            <?php echo $serial.") ".substr($question, 0, 10)."..[".$value."]";$serial++; ?>             
         </button>
         <?php
         }
         else
         { ?>
         <button onClick="loadQuestion(<?php echo $id; ?>)" class="list-group-item list-group-item-danger">
            <?php echo $serial.") ".substr($question, 0, 10)."..[".$value."]";$serial++; ?>             
         </button>
   <?php } ?>
     </div>            
<?php            
        }
    }
    else
    { ?>
        <div class="well">Sorry No Questions present in this Exam</div>
    <?php
    }

?>
