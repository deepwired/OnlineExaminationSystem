<?php

session_start();
include '../../includes/database_connect.inc.php';
try
{
if(array_key_exists('add', $_POST))
{
    $stmt = $con->prepare("insert into user_group VALUES (default," . $_POST['memberid'] . ", ".$_POST['gid'].") ");
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Member with id ".$_POST['memberid']." shifted";
       
        } else {
        echo "Some error Occured";
        }
}
else if(array_key_exists('remove', $_POST))
{
   $stmt = $con->prepare("delete from user_group where user_id =".$_POST['memberid']." and group_id= ".$_POST['gid']."");
   $stmt->execute();

   if ($stmt->affected_rows > 0) {
        echo "Member with id ".$_POST['memberid']." shifted";
       } else {
        echo "Some error Occured";
   }

}
$stmt->close();
    
}catch(PDOException $e)
{
echo "Error Occured,please Try again later";
echo "Error: " . $e->getMessage();
}
?>