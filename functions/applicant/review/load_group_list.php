<?php

session_start();
include '../../../includes/database_connect.inc.php';

$query = "select id,name from groups where id in (select group_id from user_group where user_id=" . $_SESSION['id'] . ")";
$stmt = $con->prepare($query);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    ?>
    <select class="btn btn-default btn-block btn-material-green-200 form-control  dropdown-toggle" id="review_group_id">
        <option value="0">All Groups</option>
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
        echo "You have not been assigned a Group Yet, Kindly wait";
    }
    
?>

        <button class="btn btn-default btn-block btn-material-blue-grey-900" onClick="refresh_review()">Refresh</button>
        
        <a class="btn btn-default btn-block btn-material-blue-grey-900" href="super2.php?gid=0"  id="dam" target="_blank">Show Graph</a>
        <br><br>
        <div class="well" style="color:black">
            <p>Individual Paper Reviews will be Available based on Selected Group</p>
        <div>   
        
        <script>
            
    $(document).ready(function () {
            $( "#review_group_id" ).change(function() {
                 document.getElementById("dam").href="super2.php?gid="+$('#review_group_id').val();
            });
        });
        </script>