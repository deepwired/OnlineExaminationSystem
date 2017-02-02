<div align="center" style="position: static"><h3><i class="fa fa-group"></i>Eligible for Group</h3><br></div>

<?php
session_start();


//$_POST['tempgid'];
//$_POST['temppid'];
include '../../includes/database_connect.inc.php';

if ($_POST['pid'] != 0) {
    $stmt = $con->prepare("select u.id,u.name from user u where u.role_id = 4 and u.id in (select user_id from user_group where group_id = " . $_POST['pid'] . ") and u.id not in (select user_id from user_group where group_id =" . $_POST['gid'] . ")");
} else {
    $stmt = $con->prepare("select u.id,u.name from user u where u.role_id = 4 and u.id not in (select user_id from user_group where group_id =" . $_POST['gid'] . ")");
}

//echo "select u.id,u.name from user u where u.role_id = 4 and u.id in (select user_id from user_group where group_id = ".$_POST['temppid'].") and u.id not in (select user_id from user_group where group_id =".$_POST['tempgid'].")";
//echo "select u.id,u.name from user u where u.role_id = 4 and u.id in (select user_id from groups where id = ".$_POST['temppid'].") and uid not in (select user_id from groups where id =".$_POST['tempgid'].")";
//if temp pid is set
//get all applicants who are a part of the temppid, and not a part of the tempgid
//else
//get all applicants who are a part of the 0 group id, and not a part of the tempgid

$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $serial = 1;
    $stmt->bind_result($appid, $appname);
    while ($stmt->fetch()) {
        ?>
        <div align="left" class = "checkbox">
            <label>
                <input class ="addkaro" type = "checkbox" name="add[]" value="<?php echo $appid; ?>"><span class = "checkbox-material"></span> <?php echo $appname; ?>
            </label>
        </div>
        <?php
        //echo "<input class='addkaro' type='checkbox' name='add[]' value='" . $appid . "'/>" . " " . $appname . "<br>";

        $serial++;
        ?>
        <?php
    }
} else {
    ?>
    <fieldset>
        <label> There are no more elligible students for this group, (If Child Group Make sure that the parent group has Students) . </label>
    </fieldset>
    <?php
}
$stmt->close();
?>
