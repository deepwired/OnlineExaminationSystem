<?php
try {
    include '../../includes/database_connect.inc.php';
    $name = htmlspecialchars($_POST["name"]);
    //$name = $_POST["name"];
    if ($name != "null") {
        $stmt = $con->prepare("select * from user where name like %?%");
        $stmt->bind_param("s", $name);
    } else
    {
        $stmt = $con->prepare("select * from user");
    }


    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $role_id, $name, $pw, $email, $phone, $time);
    //$stmt->fetch();
    //echo $stmt->num_rows;
    if ($stmt->num_rows > 0) {
        ?>
        <div class = "table-responsive" style = "margin-top: 50px;">
            <table id = "example-table" class = "table table-striped table-bordered table-hover table-green">
                <thead>
                    <tr>
                        <th class="col-lg-3">Sr No</th>
                        <th class="col-lg-3">Name</th>
                        <th class="col-lg-3">Role</th>
                        <th class="col-lg-3">View Profile</th>
                    </tr>
                </thead>
            </table>
            <div style="overflow-y: scroll; height: 400px; ">
                <table class = "table table-striped table-bordered table-hover table-green">
                    <tbody>
        <?php
        $i = 1;
        while ($stmt->fetch()) {
            ?>
                            <tr class="odd gradeX">
                                <td class="col-lg-3"><?php echo $i; ?></td>
                                <td class="col-lg-3"><?php echo $name; ?></td>

                                <td class="col-lg-3">
                                    <select class="recs" id="<?php echo $id; ?>">
                                        <option  value = "5" <?php if ($role_id == 5): echo "selected='selected'";
                endif;
                ?> >Undefined</option>
                                        <option  value = "4" <?php if ($role_id == 4): echo "selected='selected'";
                endif;
                ?> >Applicant</option>
                                        <option  value = "3" <?php if ($role_id == 3): echo "selected='selected'";
                endif;
            ?> >Invigilator</option>
                                        <option  value = "2" <?php if ($role_id == 2): echo "selected='selected'";
                                     endif;
                                     ?> >Supervisor</option>
                                        <option  value = "1" <?php if ($role_id == 1): echo "selected='selected'";
                                     endif;
            ?> >Admin</option>
                                    </select>
                                </td>
                                <td class="col-lg-3">
                                    <button type="submit" class="btn btn-default">Search</button>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        } //end of while
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
} catch (PDOException $e) {
    echo "Error Occured,please Try again later";
    echo "Error: " . $e->getMessage();
}
$stmt->close();
?>
<script>
$('select').change(function() {
var user_id = $(this).attr('id');
var updated_role = $(this).val();
$.ajax({
            method: "POST",
            url: "functions/updateRole.php",
            data: {'user_id': user_id , 'updated_role': updated_role},
            success: function(data)
            {
               alert(data);
               //onClickDisplayUser();
               //$("#table_info").html(data);
            }
        });
});
</script>