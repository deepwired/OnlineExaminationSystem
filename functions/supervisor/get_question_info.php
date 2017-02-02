<?php
session_start();
include '../../includes/database_connect.inc.php';
?>
<?php
$stmt = $con->prepare("select question,a,b,c,d,answer,value,question_type from question where  question_paper_id = " . $_SESSION['question_paper_id'] . " and id= " . $_POST['ques_id'] . "");
//echo "select question,a,b,c,d,answer,value,question_type from question where  question_paper_id = " . $_SESSION['question_paper_id'] . " and id= " . $_POST['ques_id'] . "";
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $serial = 1;
    $stmt->bind_result($question, $a,$b,$c,$d,$answer,$value,$question_type);
    while ($stmt->fetch()) {
        //echo "$question_type";
        
         $json = array('question'=>$question, 'a'=>$a,'b'=>$b,'c'=>$c,'d'=>$d,'answer'=>$answer,'value'=>$value,'question_type'=>$question_type);
        //$output="{'question':'$question','a':'$a','b':'$b'}";
        echo json_encode($json);
        
    }
}
?>

