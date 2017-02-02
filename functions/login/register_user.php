<?php
try
{
    include '../../includes/database_connect.inc.php';
    $username= htmlspecialchars($_POST["u"]);
    $email= htmlspecialchars($_POST["em"]);
    $mobile=htmlspecialchars($_POST["mo"]);
    $password=$_POST["npa"];

    $stmt = $con->prepare("insert into user VALUES (default,'5',?,md5(?),?,?,now())");
    $stmt->bind_param("ssss",$username,$password,$email,$mobile);
    $stmt->execute();
    if( $stmt->affected_rows>0)
    {
        echo $stmt->insert_id;
    }
    else 
    {
        echo "Email id already Registered,try forgot password in the login screen";    
    }
}
catch(PDOException $e)
{
    echo "Error Occured,please Try again later";
    echo "Error: " . $e->getMessage();
}
?>