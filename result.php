<?php
session_start();
include './includes/database_connect.inc.php';
include './includes/cssheaders.inc.php';

//$query1 = "select q.value ,q.id from question q where q.id in (select question_id from answers where user_id = ".$_SESSION['id']." and question_paper_id = ".$_SESSION['question_paper_id']." and schedule_id = ".$_SESSION['schedule_id']." and group_id = ".$_SESSION['group_id']." );";

$query2 = " select ifnull(sum(q.value),0) , (select sum(k.value) from question k "
        . "where k.question_paper_id=".$_SESSION['question_paper_id'].") "
        . "from question q , answers a , schedule s where a.user_id= " . $_SESSION['id'] . " "
        . "and s.question_paper_id = " . $_SESSION['question_paper_id'] . " "
        . "and s.id = " . $_SESSION['schedule_id'] . " "
        . "and s.group_id = " . $_SESSION['group_id'] . " "
        . "and q.answer=a.answer and q.id=a.question_id "
        . "and q.question_paper_id = s.question_paper_id "
        . "and a.schedule_id = s.id ";
//echo $query2;


$stmt = $con->prepare($query2);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows() > 0) {
    $stmt->bind_result($marks,$total);
    $stmt->fetch();
    //echo "1**********";
    $query3 = "update scores set score= " . $marks . " , submit_time = now() where schedule_id = " . $_SESSION['schedule_id'] . " and user_id = " . $_SESSION['id'] . "";
    //echo "***". $query3;
    $stmt2 = $con->prepare($query3);
    $stmt2->execute();

    if ($stmt2->affected_rows > 0) {
        ?>
        <div class="jumbotron container" >
            <h1>Result </h1>
                <p> You have scored a total of <?php echo $marks; ?> out of <?php  echo $total; ?> </p>
                <p> Percentage : <?php echo round(($marks*100)/$total,2); ?></p>
                <p><a class="btn btn-primary btn-lg" href="app.php">Go Back </a></p>
            </div>
            <?php
        } else {
            ?>
            <div class="jumbotron container">
                <h1>Result !!!!!</h1>
                <p> Oops something went wrong .. Your exam paper has been saved but marks will be revealed later on !!</p>
                <p><a class="btn btn-primary btn-lg" href="app.php">Go Back </a></p>
            </div>
            <?php
        }
    }


    include './includes/jsheaders.inc.php'
    ?>
<script>

</script>