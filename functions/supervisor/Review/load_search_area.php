<?php

session_start();
include '../../../includes/database_connect.inc.php';

$query = "select id,name from groups";
$stmt = $con->prepare($query);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    ?>
    <div id="group_list_review">
    <select class="btn btn-default btn-block btn-material-teal-50 form-control  dropdown-toggle" id="review_group_id">
        <option value="0">All Groups</option>
        <?php
        $stmt->bind_result($id, $name);
        while ($stmt->fetch()) {
            echo "<option value='$id'>" . substr($name, 0, 15) . "</option>";
        }
        echo "</select>";
        $stmt->close();
    echo "</div>";
    }
    else
    {
        echo "No Results were obtained for the given paramerts";
    }

$query = "select id,name from user where role_id=4";
$stmt = $con->prepare($query);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    ?>
        <div id="user_list_review">
        <select class="btn btn-default btn-block btn-material-teal-100 form-control  dropdown-toggle" id="review_user_id">
        <option value="0">All Applicants</option>
        <?php
        $stmt->bind_result($id, $name);
        while ($stmt->fetch()) {
            echo "<option value='$id'>" . substr($name, 0, 15) . "</option>";
        }
        echo "</select>";
        echo "</div>";
        $stmt->close();
    }
    else
    {
        echo "No Results were obtained for the given paramerts";
    }        
?>

        
        
        
        
        
        <button class="btn btn-default btn-block btn-material-teal-400" onClick="loadTableForReview()">Refresh</button>
        
        <a class="btn btn-default btn-block btn-material-teal-500" href="super2.php?gid=0&uid=0"  id="dam" target="_blank">Graphical</a>
        
        <a class="btn btn-default btn-block btn-material-teal-600"  id="down" href="download.php?gid=0&uid=0">Download</a>
        
        
        
        
        
        <br><br>
        
        
        <div class="well" style="color:black">
            <p>Select any combinition of groups and users to View the available reviews</p>
        <div>   
        
        <script>
            
    $(document).ready(function () {
            $( "#review_group_id" ).change(function() {
                 document.getElementById("dam").href="super2.php?gid="+$('#review_group_id').val()+"&uid="+$('#review_user_id').val();
                 document.getElementById("down").href="download.php?gid="+$('#review_group_id').val()+"&uid="+$('#review_user_id').val();
            gid = $('#review_group_id').val();
            $.ajax({
                url: "functions/supervisor/Review/update_student_dropdown.php",
                type: "post",
                data: {'gid': gid},
                success: function (data)
                {
                    $('#user_list_review').html(data);
                    //$('#selectedGroupSchedule').delay(500).fadeIn(500);
                }
            });
        });
        
            $( "#review_user_id" ).change(function() {
                document.getElementById("dam").href="super2.php?gid="+$('#review_group_id').val()+"&uid="+$('#review_user_id').val();
                document.getElementById("down").href="download.php?gid="+$('#review_group_id').val()+"&uid="+$('#review_user_id').val();
            });
    });
    
    function downloadData()
    {
        gid=$('#review_group_id').val();
        uid=$('#review_user_id').val();
        $.ajax({
                url: "download.php",
                type: "post",
                data: {'gid': gid},
                success: function (data)
                {
                    $('#user_list_review').html(data);
                    //$('#selectedGroupSchedule').delay(500).fadeIn(500);
                }
            });
    }
        </script>