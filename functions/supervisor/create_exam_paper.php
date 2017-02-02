<?php

session_start();
include '../../includes/database_connect.inc.php';

$name = htmlspecialchars($_POST["en"]);
$description = htmlspecialchars($_POST["ed"]);

$stmt = $con->prepare(" insert into question_paper values('DEFAULT'," . $_SESSION['id'] . ",?,?,now());");
$stmt->bind_param("ss", $name, $description);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    echo $con->insert_id;
} else {
    echo "false";
}
$_SESSION['tempQuestionNo']=1;
?>

