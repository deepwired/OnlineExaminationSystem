<?php
try {
    include '../includes/database_connect.inc.php';
    $query = "select g.name , u.name , g.description ,  date_format(g.time,'%D ' '%b ' '%Y' ) from groups g , user u where g.creator_id = u.id;";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($group_name, $creator_name, $group_des , $time);
    //$stmt->fetch();
    //echo $stmt->num_rows;
    if ($stmt->num_rows > 0) {
        $i = 1;
        ?>
        <div class="list-group" id="groups-list">

            <?php
            while ($stmt->fetch()) {
                $i++;
                ?>
                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="mdi-file-folder"></i>
                    </div>
                    <div class="row-content">
                        <h4 class="list-group-item-heading"><?php echo $group_name; ?> <div align='right'> By <?php echo $creator_name;?></div> </h4>
                        <div align='right'><?php echo $time;?></div>
                        <p class="list-group-item-text"><?php echo $group_des; ?></p>
                    </div>
                </div>
                <div class="list-group-separator"></div>

                <?php
            } //end of while
            ?>
        </div>
        <?php
    }
} catch (PDOException $e) {
    echo "Error Occured,please Try again later";
    echo "Error: " . $e->getMessage();
}
$stmt->close();
?>