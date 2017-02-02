<?php

try 
{
    include '../includes/database_connect.inc.php';
    
    $user_id = htmlspecialchars($_POST["user_id"]);
    $updated_role = htmlspecialchars($_POST["updated_role"]);
    //echo $user_id;
    //echo $updated_role;

    $stmt = $con->prepare(" update user set role_id = ".$_POST['updated_role']." where id = ".$_POST['user_id']."");
    //$stmt->bind_param("ss", $user_id, $updated_role);
    $stmt->execute();
    echo "affected rows ".$stmt->affected_rows;
   
    
} catch (PDOException $e) {
    echo "Error Occured,please Try again later";
    echo "Error: " . $e->getMessage();
}
$stmt->close();
?>

