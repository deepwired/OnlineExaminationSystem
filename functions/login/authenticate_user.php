<?php
try
{
    
    include '../../includes/database_connect.inc.php';
    session_start();
    $email= htmlspecialchars($_POST["e"]);
    $password=htmlspecialchars($_POST["p"]);
    $password=md5($password);
    //echo "select id,role_id,name from user where email='$email' and password='$password' and role_id != 1";
    $stmt = $con->prepare("select id,role_id,name from user where email=? and password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();
    echo $stmt->num_rows;
    if( $stmt->num_rows>0)
    {
        $stmt->bind_result($id, $role_id,$name);
        $stmt->fetch();
        
        
        $_SESSION['id']=$id;
        $_SESSION['role_id']=$role_id;
        $_SESSION['name']=$name;
        
        if($role_id==4)
        {
            header ('Location: ../../app.php');
        }
        else if($role_id==3)
        {
            header ('Location: ../../invigilator.php');
        }
        else if($role_id==2)
        {
            header ('Location: ../../super.php');  
        }
        else if($role_id==1)
        {
            header ('Location: ../../admin_home.php');
        }
        else if($role_id==5)
        {
            header ('Location: ../../wait.php');
        }
    }
    else 
    {
        echo "there";
        session_start();
        $_SESSION['invalid_login']="Invalid Credentials, please try again or select the forgot password option";    
        header ('Location: ../../login.php');
    
        
    }
}
catch(PDOException $e)
{
    echo "Error Occured,please Try again later";
    echo "Error: " . $e->getMessage();
}
?>