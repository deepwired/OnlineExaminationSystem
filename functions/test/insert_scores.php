<?php

include '../../includes/database_connect.inc.php';
session_start();
$query0 = " INSERT INTO `examportal`.`scores` (`id`, `schedule_id`, `user_id`, `score`, `start_time` ,  `submit_time` ) VALUES ('', '" . $_SESSION['schedule_id'] . "', '" . $_SESSION['id'] . "', '0', now() , null);";
//echo $query0;
$stmt0 = $con->prepare($query0);
$stmt0->execute();
if ($stmt0->affected_rows > 0) {
    echo "true";
    $stmt1 = $con->prepare(" select id, question , a , b , c , d , value , question_type  from question where question_paper_id =" . $_SESSION['question_paper_id'] . "");
    $stmt1->execute();
    $stmt1->store_result();
    if ($stmt1->num_rows > 0) {
        $stmt1->bind_result($id, $question, $a, $b, $c, $d, $value, $question_type);
        $serial = 0;
        while ($stmt1->fetch()) {
            $serial+=1;
            $_SESSION["'sr_'.$serial"] = $id;
            $query2 = " insert into answers values(''," . $_SESSION['schedule_id'] . "," . $_SESSION['question_paper_id'] . "," . $_SESSION['group_id'] . "," . $_SESSION['applicant_id'] . "," . $id . ",' ')";
            $stmt2 = $con->prepare($query2);
            $stmt2->execute();
            if ($stmt2->affected_rows > 0) 
            {
            }
        }
        $_SESSION['total_questions'] = $serial;
    }
} else
    echo "false";
?>