<?php 
session_start();
include '../../includes/database_connect.inc.php';
?>
<?php

  // data: {'pid': paper_id, 'ques': ques, 'oa': a, 'ob': b, 'oc': c, 'od': d, 'am': answer_m, 'af': answer_f,'q_type':q_type,'weight':weight},
$q_type=htmlspecialchars($_POST['q_type']);
$que_paper_id = $_SESSION["question_paper_id"];
$question = htmlspecialchars($_POST["ques"]);
$option_a = htmlspecialchars($_POST["oa"]);
$option_b = htmlspecialchars($_POST["ob"]);
$option_c = htmlspecialchars($_POST["oc"]);
$option_d = htmlspecialchars($_POST["od"]);

if($q_type=='m')
{
    $answer = htmlspecialchars($_POST["am"]);
    $q_type=1;
}
else if($q_type=='f')
{
    $answer = htmlspecialchars($_POST["af"]);    
    $q_type=2;
}

$weight = htmlspecialchars($_POST["weight"]);

      
if(array_key_exists('update',$_POST))
{
  
$stmt3 = $con->prepare(" update question set question=? ,  a=? , b=? , c=? and d=? , answer=? , value =?  , question_type =? where id =". $_POST['update']."");
$stmt3->bind_param("ssssssss", $question, $option_a, $option_b, $option_c, $option_d, $answer, $weight,$q_type);
$stmt3->execute();
if ($stmt3->affected_rows > 0) {
    
     //echo '<button onClick="insertQuestionofPaper('.$con->insert_id.')" class="list-group-item list-group-item-success">'.substr($question, 0, 10).'...</button>';
     //run  a query to fix the updated question         
    //echo "updated";
}   
}
else
{
if($q_type=='1' || $q_type==1)
{
    $stmt2 = $con->prepare(" insert into question values('',?,?,?,?,?,?,?,?,1)");
}
else if($q_type=='2' || $q_type==2)
{
    $stmt2 = $con->prepare(" insert into question values('',?,?,?,?,?,?,?,?,2)");
}
$stmt2->bind_param("ssssssss", $que_paper_id, $question, $option_a, $option_b, $option_c, $option_d, $answer, $weight);
$stmt2->execute();
if ($stmt2->affected_rows > 0) {
    
     echo '<div class="well well-sm"><button onClick="insertQuestionofPaper('.$con->insert_id.')" class="list-group-item list-group-item-success">'.$_SESSION['tempQuestionNo'].") ".substr($question, 0, 10).'..['.$weight.']</button></div>';
     $_SESSION['tempQuestionNo']++;          
}   
}   
?>