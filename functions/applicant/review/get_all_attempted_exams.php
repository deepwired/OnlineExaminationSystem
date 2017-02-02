<?php
session_start();
include '../../../includes/database_connect.inc.php';
$t_totalQuestions=0;$t_attempted=0;
$t_total_marks=0;$t_correct_attempts=0;
$t_total_score=0;$t_percentage=0;
?>
<?php
    //echo "here";
    
    $query="select s.schedule_id,(select count(answer) from answers where schedule_id=s.schedule_id and user_id=s.user_id and answer!=' ') as attempted,s.question_paper_id,"
            . "(select name from question_paper where id=s.question_paper_id) as paper_name,"
            . "(select count(id) from question where question_paper_id =s.question_paper_id) as total_questions,"
            . "s.group_id,(select name from groups where id=s.group_id) as group_name,s.user_id,"
            . "(select sum(value) from question a where question_paper_id=s.question_paper_id) as total_marks,"
            . "(select count(aa.id) from question qq,answers aa where qq.id=aa.question_id and qq.answer=aa.answer and aa.schedule_id=s.schedule_id and aa.user_id=s.user_id) as corrent_attempts,"
            . "(select score from scores where schedule_id=s.schedule_id and user_id=".$_SESSION['id'].") as score,"
            . "(select start_time from schedule where id=s.schedule_id) as time "
            . "from answers s where user_id=".$_SESSION['id'];
            
            if(array_key_exists('gid',$_POST))
            {
                if($_POST['gid']!=0)
                {
                    $query=$query." and s.group_id=".$_POST['gid'];
                }
            }
            $query=$query." group by schedule_id";
            //echo $query;
    $stmt = $con->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        //echo " now here ";
        $serial = 1;
        $stmt->bind_result($schedule_id,$attempted, $question_paper_id, $paper_name, $total_questions,$group_id,$group_name,$user_id,$total_marks,$correct_attempts,$score,$time);
        ?>
        <table class="table table-striped table-hover"  style="color:black;height:480px;overflow-y: auto;">
            <tbody>
                <tr class="active">
                    <th >Group Name</th>
                    <th >Exam Paper</th>
                    <th >Exam Time</th>
                    <th >Total Questions</th>
                    <th >Questions Attempted</th>
                    <th >Correct Attempts</th>
                    <th >Total Marks</th>
                    <th >Score</th>
                    <th >Final Percentage</th>
                </tr>
               
                <?php
                    while ($stmt->fetch()) {
                        
                        $t_totalQuestions=$t_totalQuestions+$total_questions;$t_attempted=$t_attempted+$attempted;
                        $t_total_marks=$t_total_marks+$total_marks;$t_total_score=$t_total_score+$score;
                        $t_percentage=  round(($t_total_score/$t_total_marks)*100,2);
                        $t_correct_attempts=$t_correct_attempts+$correct_attempts;
                        
                    ?>
                    <tr class="success" onClick="openReviewFor(<?php echo $question_paper_id.",".$schedule_id; ?>)" >        
                        <td><?php echo $group_name;?></td>
                        <td><?php echo $paper_name;?></td>
                        <td><?php echo $time;?></td>
                        <td><?php echo $total_questions;?></td>
                        <td><?php echo $attempted;?></td>
                        <td><?php echo $correct_attempts;?></td>
                        <td><?php echo $total_marks;?></td>
                        <td><?php echo $score;?></td>
                        <?php $percentage=round(($score/$total_marks)*100,2);?>
                        <td><?php echo $percentage;?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr class="info">        
                        <td>Total</td>
                        <td>---</td>
                        <td>---</td>
                        <td><?php echo $t_totalQuestions;?></td>
                        <td><?php echo $t_attempted;?></td>
                        <td><?php echo $t_correct_attempts;?></td>
                        <td><?php echo $t_total_marks;?></td>
                        <td><?php echo $t_total_score;?></td>
                        <td><?php echo $t_percentage;?></td>
                    </tr>
                    

            </tbody></table>
        <?php
    } else {
        ?>
    <div class="well" style="color:black;height:480px;overflow-y: auto;">
        No papers have been attempted by you on the given search Parameters.
    </div>
        <?php
    }

?>
