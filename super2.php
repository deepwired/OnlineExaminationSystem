<?php
session_start();
include 'includes/database_connect.inc.php';
$t_totalQuestions = 0;
$t_attempted = 0;
$t_total_marks = 0;
$t_correct_attempts = 0;
$t_total_score = 0;
$t_percentage = 0;
?>
<?php
//echo "here";




if (array_key_exists('uid', $_REQUEST)) {

    $uid = $_REQUEST['uid'];

    $query = "select s.schedule_id, "
            . "(select count(answer) from answers where schedule_id=s.schedule_id and user_id=s.user_id and answer!=' ') as attempted, "
            . "s.question_paper_id,"
            . "(select name from user where id=s.user_id) as stuName,"
            . "(select name from question_paper where id=s.question_paper_id) as paper_name,"
            . "(select count(id) from question where question_paper_id =s.question_paper_id) as total_questions,"
            . "s.group_id,(select name from groups where id=s.group_id) as group_name,s.user_id,"
            . "(select sum(value) from question a where question_paper_id=s.question_paper_id) as total_marks,"
            . "(select count(aa.id) from question qq,answers aa where qq.id=aa.question_id and qq.answer=aa.answer and aa.schedule_id=s.schedule_id and aa.user_id=s.user_id) as corrent_attempts,";
    if ($uid == 0) {
        $query = $query . "(select score from scores where schedule_id=s.schedule_id and user_id=s.user_id) as score,";
    } else {
        $query = $query . "(select score from scores where schedule_id=s.schedule_id and user_id=" . $_REQUEST['uid'] . ") as score,";
    }

    $query = $query . "(select start_time from schedule where id=s.schedule_id) as time,"
            . "  (select name from question_paper where id=s.question_paper_id) as paper_name  ";
    if ($uid == 0) {
        $query = $query . "from answers s";
        if (array_key_exists('gid', $_REQUEST)) {
            if ($_REQUEST['gid'] != 0) {
                $query = $query . " where s.group_id=" . $_REQUEST['gid'];
            }
        }
    } else {
        $query = $query . "from answers s where user_id=" . $uid;
        if (array_key_exists('gid', $_REQUEST)) {
            if ($_REQUEST['gid'] != 0) {
                $query = $query . " and s.group_id=" . $_REQUEST['gid'];
            }
        }
    }

    $query = $query . " group by schedule_id,user_id";
} else {
    $query = "select s.schedule_id, "
            . "(select count(answer) from answers where schedule_id=s.schedule_id and user_id=s.user_id and answer!=' ') as attempted, "
            . "s.question_paper_id, "
            . "(select name from user where id=s.user_id) as stuName,"
            . "(select name from question_paper where id=s.question_paper_id) as paper_name,"
            . "(select count(id) from question where question_paper_id =s.question_paper_id) as total_questions,"
            . "s.group_id,(select name from groups where id=s.group_id) as group_name,s.user_id,"
            . "(select sum(value) from question a where question_paper_id=s.question_paper_id) as total_marks,"
            . "(select count(aa.id) from question qq,answers aa where qq.id=aa.question_id and qq.answer=aa.answer and aa.schedule_id=s.schedule_id and aa.user_id=s.user_id) as corrent_attempts,"
            . "(select score from scores where schedule_id=s.schedule_id and user_id=" . $_SESSION['id'] . ") as score,"
            . "(select start_time from schedule where id=s.schedule_id) as time,"
            . "(select name from question_paper where id=s.question_paper_id) as paper_name "
            . "from answers s where user_id=" . $_SESSION['id'];

    if (array_key_exists('gid', $_REQUEST)) {
        if ($_REQUEST['gid'] != 0) {
            $query = $query . " and s.group_id=" . $_REQUEST['gid'];
        }
    }
    $query = $query . " group by schedule_id";
}



//echo $query;


$stmt = $con->prepare($query);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    //echo " now here ";
    $serial = 1;

    $stmt->bind_result($schedule_id, $attempted, $question_paper_id, $stuname, $paper_name, $total_questions, $group_id, $group_name, $user_id, $total_marks, $correct_attempts, $score, $time, $paper_name);

    //$stmt->bind_result($schedule_id, $attempted, $question_paper_id, $paper_name, $total_questions, $group_id, $group_name, $user_id, $total_marks, $correct_attempts, $score, $time);
    ?>


    <?php
    if ($stmt->fetch()) {
        $t_totalQuestions = $t_totalQuestions + $total_questions;
        $t_attempted = $t_attempted + $attempted;
        $t_total_marks = $t_total_marks + $total_marks;
        $t_total_score = $t_total_score + $score;
        $t_percentage = ($t_total_score / $t_total_marks) * 100;
        $percentage = ($score / $total_marks) * 100;
        $t_correct_attempts = $t_correct_attempts + $correct_attempts;

        $data_for_line = '["' . $paper_name . "->" . $stuname . '",' . $percentage . ']';
    }
    while ($stmt->fetch()) {

        $t_totalQuestions = $t_totalQuestions + $total_questions;
        $t_attempted = $t_attempted + $attempted;
        $t_total_marks = $t_total_marks + $total_marks;
        $t_total_score = $t_total_score + $score;
        $t_percentage = ($t_total_score / $t_total_marks) * 100;
        $percentage = ($score / $total_marks) * 100;
        $t_correct_attempts = $t_correct_attempts + $correct_attempts;

        $data_for_line = $data_for_line . ',["' . $paper_name . "->" . $stuname . '",' . $percentage . ']';
    }
} else {
    
}
?>
<html>
    <head>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("visualization", "1", {packages: ["corechart"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Questions'],
                    ['Right',<?php echo $t_correct_attempts; ?>],
                    ['Wrong',<?php echo $t_attempted - $t_correct_attempts; ?>],
                    ['Not Attempted',<?php echo $t_totalQuestions - $t_attempted; ?>],
                ]);

                var options = {
                    title: 'Correct vs Attempted vs Wrong',
                    pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
            ///
            google.load('visualization', '1.1', {packages: ['line']});
            google.setOnLoadCallback(drawLine);

            function drawLine() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Exam-Student');
                data.addColumn('number', 'Percentage');

                data.addRows([
<?php echo $data_for_line; ?>
                ]);

                var options = {
                    chart: {
                        title: 'Exam Results ',
                        subtitle: 'analysis in %'
                    },
                    width: 900,
                    height: 500
                };

                var chart = new google.charts.Line(document.getElementById('linechart_material'));

                chart.draw(data, options);
            }

        </script>
        <?php
        include './includes/cssheaders.inc.php';

        include './includes/jsheaders.inc.php';
        ?>
    </head>
    <body class="container-fluid">
        <br><br><br>
        <div align="center" id="donutchart" class="col-lg-4" style="height: 500px;"></div>

        <div align="center" id="linechart_material" class="col-lg-8" style="height: 500px;"></div>
        <div align="center" class="col-lg-12">
            <button class="btn btn-block btn-warning" onclick="window.close()">Go Back</button>
        </div>    
    </body>
</html>
