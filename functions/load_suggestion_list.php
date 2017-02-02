<?php
try {
    include '../includes/database_connect.inc.php';
    $query = " select u.name , ut.message , date_format(u.time,'%D ' '%b ' '%Y' ) as time from user u , user_interaction ut where ut.sender_id = u.id order by time desc;";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($sender_name, $message, $time);
    //$stmt->fetch();
    //echo $stmt->num_rows;
    if ($stmt->num_rows > 0) {
        $i = 1;
        ?>
        <div class="list-group" id="suggestion-list">

            <?php
            while ($stmt->fetch()) {
                $i++;
                ?>
                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="mdi-file-folder"></i>
                    </div>
                    <div class="row-content">
                        <h4 class="list-group-item-heading"><?php echo $sender_name; ?></h4>
                        <p class="list-group-item-text"><?php echo $message; ?></p>
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