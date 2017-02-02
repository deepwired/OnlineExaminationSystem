<?php
session_start();
include '../../../includes/database_connect.inc.php';
?>



<?php
if (array_key_exists('topic', $_POST)) {
    $t = $_POST['topic'];
    $s = $_POST['sugg'];
    $ts = $t . " : " . $s;
    $stmt3 = $con->prepare("insert into user_interaction values(''," . $_SESSION['id'] . ",?,0,0,now())");
    $stmt3->bind_param("s", $ts);
    $stmt3->execute();
    if ($stmt3->affected_rows > 0) {
        echo "<h3 style='color:black'>Your Suggession has been sent to the admin</h3>";
    } else {
        echo "<h3 style='color:black'>Some Error Occured while registering your suggession</h3>";
    }
} else {
    ?>

    <br><br><br><br>
    <div class="col-lg-2"></div>
    <div align="center" class="col-lg-8">

        <input type="input" class="input-lg form-control" id="topic" placeholder="Enter Topic ">
        <span style="color:red" id="rtopic"></span>

        <br>

        <div class="form-control-wrapper" rows="3" >
            <textarea class="form-control empty" rows="3" id="sugg"></textarea>
            <div class="floating-label">Enter Sugession Here</div>
            <span class="material-input"></span>
        </div>

        <span style="color:red" id="rsugg"></span>

        <br>
    </div>
    <div class="col-lg-2"></div>    

    <button class="btn btn-material-teal-500" onClick="submitSuggession()">Submit Suggession</button>


    <script>
        function submitSuggession()
        {
            flag = 0;
            topic = $('#topic').val();
            sugg = $('#sugg').val();
            if (topic == "")
            {
                flag = 1;
                $('#rtopic').html("Topic cannot be empty");
            }
            if (sugg == "")
            {
                flag = 1;
                $('#rsugg').html("Suggession cannot be empty");
            }
            if (flag == 0)
            {
                $.ajax({
                    url: "functions/applicant/settings/submit_suggession.php",
                    type: "post",
                    data: {'topic': topic, 'sugg': sugg},
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
