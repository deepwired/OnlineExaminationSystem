<?php
session_start();
include '../../../includes/database_connect.inc.php';

//{'qpid':qpid,'sid':sid},

$query = "  select g.name from groups g , user_group ug where ug.user_id=" . $_SESSION['id'] . " and ug.group_id=g.id;";
//echo $query;
$stmt = $con->prepare($query);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    //$serial = 1;
    ?>
    <div style="height:150px;overflow-y: auto;">
    <?php
    $stmt->bind_result($name);
    while ($stmt->fetch()) {
        ?>
        <div class="col-lg-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $name;?></h3>
                </div>
            </div>

        </div>
        <?php } ?>
    </div>
<?php

    }
?>
