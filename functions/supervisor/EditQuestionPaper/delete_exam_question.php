<?php 
session_start();
include '../../../includes/database_connect.inc.php';
?>
<?php

if(array_key_exists('qid',$_POST))
{
   // $query = " update question set question='$question' and  a='$option_a' and b='$option_b' and c='$option_c' and d='$option_d' and answer='$answer' and value =$weight  and question_type =$q_type where id =". $_POST['qid']."";
   // echo $query;
    $stmt = $con->prepare(" delete from question  where id  =". $_POST['qid']."");
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "question has been deleted";
    }
    else
    {
        echo "question could not be deleted";
    }
}

?>

