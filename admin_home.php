<?php
include './includes/database_connect.inc.php';
include './includes/cssheaders.inc.php';

session_start();
?>
<body style="background-color: #000">

    <div class="row" style='background-color: #227356;color: white'>
        <div class="col-lg-4"></div>       
        <div class="col-lg-4" align='center'><h1><b>Welcome Admin</b></h1></div>
        <div class="col-lg-4"></div>
    </div>

    <div class="row" style="margin-top: 50px;">
        <div class="col-lg-12">
            <div class="container">
                <div class=" col-lg-4" id="data-data">
                    <div id="main-btns">
                        <button class="btn btn-lg btn-material-teal-500" onClick="assignRoles()"><i class="fa fa-plus-circle"></i> Assign Roles </button>
                        <br><br>
                        <button class="btn btn-lg btn-material-teal-500" onClick="viewSuggestions()"><i class="fa fa-minus-circle"></i> View Suggestions </button>                
                        <br><br>
                        <a href="logout.php" class="btn btn-default btn-material-deep-orange-A400">Logout</a>
                    
                    </div>
                    <div hidden id="other">
                        <div id="role_assign_search">
                            <div class="well" >
                                <div class="input-control" style = "margin-top: 50px;">
                                    <span class="input-group-addon" id="sizing-addon2">Enter User Name</span>
                                    <input type="text" id ="name" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
                                </div>

                                <div class="input-control" style = "margin-top: 50px;">
                                    <span class="input-group-addon" id="sizing-addon2">Enter Role type</span>
                                    <select class="btn btn-default recs col-lg-12" id="role_select">
                                        <option value="all" selected="selected">Select a role</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Supervisor</option>
                                        <option value="3">Invigilator</option>
                                        <option value="4">Applicant</option>
                                        <option value="5">Undefined</option>
                                    </select>
                                </div>
                                <div id="sandbox-container ">
                                    <input class="form-control datepicker datepicker-dropdown dropdown-menu datepicker-orient-left datepicker-orient-top" type="text" />
                                </div>
                                <div align="center" style = "margin-top: 50px;margin-bottom: 50px;">
                                    <button type="submit" class="btn btn-default btn-material-teal-500" onclick="onClickDisplayUser()" style="margin-top: 10px;">Search</button>
                                    <button onclick="backToHome()" class="btn btn-default btn-material-deep-orange-A400">Back</button>
                                    <a href="logout.php" class="btn btn-default btn-material-deep-orange-A400">Logout</a>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="well col-lg-7" style="height: 500px;overflow-y: auto" id="data-list">
                    <div hidden id="group-info"></div>
                    <div hidden id="suggestion-info"></div>
                    <div hidden id="user-info"></div>

                </div>
            </div>
        </div>
    </div>


    <?php
    include './includes/jsheaders.inc.php';
    ?>

    <script>

        $(document).ready(function()
        {
            loadGroupInfo();
        });

        function assignRoles()
        {
            $('#main-btns').delay(500).fadeOut(500);
            $('#other').delay(500).fadeIn(500);
            onClickDisplayUser();
        }

        function onClickDisplayUser()
        {
            //var user_name;
            //alert($('#name').val());
            if ($('#name').val() != '')
                var user_name = $('#name').val()
            else
                var user_name = "null";
            var user_role = $('#role_select').val()
            $.ajax({
                method: "POST",
                url: "functions/load_users.php",
                data: {'name': user_name, 'role': user_role},
                success: function(data)
                {
                    $('#suggestion-info').delay(500).fadeOut(500);
                    $('#group-info').delay(500).fadeOut(500);
                    $("#user-info").html(data);
                    $('#user-info').delay(500).fadeIn(500);
                }
            });
        }

        function viewSuggestions()
        {
            //$('#roles-table').delay(500).fadeOut(500);
            $.ajax({
                method: "POST",
                url: "functions/load_suggestion_list.php",
                success: function(data)
                {
                    $('#group-info').delay(500).fadeOut(500);
                    $('#user-info').delay(500).fadeOut(500);
                    $("#suggestion-info").html(data);
                    $('#suggestion-info').delay(500).fadeIn(500);
                }
            });

        }

        function loadGroupInfo()
        {
            $.ajax({
                method: "POST",
                url: "functions/load_group_list.php",
                success: function(data)
                {
                    $('#suggestion-info').delay(500).fadeOut(500);
                    $('#user-info').delay(500).fadeOut(500);
                    $("#group-info").html(data);
                    $('#group-info').delay(500).fadeIn(500);
                }
            });
        }

        function backToHome()
        {
            $('#other').delay(500).fadeOut(500);
            $('#user-info').delay(500).fadeOut(500);
            $('#main-btns').delay(500).fadeIn(500);
            $('#group-info').delay(500).fadeIn(500);
        }


    </script>

</body>
</html>