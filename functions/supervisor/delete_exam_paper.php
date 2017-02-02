<?php
session_start();
include '../../includes/database_connect.inc.php';

if(array_key_exists('id',$_REQUEST))
{
    //$stmt = $con->prepare("delete from question where question_paper_id = ".$_POST['id']);
        //$stmt->bind_param("sss", $gname, $gdesc, $pgid);
    //$stmt->execute();
    
 
    $stmt = $con->prepare("delete from question_paper where id = ".$_POST['id']);
        //$stmt->bind_param("sss", $gname, $gdesc, $pgid);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Question paper along with all its data has been deleted";
        } else {
            echo "Sorry, This Paper has a Schedule associated with it";
        }
}
else {
    

?>
    <div class="row" align="center">
        Select an Exam Paper to Delete
        <?php
        $stmt2 = $con->prepare("select id,name from question_paper");
        $stmt2->execute();
        $stmt2->store_result();
        if ($stmt2->num_rows > 0) {
            ?>
            <select class="btn btn-white btn-block dropdown-toggle" id="exam_id_to_delete">
                <option value="0">Select an Exam</option>
                <?php
                $stmt2->bind_result($id, $name);
                while ($stmt2->fetch()) {
                    echo "<option value='$id'>$name</option>";
                }
                echo "</select>";
                $stmt2->close();
            } else {
                ?>
                <select class="btn btn-white dropdown-toggle" id="exam_id_to_delete">
                    <option value="0">No Exams Present</option>
                </select>
                <?php
            }
            ?>
    </div><br><br>
    <div class="row">
        <button class="btn btn-lg btn-warning" onClick="deleteExam()">delete</button><br>                      
        <button class="btn btn-lg btn-default" onClick="cancelButtonDeleteExam()">back</button>
    </div>
</div>
<?php 
}
?>
<script>
function deleteExam()
{
    $.ajax({
                url: "functions/supervisor/delete_exam_paper.php",
                type: "post",
                data: {'id':$('#exam_id_to_delete').val()},
                success: function (data)
                {
                    alertify.log(data);
                    $('#delete_exam').fadeOut(500);
                    $('#create_delete_exams').delay(500).fadeIn(500);
                }
            });
}
function cancelButtonDeleteExam()
{
     $('#delete_exam').fadeOut(500);
     $('#create_delete_exams').delay(500).fadeIn(500);
}
</script>