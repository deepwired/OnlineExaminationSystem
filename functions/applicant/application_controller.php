<?php

session_start();
include '../../includes/database_connect.inc.php';

if (array_key_exists("key_1", $_REQUEST)) {
    
    $result = $con->query("select s.id as s_id , qp.name , date_format(s.start_time,'%D ' '%b ' '%Y ') as start_time , date_format(s.time, '%T')  as time from question_paper qp, schedule s , user_group ug  where qp.id = s.question_paper_id and s.group_id = ug.group_id and ug.user_id = " . $_SESSION['id'] . "");
    $rows = array();
    if($result->num_rows > 0)
    {
        $rows["status"] = "true"; 
        while ($r = $result->fetch_assoc()) 
        {
            $rows["data"][] = $r;
        }
        echo json_encode($rows);
    }
    $con->close();
}
?>
