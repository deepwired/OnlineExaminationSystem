<?php
session_start();


// $_SESSION['tempgid']=$_POST['gid'];
// $_SESSION['temppid']=$_POST['pid'];
 
include '../../includes/database_connect.inc.php';
$stmt = $con->prepare("SELECT a.name,a.description,(select b.name from groups "
        . "b where a.parent_group_id=b.id) as parent FROM groups a where id =".$_POST['gid']." ");
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($gname, $gdescription, $gparent);
    $stmt->fetch();
    ?>
<div class="col-lg-12" align="center">
        
        <div ><h3><i class="fa fa-list-alt"> </i> Group Information </h3></div>
        <br>
            <h4>
        <b>Name</b> <br><?php echo $gname; ?><br>
        <br>
        <b>Description</b> <br><?php echo $gdescription; ?><br>
        <br>
        <b>Parent Group</b><br>
         <?php
        if ($gparent!=null) {
            echo $gparent;
        } else {
            echo "No Parent Group";
        }
        ?>
        </h4>
        <br>
        
        <br>
        <button class="btn btn-lg btn-info btn-raised" onClick="goBack()"><i class="fa fa-caret-square-o-up"></i> Go Back</button>
    </div>
    </div>
        <?php
        $stmt->close();
    }
    ?>