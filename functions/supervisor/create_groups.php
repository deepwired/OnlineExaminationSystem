<?php
session_start();


try {
    include '../../includes/database_connect.inc.php';
    if (array_key_exists('gd', $_POST) && array_key_exists('gn', $_POST)) {

        $gname = htmlspecialchars($_POST["gn"]);
        $gdesc = htmlspecialchars($_POST["gd"]);
        $pgid  = htmlspecialchars($_POST["pg"]);
        
//$password=$_POST["npa"];
        
        $stmt2 = $con->prepare("insert into groups VALUES (default," . $_SESSION['id'] . ",?,?,?,0,now())");
        $stmt2->bind_param("sss", $gname, $gdesc, $pgid);
        $stmt2->execute();
        ?>
        
        <?php
        if ($stmt2->affected_rows > 0) {
            echo "true";
        } else {
            echo "Sorry Group Could not be Created";
        }
        
        $stmt2->close();
    }
    else if(array_key_exists('delete', $_POST))
    {
        $stmt = $con->prepare("delete from groups where id = ".$_POST['gid']);
        //$stmt->bind_param("sss", $gname, $gdesc, $pgid);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "true";
        } else {
            echo "Sorry Group Could not be Deleted";
        }
    }
        else {
        ?>

        <div class="col-lg-12">
            <div class="row">
                <div align="center" id="cgbtn">
                    <br><br><br><br>
                    <button class="btn btn-lg btn-default  btn-material-teal-600" onClick="startCreateGroup()"><i class="fa fa-plus-circle"></i> Create a Group </button>
                    <br><br>
                    <button class="btn btn-lg btn-default  btn-material-teal-600" onClick="startDeleteGroup()"><i class="fa fa-minus-circle"></i> Delete a Group </button>                
                </div>
                
                <div id="group_name">
                <br><br><br><br>
                    <div class="row">
                        <input id="gn" style="color:white" type="text" class="btn-block input-lg form-control" placeholder="Enter Group Name"><br>
                        <span class="error-text" id="rgn"></span>
                    </div>
                    <br><br>
                    <div class="row">
                        <?php
                        $stmt2 = $con->prepare("select id,name from groups where parent_group_id=0");
                        $stmt2->execute();
                        $stmt2->store_result();
                        if ($stmt2->num_rows > 0) {
                            ?>
                            <select class="btn btn-white btn-block dropdown-toggle" id="parent_group">
                                <option value="0">No Parent Group</option>
                                <?php
                                $stmt2->bind_result($id, $name);
                                while ($stmt2->fetch()) {
                                    echo "<option value='$id'>$name</option>";
                                }
                                echo "</select>";
                                $stmt2->close();
                            } else {
                                ?>
                           <select class="btn btn-white dropdown-toggle" id="parent_group">
                                <option value="0">No Parent Group</option>
                           </select>
                                <?php
                                }
                            ?>
                    </div><br><br>
                    <div class="row">
                        <button class="btn btn-lg  btn-material-teal-500" onClick="nextCreateGroup()">next</button><br>                      
                        <button class="btn btn-lg btn-material-deep-orange-A400" onClick="cancelButton()">back</button>
                    </div>
                </div>
                <div id="group_description">
                    
                    <br><br><br><br>
                    <div class="row">
                        <div class="form-control-wrapper">
                            <textarea style="color:#ffffff"  id="gd" class="form-control empty"></textarea>
                            <div class="floating-label">
                                Enter Group Description
                            </div>
                            <span class="material-input"></span>
                        </div>
                        <span class="error-text" id="rgd"></span>
                    </div>
                    <br><br>
                    <div class="row">
                        <button class="btn btn-lg btn-material-teal-500" onClick="createGroup()">Create the Group</button><br>
                        <button class="btn btn-lg btn-material-deep-orange-A400" onClick="backcreateButton()">back</button>
                    </div>
                </div>
                <!-- End of Create A Group -->
                <!-- Start of Delete A Group -->
                <div id="dgroup_name">
                <br><br><br><br>
                   
                    <div class="row">
                        
                        
                        <div class="alert alert-dismissable alert-info">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>NOTE:</strong> A parent group can be deleted only when all child groups are deleted
                        
                            </div>
                        
                        
                        <?php
                        $stmt2 = $con->prepare("select id,name from groups where id not in (select distinct parent_group_id from groups)");
                        $stmt2->execute();
                        $stmt2->store_result();
                        if ($stmt2->num_rows > 0) {
                            ?>
                            <select class="btn btn-white btn-block dropdown-toggle" id="delete_group_list">
                                <option value="0">Select Group To Delete</option>
                                <?php
                                $stmt2->bind_result($id, $name);
                                while ($stmt2->fetch()) {
                                    echo "<option value='$id'>$name</option>";
                                }
                                echo "</select>";
                                $stmt2->close();
                            } else {
                                ?>
                           <select class="btn btn-white dropdown-toggle" id="delete_group_list">
                                <option value="0">No Groups Exists</option>
                           </select>
                                <?php
                                }
                            ?>
                                <span class="error-text" id="rdeletegroup"></span>
                    </div><br><br>
                    <div class="row">
                        <button class="btn btn-lg btn-material-teal-500" onClick="deleteGroup()">Delete</button><br>
                        <button class="btn btn-lg btn-material-deep-orange-A400" onClick="cancelButton()">Cancel</button>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }
} catch (PDOException $e) {
    echo "Error Occured,please Try again later";
    echo "Error: " . $e->getMessage();
}
?>