<?php

session_start();
include '../../includes/database_connect.inc.php';
?>
<?php

$que_paper_id = $_SESSION["question_paper_id"];
echo $que_paper_id;
$stmt2 = $con->prepare(" delete from question where question_paper_id = ?;");
$stmt2->bind_param("s", $que_paper_id);
$stmt2->execute();
if ($stmt2->affected_rows > 0) {
    echo "true";
    $stmt = $con->prepare("delete from question_paper where id = ?;");
    $stmt->bind_param("s", $que_paper_id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "true";
    } else {
        echo "Sorry test Could not be Cancelled";
    }
    $stmt->close();
} else {
    echo "Sorry test Could not be Cancelled";
}
$stmt2->close();
?>