<?php
session_start();
include '../../includes/database_connect.inc.php';
$gid = $_POST["s_g"];
$qid = $_POST["s_q_p"];
$startdate = $_POST["s_s_d"];
$enddate = $_POST["s_e_d"];
//echo $startdate."::".$enddate;
//$duration = $_POST['d_h'] * 60 + $_POST['d_m'];
$st_date = date("Y-m-d H:i:s", strtotime($startdate));
$end_date = date("Y-m-d H:i:s", strtotime($enddate));
//echo $st_date."::".$end_date;

//echo "lolll".$st;
$duration = $_POST['d_h'].":".$_POST['d_m'].":00";
$stmt = $con->prepare("insert into schedule VALUES (default," . $_SESSION['id'] . ",?,?,?,?,?,0)");
$stmt->bind_param("sssss", $qid, $gid, $st_date, $end_date, $duration);
$stmt->execute();

if ($stmt->affected_rows > 0) {
   
      echo $stmt->insert_id;
    }
    else {
    ?>
    0
    <?php
    }
$stmt->close();
?>