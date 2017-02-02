<?php
session_start();
include '../../../includes/database_connect.inc.php';

$id="";
$question_paper_id="";
$question="";
$a="";
$b="";
$c="";
$d="";
$answer="";
$value="";
$question_type=1;


if (array_key_exists('qid', $_POST)) {

    
    $query="select q.*,a.answer as correct from question q,schedule s,answers a "
            . "where q.question_paper_id = s.question_paper_id and a.question_id=q.id and a.schedule_id=s.id and a.schedule_id=s.id and s.id= ".$_POST['sid']." and q.id=".$_POST['qid']." "
            . "and a.user_id=".$_SESSION['id'];
    
    $stmt = $con->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $serial = 1;
        $stmt->bind_result($id, $question_paper_id, $question,$a,$b,$c,$d,$answer,$value,$question_type,$correct);
        $stmt->fetch(); 
    }
}
?>

<div style="color: black">
    <div class='row' align='center'>
        <b>Question Type :
            <?php if($question_type==1){ echo "Multiple Choice Question"; } ?> 
            <?php if($question_type==2){ echo "One Word Answers"; } ?> 
        </b>
    </div>
    <br>
        <div class='row' align="left" class="col-lg-12">
            
                <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Question :<?php echo $question; ?><b>
        </div>
        <br>
        <div id="mcq" <?php if($question_type==2){ echo "hidden"; } ?>>
            <div class='row'>
                <br><br>
                <label class="col-lg-1 control-label">A</label>
                <div class="col-lg-5">
                    <input id = "option_a" class="form-control" type="text" readonly placeholder="Test Name (eg. Java SE)" value="<?php echo $a ?>"></input>
                </div>

                <label class="col-lg-1 control-label">C</label>
                <div class="col-lg-5">
                    <input id = "option_c" class="form-control" type="text" readonly placeholder="Test Name (eg. Java SE)" value="<?php echo $c ?>"></input>
                </div>
            </div>
            <br><br>
            <div class='row'>
                <label class="col-lg-1 control-label">B</label>
                <div class="col-lg-5">
                    <input id = "option_b" class="form-control" type="text" readonly placeholder="Test Name (eg. Java SE)" value="<?php echo $b ?>"></input>
                </div>

                <label class="col-lg-1 control-label">D</label>
                <div class="col-lg-5">
                    <input id = "option_d" class="form-control" type="text" readonly placeholder="Test Name (eg. Java SE)" value="<?php echo $d ?>"></input>
                </div>
            </div>
        </div>
        
        <br>
        <div class="row">
            <?php
            if($answer==$correct)
            {
            ?>
                <div class="col-lg-6">Your Answer : <button disabled class="btn btn-success"> <?php echo $correct; ?></button> </div>
            <?php
            }
            else
            {
            ?>
                <div class="col-lg-6">Your Answer :<button disabled class="btn btn-danger">  <?php echo $correct; ?></button> </div>
            <?php
            }
            ?>
            <div class="col-lg-6">Correct Answer :<button disabled class="btn btn-success"> <?php echo $answer; ?> </button></div>
            
            
        </div>
        <div class='row' align='center'>
            
            <label  class="control-label ">Question Weight : <?php echo $value; ?></label>
        </div>
    </div>

<?php
        
    

?>

<script>
     
</script>    