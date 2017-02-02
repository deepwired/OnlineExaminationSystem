<?php
session_start();
include '../../../includes/database_connect.inc.php';

//{'qpid':qpid,'sid':sid},

$query = " select * from user where id=" . $_SESSION['id'] . "";
//echo $query;
$stmt = $con->prepare($query);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    //$serial = 1;
    $stmt->bind_result($id, $role_id, $name, $password, $email, $phone, $time);
    while ($stmt->fetch()) {
        ?>
        <legend>Profile Information</legend>
        <div class="col-lg-3">
            <a href="#" class="thumbnail" >
                <img src="images/<?php echo $_SESSION['id']; ?>.jpg" height="400px;" alt="...">
            </a>
        </div>
        <div class="col-lg-9"><br/>
            <div class="form-group">
                <div class="col-lg-12">
                <label  class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                    <input class="form-control input-lg" readonly="true"   type="text" value ="<?php echo $name;?>" >
                </div>
                </div>
                <div class="col-lg-12">
                <label  class="col-lg-2 control-label">Email Id</label>
                <div class="col-lg-10">
                    <input class="form-control  input-lg" readonly="true" type="text" value ="<?php echo $email;?>" >
                </div>
                </div>
                <div class="col-lg-12">
                <label  class="col-lg-2 control-label">Phone</label>
                <div class="col-lg-10">
                    <input class="form-control  input-lg" readonly="true" type="text" value ="<?php echo $phone;?>" >
                </div>
                </div>
            </div>
        </div>
          <button class="btn btn-block" onClick="loadProfileGroups()">Groups that you are currently a Part Of (Refresh)</button>
           
        
        
        <?php
    }
} else
    
    ?>
