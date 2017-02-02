<?php
    include '../../includes/database_connect.inc.php';
?>
<div class="col-lg-2"></div>
            <div class="col-lg-8" align="center">
                <div class="row" align="center">
                    <?php
                    $stmt2 = $con->prepare("select id,name from question_paper");
                    $stmt2->execute();
                    $stmt2->store_result();
                    if ($stmt2->num_rows > 0) {
                        ?>
                         <i class="fa fa-file-text"></i><select class="btn btn-default form-control dropdown-toggle" id="parent_group">
                            <option value="0">Select a Question Paper</option>
                            <?php
                            $stmt2->bind_result($id, $name);
                            while ($stmt2->fetch()) {
                                echo "<option value='$id'>$name</option>";
                            }
                            echo "</select>";
                            $stmt2->close();
                        } else {
                            ?>
                            <select class="btn btn-default dropdown-toggle" id="parent_group">
                                <option value="0">Kindly Create a Question Paper First</option>
                            </select>
                            <?php
                        }
                        ?>
                </div>
                <!--date time picker -->
                <div class="row" align="center">
                    <?php
                    $stmt2 = $con->prepare("select id,name from groups");
                    $stmt2->execute();
                    $stmt2->store_result();
                    if ($stmt2->num_rows > 0) {
                        ?>
                        <i class="fa fa-group"></i><select class="btn btn-default dropdown-toggle" id="schedule_parent_group">
                            <option value="0">Select a Group</option>
                            <?php
                            $stmt2->bind_result($id, $name);
                            while ($stmt2->fetch()) {
                                echo "<option value='$id'>$name</option>";
                            }
                            echo "</select>";
                            $stmt2->close();
                        } else {
                            ?>
                            <select class="btn btn-default dropdown-toggle" id="schedule_parent_group">
                                <option value="0">Kindly Create a Question Paper First</option>
                            </select>
                            <?php
                        }
                        ?>
                </div>
                <br>
                <div class="row" align="center">
                    <span class="label label-primary">Start Date </span>
                        <div class="form-group">
                        <div class='input-group date'  id='datetimepicker6'>
                            <input type='text' onkeydown="return false" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row" align="center">
                    End Date <div class="form-group">
                        <div class='input-group date'  id='datetimepicker7'>
                            <input type='text' onkeydown="return false" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row" align="center">

                    <br>
                    <i class="fa fa-2x fa-clock-o"></i><br>Hours:<div class="input-group number-spinner">
                        <span class="input-group-btn data-dwn">
                            <button class="btn btn-default btn-info" id='decrease_hours' data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                        </span>
                        <input class="form-control text-center" value="1" id='duration_hours' type="text">
                        <span class="input-group-btn data-up">
                            <button  class="btn btn-default btn-info" id='increase_hours' data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                        </span>
                    </div>
                    <div class='error-text' id='rdh'></div>
                    Minutes:<br><div class="input-group number-spinner">
                        <span class="input-group-btn data-dwn">
                            <button class="btn btn-default btn-info" id='decrease_minutes' ><span class="glyphicon glyphicon-minus"></span></button>
                        </span>
                        <input class="form-control text-center" value="0" id='duration_minutes' type="text">
                        <span class="input-group-btn data-up">
                            <button  class="btn btn-default btn-info" id='increase_minutes'><span class="glyphicon glyphicon-plus"></span></button>
                        </span>
                    </div>
                    <button onClick="#" class="btn btn-lg btn-warning"> Schedule The Test </button>
                </div></div>

<script>
      $(document).ready(function () {
            
        $('#schedule_parent_group').change(function () {
            
            $('#selectedGroupSchedule').hide();
            gid = $('#schedule_parent_group').val();
            $.ajax({
                url: "functions/supervisor/load_group_schedule.php",
                type: "post",
                data: {'gid': gid},
                success: function (data)
                {
                    $('#selectedGroupSchedule').html(data);
                    $('#selectedGroupSchedule').delay(500).fadeIn(500);
                }
            });    
         });
     });
    </script>