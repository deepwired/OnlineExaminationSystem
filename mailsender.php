    <?php
    //echo mail("deepwired@gmail.com","A Subject Here","Hi there,\nThis email was sent using PHP's mail function.");

    include './includes/database_connect.inc.php';
    session_start();

    $sid = $_POST['sid'];


    $query = "select (select name from question_paper where id=s.question_paper_id) as paper_name , date_format(start_time, '%D-%b-%Y , %T %p') ,group_id,(select name from user where id=" . $_SESSION['id'] . ") from schedule s where s.id=" . $sid;

    $stmt = $con->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($examName, $date, $group_id, $username);

    $stmt->fetch();

    $query2 = "select email from user where id in (select user_id from user_group where group_id = ".$group_id.")";
    $stmt2 = $con->prepare($query2);
    $stmt2->execute();
    $stmt2->store_result();
    $stmt2->bind_result($sendTo);

    while ($stmt2->fetch()) {

        $dataSchedule = "Subject: Schedule Notification\r\n\r\n
        Exam Paper $examName has been Scheduled to be held on $date ,This Schedule was done by $username " . 
                PHP_EOL . "\n  \n Thank You," .
                PHP_EOL . "Best Of Luck," .
                PHP_EOL . "OnlineExaminationTeam";

        echo exec('echo -e "' . $dataSchedule . '" | msmtp --debug -a gmail ' . $sendTo);
    }

    ?>



