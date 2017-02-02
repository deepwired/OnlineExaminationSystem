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

    $stmt = $con->prepare("select * from question where id = ".$_POST['qid']."");
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $serial = 1;
        $stmt->bind_result($id, $question_paper_id, $question,$a,$b,$c,$d,$answer,$value,$question_type);
        $stmt->fetch(); 
    }
}
?>

<div  style="color: black">
    <div class='row' align='center'>
        <label  class="control-label">Question Type</label>
        <select id="ques_type_edit" class="btn btn-primary btn-flat">
            
            <option <?php if($question_type==1){ echo "selected"; } ?> value="m">Multiple Choice Question</option>
            <option <?php if($question_type==2){ echo "selected"; } ?> value="f">One Word Answers</option>
        </select>
    </div>
    <br>
   
        <div class='row'>
            <div align="center" class="col-lg-12">
                <label  class="control-label"> Question :</label>
                <div class="form-control-wrapper" rows="3" >
                    <textarea class="form-control  input-lg empty" rows="3" placeholder ="Enter a Question" id="question" ><?php echo $question; ?></textarea>
                </div>
            </div>
        </div>
        <br>
        <div id="mcq" <?php if($question_type==2){ echo "hidden"; } ?>>
            <div class='row'>
                <br><br>
                <label class="col-lg-1 control-label">A</label>
                <div class="col-lg-5">
                    <input id = "option_a" class="form-control  input-lg" type="text" placeholder="Test Name (eg. Java SE)" value="<?php echo $a ?>"></input>
                </div>

                <label class="col-lg-1 control-label">C</label>
                <div class="col-lg-5">
                    <input id = "option_c" class="form-control  input-lg" type="text" placeholder="Test Name (eg. Java SE)" value="<?php echo $c ?>"></input>
                </div>
            </div>
            <br><br>
            <div class='row'>
                <label class="col-lg-1 control-label">B</label>
                <div class="col-lg-5">
                    <input id = "option_b" class="form-control  input-lg" type="text" placeholder="Test Name (eg. Java SE)" value="<?php echo $b ?>"></input>
                </div>

                <label class="col-lg-1 control-label">D</label>
                <div class="col-lg-5">
                    <input id = "option_d" class="form-control  input-lg" type="text" placeholder="Test Name (eg. Java SE)" value="<?php echo $d ?>"></input>
                </div>
            </div>
        </div>
        <div class='row' align='center'>
            <label  class="">Answer </label>  
            <div <?php if($question_type==2){ echo "hidden"; }?>>
            <select   id = "answer_m" class="btn btn-primary btn-flat">
                <option <?php if ($answer==="A") { echo "selected='selected'" ; } ?> value="A">A </option>                
                <option <?php if ($answer==="B") { echo "selected='selected'" ; } ?> value="B">B </option>
                <option <?php if ($answer==="C") { echo "selected='selected'" ; } ?> value="C">C </option>
                <option <?php if ($answer==="D") { echo "selected='selected'" ; } ?> value="D">D </option>
            </select>
            <br>
            </div>
            <div <?php if($question_type==1){ echo "hidden"; }?>  id="answer_f_div" >
            
            <input type="text" class="form-control  input-lg" id = "answer_f" value='<?php echo $answer; ?>' placeholder="Enter Answer here">
            <br>
            </div>
            <label  class="control-label ">Question Weight </label>
            <select id="weight" class="btn btn-primary btn-flat">
                <?php
                for ($i = 1; $i <= 10; $i++)
                {?>
                <option value="<?php echo $i;?>" <?php if($i==$value) {echo 'selected="selected"';} ?> ><?php echo $i;?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <br>
        <div class="row">
            <?php
            if($question!='')
            {
            ?>
            <div class="col-lg-6">
                <button class="btn btn-lg btn-material-teal-500 " onClick="deleteQuestion(<?php echo $id; ?>)">Delete Question</button>
            </div>
            
            <div  class="col-lg-6">
                <button class="btn btn-lg btn-material-teal-500" id='' onClick="updateQuestionEdit(<?php echo $id;?>)">Update Question</button>
            </div>
            <?php                     
            }
            else
            {
             ?>
            <div class="col-lg-12">
                <button class="btn btn-lg btn-material-teal-500" onClick="updateQuestionEdit(0)">Add Question</button>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

<?php
        
    

?>

<script>
     $(document).ready(function () {
        $('#ques_type_edit').change(function () {            
            if ($('#ques_type_edit').val() === "m")
            {
                $('#answer_f_div').fadeOut(500);
                $('#mcq').delay(500).fadeIn(500);
                $('#answer_m').delay(500).fadeIn(500);
            }
            else if ($('#ques_type_edit').val() === "f")
            {
                $('#mcq').fadeOut(500);
                $('#answer_m').fadeOut(500);
                $('#answer_f_div').delay(500).fadeIn(500);
            }
        });    
     });
     function addQuestionEdit()
     {
         
     }
     
</script>    