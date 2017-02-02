<?php
session_start();
include '../../../includes/database_connect.inc.php';
?>



<?php
if(array_key_exists('op', $_POST))
{
    $op=$_POST['op'];
    $np=$_POST['np'];
    $stmt3 = $con->prepare("update user set password=? where id=".$_SESSION['id']." and password=?");
    $stmt3->bind_param("ss", md5($np),md5($op));
    $stmt3->execute();
    if ($stmt3->affected_rows > 0) 
    {
        echo "<h3 style='color:black'>Your Passoword has been changed Successfuly</h3>";
    }
    else
    {
        echo "<h3 style='color:black'>Password entered by you was incorrect</h3>";
    }
}
else
{
?>

<br>
    <div class="col-lg-12">
    <legend class="col-lg- 6">Current Password</legend>
    <input type="password" class="form-control col-lg- 6" id="op" placeholder="Enter Old Password">
    <span style="color:red" id="rop"></span>
    </div>
<br>
    <div class="col-lg-12">
    <legend  class="col-md- 6">New Password</legend>
    <input type="password" class=" form-control col-md- 6" id="np" placeholder="Enter New Password">
    <span style="color:red" id="rnp"></span>
    </div>
<br>
<div class="col-lg-12">
    <legend  class="col-md- 6">Confirm New Password</legend>
    <input type="password" class="form-control col-md- 6" id="cnp" placeholder="Confirm New Password">
    <span style="color:red" id="rcnp"></span>
</div>
<br>
</div>
<br/>
<button class="btn btn-default btn-material-teal-500" onCLick="changePassword()">Change Password</button>

<script>
    function changePassword()
    {
        flag=0;
        op=$('#op').val();
        np=$('#np').val();
        cnp=$('#cnp').val();
        if(op=="")
        {
            flag=1;
            $('#rop').html("Please enter your original password");
        }
        if(np=="")
        {
            flag=1;
            $('#rnp').html("New Password cannot be blank");
        }
        if(cnp!=np)
        {
            flag=1;
            $('#rcnp').html("New passwords do not match");
        }
        if(flag==0)
        {
        $.ajax({
                url: "functions/supervisor/Settings/change_password.php",
                type: "post",
                data: {'np': np,'op':op},
                success: function(data)
                {
                   $('#area').html(data);
                }
            });
        }
    }
</script>
    
<?php
}
?>    
    