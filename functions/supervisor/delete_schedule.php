<?php
session_start();
include '../../includes/database_connect.inc.php';

if(array_key_exists('id',$_REQUEST))
{
    //$stmt = $con->prepare("delete from question where question_paper_id = ".$_POST['id']);
        //$stmt->bind_param("sss", $gname, $gdesc, $pgid);
    //$stmt->execute();
    
 
    $stmt = $con->prepare("delete from schedule where id = ".$_POST['id']);
        //$stmt->bind_param("sss", $gname, $gdesc, $pgid);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Schedule has been Deleted";
        } else {
            echo "Sorry, This Schedule has already been attempted by some students, deleting is prohibited";
        }
}
else {
    

?>
    <div class="row" align="center">
        Select an Exam Paper to Delete
        <?php
        $stmt2 = $con->prepare("select s.id,(select name from groups where id=s.group_id) as gname,(select name from question_paper where id=s.question_paper_id) as qpname from schedule s");
        $stmt2->execute();
        $stmt2->store_result();
        if ($stmt2->num_rows > 0) {
            ?>
            <select class="btn btn-white btn-block dropdown-toggle" id="schedule_id_to_delete">
                <option value="0">Select an Exam</option>
                <?php
                $stmt2->bind_result($id, $gname,$qpname);
                while ($stmt2->fetch()) {
                    echo "<option value='$id'>$gname -> $qpname</option>";
                }
                echo "</select>";
                $stmt2->close();
            } else {
                ?>
                <select class="btn btn-white dropdown-toggle" id="schedule_id_to_delete">
                    <option value="0">No Schedules Present</option>
                </select>
                <?php
            }
            ?>
    </div><br><br>
    <div class="row">
        <button class="btn btn-lg btn-material-teal-500" onClick="deleteSchedule()">delete</button><br>                      
        <button class="btn btn-lg btn-material-deep-orange-A400" onClick="cancelButtonDeleteSchedule()">back</button>
    </div>
</div>
<?php 
}
?>
<script>
function deleteSchedule()
{
    $.ajax({
                url: "functions/supervisor/delete_schedule.php",
                type: "post",
                async:false,
                data: {'id':$('#schedule_id_to_delete').val()},
                success: function (data)
                {
                    alertify.log(data);
                    $('#delete_schedules_view').fadeOut(500);
                    $('#create_delete_schedules_buttons').delay(500).fadeIn(500);
                }
            });
            LoadUpdate_Schedule_List();
}
function cancelButtonDeleteSchedule()
{
     $('#delete_schedules_view').fadeOut(500);
     $('#create_delete_schedules_buttons').delay(500).fadeIn(500);
}
</script>