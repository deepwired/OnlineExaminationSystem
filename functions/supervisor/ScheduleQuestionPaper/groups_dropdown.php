<?php

session_start();
include '../../../includes/database_connect.inc.php';

$stmt2 = $con->prepare("select id,name from groups");
$stmt2->execute();
$stmt2->store_result();
if ($stmt2->num_rows > 0) {
    ?>
    <i class="fa fa-group"></i><select class="btn btn-default dropdown-toggle" id="schedule_group">
        <option value="0">Select a Group</option>
        <?php

        $stmt2->bind_result($id, $name);
        while ($stmt2->fetch()) {
            echo "<option value='$id'>" . substr($name, 0, 15) . "</option>";
        }
        echo "</select>";
        $stmt2->close();
    } else {
        ?>
        <select class="btn btn-default dropdown-toggle" id="schedule_group">
            <option value="0">Kindly Create a Question Paper First</option>
        </select>
        <?php

    }
?>
