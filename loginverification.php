<?php

//echo mail("deepwired@gmail.com","A Subject Here","Hi there,\nThis email was sent using PHP's mail function.");

include './includes/database_connect.inc.php';
session_start();



if (array_key_exists('uid', $_POST)) {
    $uid = $_POST['uid'];
    $query = "select email from user where id =" . $uid;
    $stmt = $con->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($sendTo);
    while ($stmt->fetch()) {

        $dataSchedule = "Subject: Email Verification\r\n\r\n
        Kindly hit the below link to verify your account" .
                PHP_EOL . "http://localhost/OnlineExamination/loginverification.php?auid=" . $uid .
                PHP_EOL ." without verification of your email id you will not be able to gain access to our website".
                PHP_EOL . "\n  \n Thank You," .
                PHP_EOL . "OnlineExaminationTeam";

        echo exec('echo -e "' . $dataSchedule . '" | msmtp --debug -a gmail ' . $sendTo);
    }
} else if(array_key_exists('auid', $_REQUEST))
    {
    
    
    
include './includes/cssheaders.inc.php';

include './includes/jsheaders.inc.php';

    $query2 = "update user set role_id =4 where id= ".$_REQUEST['auid'];
    $stmt2 = $con->prepare($query2);
    $stmt2->execute();
    ?>
<br><br><br><br><br>
<div class="container">
<div class="jumbotron">
    <h1>Well Done</h1>
    <p>Your Accout is now activated,</p>
    <p><a href="logout.php" class="btn btn-lg btn-warning btn-block"> Proceed to Login </a></p>
</div>
</div>

    <?php
      }
    ?>



