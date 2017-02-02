<?php
//$con = mysqli_connect("10.10.21.200", "placement", "ace20lS", "SICSR_Placement");
$con = @mysqli_connect("localhost", "examportal", "examportal", "examportal");

//if connection is not successful you will see text error
if (!$con) {
    die('Houston we have a problem, ps: Data Connection error' . mysql_error());
}

$base_url='localhost/OnlineExamination/';
//<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
//$location="10.10.21.202";
?>