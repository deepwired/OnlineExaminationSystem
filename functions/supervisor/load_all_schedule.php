<?php
include '../../includes/database_connect.inc.php';

$stmt2 = $con->prepare("SELECT u.name,q.name,date_format(s.start_time,'%D ' '%b ' '%Y ') , date_format(s.end_time,'%D ' '%b ' '%Y '),s.time FROM schedule s , question_paper q , user u where u.id=s.creator_id and  q.id=s.question_paper_id  order by s.time desc");
$stmt2->execute();
$stmt2->store_result();
if ($stmt2->num_rows > 0) {
    ?>
    <?php
    $stmt2->bind_result($username, $papername, $start_time, $end_time, $duration);
    ?>
    <table class="table table-striped table-hover ">
        <thead >
            <tr class="active">
                <th>#</th>
<!--                <th>Invigilator</th>-->
                <th>Exam</th>
                <th>Timings</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $serial=1;
    while ($stmt2->fetch()) {
        $s=$serial%2;
        if($s == 0)
        {
        ?>
            <tr class="info" >
    <?php }else {?>
            <tr class="success">
                    <?php }?>
                    <td><?php echo $serial;?></td>
<!--                    <td><?php echo $username;?></td>-->
                    <td><?php echo $papername;?></td>
                    <td><?php echo $start_time;?></td>
                    <td><?php echo $duration;?></td>
                </tr>

        <?php
        $serial = $serial + 1;
    }
    ?>
        </tbody>
    </table>
            <?php
            $stmt2->close();
        } else {
            ?><br>
    <div> no Upcoming Tests</div>
    <?php
    echo "</div>";
}

?>

