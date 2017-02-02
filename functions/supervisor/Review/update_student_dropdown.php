<?php
session_start();
include '../../../includes/database_connect.inc.php';

if($_POST['gid']==0)
{
    $query = "select id,name from user where role_id=4";
}
else
{   
    $query = "select id,name from user where role_id=4 and id in (select user_id from user_group where group_id=". $_POST['gid'].")";
}
$stmt = $con->prepare($query);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    ?>
        <select class="btn btn-default btn-block form-control  dropdown-toggle" id="review_user_id">
        <option value="0">All Applicants</option>
        <?php
        $stmt->bind_result($id, $name);
        while ($stmt->fetch()) {
            echo "<option value='$id'>" . substr($name, 0, 15) . "</option>";
        }
        echo "</select>";
        
        $stmt->close();
    }
    else
    {
        echo "No Results were obtained for the given paramerts";
    }        
?>