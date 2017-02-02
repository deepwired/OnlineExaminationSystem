<?php 
session_start();
include '../../../includes/database_connect.inc.php';
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
$weight = htmlspecialchars($_POST["weight"]);
//echo $weight;
//echo $question;

if(array_key_exists('qid',$_POST))
{
    if($q_type==1)
    {
        $answer = htmlspecialchars($_POST["am"]);
    }
    else if($q_type==2)
    {
        $answer = htmlspecialchars($_POST["af"]);    
    }
   // $query = " update question set question='$question' and  a='$option_a' and b='$option_b' and c='$option_c' and d='$option_d' and answer='$answer' and value =$weight  and question_type =$q_type where id =". $_POST['qid']."";
   // echo $query;
    $stmt = $con->prepare(" update question set question = ? ,  a = ? ,  b = ? , c = ? , d = ? , answer = ? , value = ?  , question_type =?  where id  =". $_POST['qid']."");
    $stmt->bind_param("ssssssss", $question, $option_a, $option_b, $option_c, $option_d, $answer, $weight,$q_type);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "1";
    }
    else
        echo "0";
}
else
{
      $stmt = $con->prepare(" insert into question values('',?,?,?,?,?,?,?,?,?)");
      $stmt->bind_param("sssssssss", $que_paper_id, $question, $option_a, $option_b, $option_c, $option_d, $answer, $weight,$q_type);
      $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "2";
    }   
}

?>

