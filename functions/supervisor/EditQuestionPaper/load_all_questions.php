<?php
session_start();
include '../../../includes/database_connect.inc.php';
?>
<?php
if (array_key_exists('examid', $_POST)) {
    //echo "here";
    $stmt = $con->prepare("select id,question_paper_id,question,value,question_type from question where question_paper_id = ".$_POST['examid']."");
    //echo "select id,question_paper_id,question,question_type from question where question_paper_id = ".$_POST['examid']."";
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        //echo " now here ";
        $serial = 1;
        $stmt->bind_result($id, $question_paper_id, $question,$value,$question_type);
        if($stmt->fetch())
        {
            ?>
         <div class="well well-sm">
         <button id="defaultQuestion" onClick="loadQuestionEdit(<?php echo $id; ?>)" class="list-group-item list-group-item-success" >
         <?php echo $serial.") ".substr($question, 0, 10)."..[".$value."]";$serial++; ?>
         </button>
         </div>
        <?php 
        }
        
        
        while ($stmt->fetch()) {
?>
     <div class="well well-sm">
         <button onClick="loadQuestionEdit(<?php echo $id; ?>)" class="list-group-item list-group-item-success" >
            <?php echo $serial.") ".substr($question, 0, 10)."..[".$value."]";$serial++; ?>
             
         </button>
     </div>            
<?php            
        }
    }
    else
    { ?>
        <div class="well">Sorry No Questions present in this Exam</div>
    <?php
    }
}
?>
