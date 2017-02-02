<?php
session_start();
include '../../includes/database_connect.inc.php';
?>
<?php
$question = htmlspecialchars($_POST["question"]);
$option_a = htmlspecialchars($_POST["option_a"]);
$option_b = htmlspecialchars($_POST["option_b"]);
$option_c = htmlspecialchars($_POST["option_c"]);
$option_d = htmlspecialchars($_POST["option_d"]);
$answer = htmlspecialchars($_POST["answer"]);
$weight = htmlspecialchars($_POST["weight"]);

$que_paper_id = $_SESSION["question_paper_id"];
$stmt2 = $con->prepare(" insert into question values('',?,?,?,?,?,?,?,?)");
$stmt2->bind_param("ssssssss", $que_paper_id, $question, $option_a, $option_b, $option_c, $option_d, $answer, $weight);
$stmt2->execute();
if ($stmt2->affected_rows > 0) {
    ?>
    <div class="list-group-separator"></div>

    <div class="list-group-item">
        <div class="row-action-primary">
            <i class="mdi-file-folder"></i>
        </div>
        <div class="row-content">
            <div class="least-content"><?php echo $weight; ?>mks</div>
            <h5 class="list-group-item-heading">Q<?php echo $que_paper_id; ?></h5>
            <p class="list-group-item-text"><a href="inv_getQuestionInfo.php"><?php echo substr($question, 0, 10) ?>.....</a></p>
        </div>
    </div>
    <?php
} else {
    echo "Sorry Question  Could not be Created";
}
$stmt2->close();
?>