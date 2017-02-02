<html>
    <head>
        <title>Exam Portal</title>
        <link href='../css/bootstrap.css' rel='stylesheet'>
        <link href="../css/plugins.css" rel="stylesheet">
        <link href="../css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/plugins/bootstrap-datepicker/datepicker3.css" rel="stylesheet">
        <link href='../css/style.css' rel='stylesheet'>

        <!--<link href="../icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">-->

        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">        
        <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
        <link href="../css/plugins/datatables/datatables.css" rel="stylesheet">

    </head>

    <body class="title-back-color">
        <?php
        include '../includes/database_connect.inc.php';
        session_start();
        $_SESSION['name'] = "Kinnary";
        ?>

        <div class="row" style='background-color: #227356;color: white'>
            <div class="col-lg-4"></div>       
            <div class="col-lg-4" align='center'><h1><b>Welcome <?php echo $_SESSION['name']; ?></b></h1></div>
            <div class="col-lg-4"></div>
        </div>

        <div class="row" style="margin-top: 50px;">
            <div class="col-lg-12">
                <!--*******************************************************************************-->
                <!--**************************SEARCH DIV*******************************************-->
                <!--*******************************************************************************-->
                <div class="container">
                    <div class="well col-lg-4 ">
                        <div class="" >
                            <div class="input-control" style = "margin-top: 50px;">
                                <span class="input-group-addon" id="sizing-addon2">Enter User Name</span>
                                <input type="text" id ="name" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
                            </div>

                            <div class="input-control" style = "margin-top: 50px;">
                                <span class="input-group-addon" id="sizing-addon2">Enter Role type</span>
                                <input type="text" id ="name" class="form-control" placeholder="Role" aria-describedby="sizing-addon2">
                            </div>
                            <!--<div id="sandbox-container ">
                                                        <input class="form-control datepicker datepicker-dropdown dropdown-menu datepicker-orient-left datepicker-orient-top" type="text" />
                                                    </div>-->

                            <div align="center" style = "margin-top: 50px;margin-bottom: 50px;">
                                <button type="submit" class="btn btn-default" onclick="onClickDisplayUser()" style="margin-top: 10px;">Search</button>
                            </div>

                        </div>
                    </div>
                    <!--*******************************************************************************-->
                    <!--*******************************************************************************-->
                    <div class="col-lg-1"></div>
                    <div class="well col-lg-7">
                        <div class="">
                            <div class="row">
                                <div id = "table_info"></div>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.portlet-body -->
                    </div>
                    <!-- /.portlet -->

                </div>
                <!-- /.col-lg-12 -->

            </div>
            <!-- /.row -->
        </div>


        <script src='../js/jquery.min.js'></script>
        <script src='../js/bootstrap.js'></script>
        <script src="../js/sweetalert.min.js"></script>
        <script>

                                    $(document).ready(function ()
                                    {
                                        onClickDisplayUser();
                                    });
                                    function onClickDisplayUser()
                                    {
                                        //var user_name;
                                        //alert($('#name').val());
                                        if ($('#name').val() != '')
                                            var user_name = $('#name').val()
                                        else
                                            var user_name = "null";
                                        $.ajax({
                                            method: "POST",
                                            url: "functions/load_users.php",
                                            data: {'name': user_name},
                                            success: function (data)
                                            {
                                                $("#table_info").html(data);
                                            }
                                        });
                                    }


        </script>

    </body>
</html>