<div class='row'><h1>Help</h1></div>
<div style="color: black" align="center" class="well col-lg-3">   
    <h3> List of Topics </h3>
    <br>
    <button onClick='getGroupsHelp()' class="btn btn-block btn-material-blue-grey-900">Groups</button>

    <br>
    <button onClick='getExamsHelp()' class="btn btn-block btn-material-blue-grey-700">Exam Paper</button>


    <br>
    <button onClick='getSchedulesHelp()' class="btn btn-block btn-material-blue-grey-500">Schedule</button>


    <br>
    <button onClick='getReviewsHelp()' class="btn btn-block btn-material-blue-grey-700">Review</button>


    <br>
    <button onClick='geFAQ()' class="btn btn-block btn-material-blue-grey-900">FAQ's</button>
</div>

<div class="col-lg-1">

</div>

<div id="help_area" align='left' class="well col-lg-8" style="color:black;height:475px;overflow-y: auto;">
    <h3> Welcome to Online Examination Help Portal , Pick a Topic </h3>
</div>

<script>
    function getGroupsHelp()
    {
        $('#help_area').empty();
        $.ajax({
            url: "functions/applicant/help/groups.php",
            type: "post",
            success: function (data)
            {
                $('#help_area').html(data);
            }
        });
    }
    function getExamsHelp()
    {
        $('#help_area').empty();
        $.ajax({
            url: "functions/applicant/help/exams.php",
            type: "post",
            success: function (data)
            {
                $('#help_area').html(data);
            }
        });
    }
    function getSchedulesHelp()
    {
        $('#help_area').empty();
        $.ajax({
            url: "functions/applicant/help/schedules.php",
            type: "post",
            success: function (data)
            {
                $('#help_area').html(data);
            }
        });
    }
    function getReviewsHelp()
    {
        $('#help_area').empty();
        $.ajax({
            url: "functions/applicant/help/reviews.php",
            type: "post",
            success: function (data)
            {
                $('#help_area').html(data);
            }
        });
    }
    function geFAQ()
    {
        $('#help_area').empty();
        $.ajax({
            url: "functions/applicant/help/faq.php",
            type: "post",
            success: function (data)
            {
                $('#help_area').html(data);
            }
        });
    }
    

</script>    