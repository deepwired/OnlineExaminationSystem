<?php
include '../../includes/database_connect.inc.php';
session_start();
if (array_key_exists('paper_id', $_POST)) {
    $question_paper_id = htmlspecialchars($_POST["paper_id"]);

    $stmt = $con->prepare(" select id, question , a , b , c , d , value , question_type  from question where question_paper_id =" . $question_paper_id . "");
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        //$_SESSION['total_questions'] = $stmt->num_rows;
        $stmt->bind_result($id, $question, $a, $b, $c, $d, $value, $question_type);
        $serial = 0;
        $temp = 0;
        while ($stmt->fetch()) {
            $serial+=1;
           // $_SESSION["'sr_'.$serial"] = $id;
            //echo $_SESSION["'sr_'.$serial"];
            //echo "'sr_'.$serial";
            ?>
            <div>
                <button onClick="loadTestQuestion(<?php echo $_SESSION['q_id'] . " , " . $id . " , " . $serial; ?>)" class="list-group-item list-group-item-success" id="btn_<?php echo $id; ?>"><?php echo $serial . ") " . $question; ?></button>               
            </div>
            <?php
            $temp = $id;
        }
    }
}
?>



