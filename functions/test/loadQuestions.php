<?php
include '../../includes/database_connect.inc.php';
session_start();
if (array_key_exists('question_id', $_POST)) {
    $question_id = htmlspecialchars($_POST["question_id"]);
    $question_paper_id = htmlspecialchars($_POST["paper_id"]);
    $serial_num = htmlspecialchars($_POST["serial_num"]);
    
    $temp = $serial_num;
    if ($question_id == 0)
        $query = " select id, question , a , b , c , d , value , question_type from question where question_paper_id = " . $question_paper_id . " order by id limit 1";
    else
        $query = " select id , question , a , b , c , d , value , question_type  from question  where id = " . $question_id . "";
    //echo $query;
    $stmt = $con->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $question, $a, $b, $c, $d, $value, $question_type);
        while ($stmt->fetch()) {
            $_SESSION['q_id'] = $id;
            $query2 = " select answer from answers where question_id = " . $id . " and user_id = ".$_SESSION['applicant_id']." and schedule_id = ".$_SESSION['schedule_id']."";
            $stmt2 = $con->prepare($query2);
            $stmt2->execute();
            $stmt2->store_result();
            $flag = 0;
            if ($stmt2->num_rows > 0) {
                $stmt2->bind_result($answer);
                $stmt2->fetch();
                $flag = 1;
            } else
                $answer = 'null';
            ?>
            <div class="well">
            <div class='row'>
                <div align="left" class="col-lg-12">

                    <div class="form-control-wrapper" rows="3" >
                        Q<span id="question_number"><?php echo $serial_num; ?>) </span>
                        
                        <div class="form-control-wrapper" rows="3" >
                             <textarea readonly id="question" class="form-control  input-lg empty" rows="3"  ><?php echo $question; ?></textarea>
                        </div>
                        
                    </div>
                </div>
            </div>

            <?php if ($question_type == 1) { ?>
                <div id="mcq">
                    <div class='row'>
                        <br><br>
                        
                        <div class="col-lg-1" class="radio radio-primary form-group">
                            <input  value="A" id = "option_a" name="options_<?php echo $id; ?>" type="radio"  <?php if ($answer == 'A') echo "checked='checked'"; ?>></input>
                        </div>
                        <label class="col-lg-5 control-label"><?php echo $a; ?></label>


                        <div class="col-lg-1"  class="radio radio-primary form-group">
                            <input id = "option_c" value="C" name="options_<?php echo $id; ?>"  type="radio" <?php if ($answer == 'C') echo "checked='checked'"; ?>></input>
                        </div>
                        <label class="col-lg-5 control-label"><?php echo $c; ?></label>

                    </div>
                    <br>
                    <div class='row'>
                        <div class="col-lg-1"  class="radio radio-primary  form-group">
                            <input id = "option_b" value="B" name="options_<?php echo $id; ?>"  type="radio" <?php if ($answer == 'B') echo "checked='checked'"; ?>></input>
                        </div>
                        <label class="col-lg-5 control-label"><?php echo $b; ?></label>

                        <div class="col-lg-1"  class="radio radio-primary  form-group">
                            <input id = "option_d" value="D" name="options_<?php echo $id; ?>"  type="radio" <?php if ($answer == 'D') echo "checked='checked'"; ?>></input>
                        </div>
                        <label class="col-lg-5 control-label"><?php echo $d; ?></label>
                        
                    </div>
                </div>
                <hr>
                <?php
            } else {
                ?>
                <div class='row' id="one_word_<?php echo $id; ?>" align='center'>
                    <div align="center" class="col-lg-4">
                    <input type="text" class="form-control" id = "answer_<?php echo $id; ?>" placeholder="Enter Answer here" hidden value="<?php if ($flag == 1) echo $answer;
                else echo ""; ?>">
                    </div>
                </div>
                <hr>
            <?php } ?>

            <div class='row' align='center'>
            </div>
            <br>
            <div class="row" align="center">
                <div class="col-lg-6">
                    <button class="btn btn-lg btn-warning" onClick="loadTestQuestion(<?php if ($serial_num != 1)
                $serial_num = $serial_num - 1;
            echo $id . " , " . $_SESSION["'sr_'.$serial_num"] . "," . $serial_num;
            ?>)">Save and Previous </button>
                </div>
                <div id="createexambutton" class="col-lg-6">
                    <button class="btn btn-lg btn-warning" id='insertedit' onClick="loadTestQuestion(<?php
                            $t_q = $_SESSION["total_questions"];
                            if ($temp != intval($t_q))
                                $temp = $temp + 1;
                            echo $id . " , " . $_SESSION["'sr_'.$temp"] . "," . $temp;
                            ?>)">Save and Next</button>
                </div>
            </div>
            </div>
            <div align="center" class="row" align="center">
                    <button class="btn btn-lg btn-warning" id='insertedit' onClick="finishExam()">Submit</button>
            </div>
            <?php
        }
    }
}
?>

