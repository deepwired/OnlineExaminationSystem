<?php
session_start();
include '../../includes/database_connect.inc.php';
?>


<?php
$stmt = $con->prepare("select * from question_paper");
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    echo "<div class=''>";
    $serial = 1;
    $stmt->bind_result($id, $user_id, $name, $description, $time);
    while ($stmt->fetch()) {
        ?>

        <?php
//        echo '   <div class="panel-group" id="accordion">
//                                    <div class="panel panel-default">
//                                        <div class="panel-heading">';
            echo '<h4 class="panel-title">';
            echo '<div class="row"><div class="col-lg-12"><button type="button " class="list-group-item" style="border:none;color:teal;" id="e'.$id.'" onclick="onClickExamItem('.$id.','.$user_id.')"><b> '.$serial.'. '. $name .'</b></button></div>';       
                               
                  
        $serial++;        
            //echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$serial.'">';       
            echo '</h4></div></div>';
        }
        echo "</div>";
        echo "</div>";
        ?>
        <?php
    }
 else {
    ?>
<legend> No Exams Exist as of now, Kindly create a Exam </legend>
    <?php
}
$stmt->close();
?>