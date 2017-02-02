<?php

include '../../includes/database_connect.inc.php';
session_start();
if (array_key_exists('question_id', $_POST)) {
    $question_id = htmlspecialchars($_POST["question_id"]);
    $mcq_answer = htmlspecialchars($_POST["mcq_answer"]);
    $ow_answer = htmlspecialchars($_POST["ow_answer"]);
    $applicant_answer = ' ';
    if ($mcq_answer != 'null')
        $applicant_answer = $mcq_answer;
    else if ($ow_answer != 'null')
        $applicant_answer = $ow_answer;
    
//    echo $_SESSION["'sr_'.1"];
    if($question_id == 0)
        $question_id = $_SESSION["'sr_'.1"];
    //echo $mcq_answer."::".$ow_answer;
    $stmt = $con->prepare("select question_id from answers where user_id = " . $_SESSION['applicant_id'] . " and question_id= " . $question_id . " and schedule_id = ".$_SESSION['schedule_id']." and group_id = ".$_SESSION['group_id']. " and question_paper_id = ".$_SESSION['question_paper_id']." ;");
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) 
    { // answer has been inserted once.. so update query
        $query = " update answers set answer = '".$applicant_answer."' where question_id = ".$question_id." and user_id = ".$_SESSION['applicant_id']." and schedule_id = ".$_SESSION['schedule_id']." ;";
//        echo $query;
        $stmt2 = $con->prepare($query);
        $stmt2->execute();
        if ($stmt2->affected_rows > 0)
           echo "answer updated successfully";
        else
        echo "answer not changed... navigating";
        
    }
    
}


?>
