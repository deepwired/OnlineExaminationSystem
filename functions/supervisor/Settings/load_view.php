<?php
session_start();
?>

<div class="row" style="color:white"><h2>Settings</h2>  </div>
<div class="well col-lg-3">
  
<br><br>
    
<button class="btn btn-block btn btn-material-blue-grey-900" onClick="changePassword()">Change Password</button>
<br><br>
<button class="btn btn-block btn btn-material-blue-grey-700" onClick="submitSuggession()">Submit Suggestion</button>
<br><br>
<a href="aboutUs.php" target="_blank" class="btn btn-block btn btn-material-blue-grey-700">About Us</a>
<br><br>
<a href="logout.php" class="btn btn-block btn btn-material-blue-grey-900">Logout</a>
</div>

<div class="col-lg-1">
    
</div>
<div id="area"  class="well col-lg-8" style="color:black;height:422px;overflow-y: auto;">
    <h2>Welcome To Exam Portal</h2>
</div>

<script>
    function changePassword()
    {
        $.ajax({
                url: "functions/supervisor/Settings/change_password.php",
                type: "post",
                success: function(data)
                {
                    $('#area').html(data);
                }
            });
    }    
    function submitSuggession()
    {
        $('#area').empty();
        $.ajax({
                url: "functions/applicant/settings/submit_suggession.php",
                type: "post",
                success: function(data)
                {
                    $('#area').html(data);
                }
            });
    }
</script>