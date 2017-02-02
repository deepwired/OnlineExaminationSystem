<?php

session_start();
include 'includes/database_connect.inc.php';


header('Content-type: text/csv');
header('Content-disposition: attachment;filename=OnlineExaminationDataSet.csv');
// echo "Advertisement,Advertisement Category,Customer,Customer Email Id ,Customer Contact Number ,Transaction Date,Bank , Bank Transaction No , Amount(Rs), PayOut Status,".PHP_EOL;



$query = "select s.schedule_id,(select count(answer) from answers where schedule_id=s.schedule_id and user_id=s.user_id and answer!=' ') as attempted,s.question_paper_id,"
        . "(select name from user where id=s.user_id) as stuName,"
        . "(select name from question_paper where id=s.question_paper_id) as paper_name,"
        . "(select count(id) from question where question_paper_id =s.question_paper_id) as total_questions,"
        . "s.group_id,(select name from groups where id=s.group_id) as group_name,s.user_id,"
        . "(select sum(value) from question a where question_paper_id=s.question_paper_id) as total_marks,"
        . "(select count(aa.id) from question qq,answers aa where qq.id=aa.question_id and qq.answer=aa.answer and aa.schedule_id=s.schedule_id and aa.user_id=s.user_id) as corrent_attempts,";
if ($_REQUEST['uid'] == 0) {
    $query = $query . "(select score from scores where schedule_id=s.schedule_id and user_id=s.user_id) as score,";
} else {
    $query = $query . "(select score from scores where schedule_id=s.schedule_id and user_id=" . $_REQUEST['uid'] . ") as score,";
}

$query = $query . "(select start_time from schedule where id=s.schedule_id) as time ";
if ($_REQUEST['uid'] == 0) {
    $query = $query . "from answers s";
    if (array_key_exists('gid', $_REQUEST)) {
        if ($_REQUEST['gid'] != 0) {
            $query = $query . " where s.group_id=" . $_REQUEST['gid'];
        }
    }
} else {
    $query = $query . "from answers s where user_id=" . $uid;
    if (array_key_exists('gid', $_REQUEST)) {
        if ($_REQUEST['gid'] != 0) {
            $query = $query . " and s.group_id=" . $_REQUEST['gid'];
        }
    }
}
//$query = $query . " and ";
$query = $query . " group by schedule_id,user_id";

$stmt = $con->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($schedule_id, $attempted, $question_paper_id, $stuname, $paper_name, $total_questions, $group_id, $group_name, $user_id, $total_marks, $correct_attempts, $score, $time);

if ($stmt->num_rows > 0) {
echo "APPLICANT_ID,APPLICANT NAME,SCHEDULE_ID,GROUP_ID,GROUP_NAME,QUESTION_PAPER_ID,PAPER_NAME,TOTAL_QUESTION,TOTAL_MARKS,TOTAL_QUESTIONS_ATTEMPTED,TOTAL_CORRECT_ATTEMPTS,SCORE_ACQUIRED,PERCENTAGE,TIME".PHP_EOL;
while ($stmt->fetch()) {
    $percentage=($score*100)/$total_marks;
    echo "$user_id, $stuname, $schedule_id, $group_id, $group_name, $question_paper_id,$paper_name, $total_questions, $total_marks, $attempted,$correct_attempts, $score,$percentage ,$time".PHP_EOL;
}
}
?>