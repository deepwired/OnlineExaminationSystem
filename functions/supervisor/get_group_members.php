
<div align="center" style="position: static"><h3><i class="fa fa-group"></i>Members of Group</h3><br></div>
<?php
session_start();
include '../../includes/database_connect.inc.php';


 //$gid=$_POST['gid'];
 //$pid=$_POST['pid'];


$stmt = $con->prepare("select u.id,u.name from user u where u.id in (select user_id from user_group where group_id =" . $_POST['gid'] . ")");
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $serial = 1;
    $stmt->bind_result($appid, $appname);
    while ($stmt->fetch()) {
        ?>
        <div class = "checkbox" align="left">
            <label>
                <input class ="removekaro" type = "checkbox" name="add[]" value="<?php echo $appid; ?>"><span class = "checkbox-material"></span> <?php echo $appname; ?>
            </label>
        </div>




        <?php
        //echo "<input class='removekaro' type='checkbox' name='add[]' value='" . $appid . "'/>" . " " . $appname . "<br>";

        $serial++;
        ?>
        <?php
    }
} else {
    echo "No Group Members as of now";
}
$stmt->close();
?>
