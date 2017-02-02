<?php
session_start();
include '../../../includes/database_connect.inc.php';
?>
<?php
$stmt = $con->prepare("select * from groups g where g.parent_group_id = 0 and g.id in (select group_id from user_group where user_id =".$_SESSION['id'].")");
$stmt->execute();
$stmt->store_result();
echo '<h4 class="panel-title">';
        echo '<div class="row" align="left"><div class="col-lg-12 list-group-item" style="border:none;"><div class="col-lg-10"><a href="#2" id="g00" onclick="onClickGroupItem(0,0)"><b> ALL Groups </b></a></div>';       
         echo "</div><div></div></div>";
if ($stmt->num_rows > 0) {
    echo "<div >";
    $serial = 1;
    $stmt->bind_result($id, $creator_id, $name, $description, $parent_group_id, $group_type_id, $time);
    while ($stmt->fetch()) {
        ?>

        <?php
            echo '<h4 class="panel-title">';
            echo '<div class="row" align="left"><div class="col-lg-12 list-group-item" style="border:none;"><div class="col-lg-10"><a href="#2" id="g'.$id.'" onclick="onClickGroupItem('.$id.',\''.$name.'\')"><b> '.$serial.'. '. $name .'</b></a></div>';       

        $stmt2 = $con->prepare("select g.* from groups g where g.parent_group_id = $id and g.id in (select group_id from user_group where user_id=".$_SESSION['id'].")");
        $stmt2->execute();
        $stmt2->store_result();
        
        if ($stmt2->num_rows > 0) {
     
            echo '<div class="col-lg-1"><a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$serial.'">';       
            echo '<i class="mdi-action-assignment-returned"></i>
                          </a></h4></div>';
            echo ' <div id="collapse'.$serial.'" class="panel-collapse collapse collapse">
                                            <div class="panel-body">';
                                              
            echo "<div>";
            $serial2 = 1;
            $stmt2->bind_result($id2, $creator_id2, $name2, $description2, $parent_group_id2, $group_type_id2, $time2);
        
            while ($stmt2->fetch()) {
                 echo '<div class="row list-group-item" style="border:none;" align="left"><a type="button"  href="#" id="g'.$id2.'" onclick="onClickGroupItem('.$id2.',\''.$name2.'\')"><b><i class="mdi-navigation-arrow-forward"></i>'. $name2 . '</b></a></div>';
                $serial2++;
            }
            
            echo "</div>";
            echo '</div></div>';
        
    
        }
        else
        {
            //echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$serial.'">';       
            echo '</div></h4></div></div>';
        }
        
        $serial++;
        $stmt2->close();
        
        echo "</div>";
            
        }
        echo "</div>";
        
        ?>
        <?php
    }
 else {
    ?>
        <div onClick="refreshUserGroups()"> <br><br>You Have not been Allocated to Any Group as of Now<br>Kindly Wait<br>Or Click here to refresh</div>
    <?php
}
    $stmt->close();
?>