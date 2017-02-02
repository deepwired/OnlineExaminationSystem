<?php
session_start();
include '../../../includes/database_connect.inc.php';

if ($_POST['gname'] === '0') {
    //echo 'Here';
    $_POST['gname'] = 'All Groups';
}
?>
<?php
$groupName = $_POST['gname'];
$query = "SELECT s.*,q.name,q.description FROM `schedule` s , question_paper q where q.id=s.question_paper_id and "
        . "((start_time >= now() and end_time >= now()) or (start_time <= now() and end_time >= now()))"
        . " and s.group_id in (select group_id from user_group where user_id =" . $_SESSION['id'] . ") "
        . " and s.id not in (select schedule_id from scores where user_id = ".$_SESSION['id'].")";
//echo $query;
if (array_key_exists('gid', $_POST)) {
    if ($_POST['gid'] != 0) {
        $query = $query . " and s.group_id=" . $_POST['gid'] . "";
    }
}
$query = $query . "  order by s.start_time";
//echo $query;


$stmt = $con->prepare($query);
//echo $query;
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    echo '<div align="center">Schedule For ' . $groupName . ' </div>';
    echo '<table class="table table-striped table-hover">';
    echo '<tr><th class="info">Question Paper</th>';
    echo '<th class="info">Test Date</th>';
    echo '<th class="info">Test Time</th></tr>';

    $serial = 1;
    $stmt->bind_result($id, $creator_id, $question_paper_id, $group_id, $start_time, $end_time, $time, $attempt, $name, $description);
    while ($stmt->fetch()) {
        //echo $serial%2;
        if ($serial % 2 == 0)
            echo "<tr class = 'success'>";
        else
            echo "<tr>";
        $test_date = date("jS M Y", strtotime($start_time));
        $test_time = date("G:i:s", strtotime($start_time));
        ?>
        <td><?php echo $name; ?></td>
        <td><button class='btn btn-primary btn-flat  disabled btn-block' ><?php echo $test_date; ?></button></td> 

        <?php
        $st = date("d-m-Y h:i:sa", strtotime($start_time));
        $et = date("d-m-Y h:i:sa", strtotime($end_time));

        $currentTime = date('d-m-Y h:i:sa');
        if ($st <= $currentTime && $currentTime <= $et) { //
            ?>
            <td><form action="test.php" method="post">
                    <input type="submit" class='btn btn-flat btn-block btn-primary ' value ='Start The Test'>
                    <input type="hidden" name='question_paper_id' value="<?php echo $question_paper_id; ?>">
                    <input type="hidden" name='group_id' value="<?php echo $group_id; ?>">
                    <input type="hidden" name='schedule_id' value="<?php echo $id; ?>">
                    <input type="hidden" name='duration' value="<?php echo $time; ?>">
                    <input type="hidden" name='name' value="<?php echo $name; ?>">
                </form></td>                  
            <?php
        } else {
            ?>
            <td><button class='btn btn-primary btn-flat  disabled btn-block'><?php echo $test_time; ?></button></td>          
                <?php
            }
            ?>
        </tr>

        <?php
        $serial = $serial + 1;
    }
    echo "</table>";
} else {
    echo '<h3>Sorry No Schedule Available for this Group</h3>';
}
$stmt->close();
?>
</div>
