<?php
include './includes/database_connect.inc.php';
session_start();


if (array_key_exists('role_id', $_SESSION)) {
    if ($_SESSION['role_id'] == 4) {
        
    } else {
        $_SESSION['invalid_login'] = "You do not have permission to view that page or your Session has expired";
        header("Location: login.php");
    }
} else {
    $_SESSION['invalid_login'] = "Kindly Log in to View that Page";
    header("Location: login.php");
    die;
}
?>
<style>* {
        box-sizing: border-box;
    }

    .strips {
        min-height: 100vh;
        text-align: center;
        overflow: hidden;
        color: white;
    }
    .strips__strip {
        will-change: width, left, z-index, height;
        position: absolute;
        width: 20%;
        min-height: 100vh;
        overflow: hidden;
        cursor: pointer;
        -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .strips__strip:nth-child(1) {
        left: 0;
    }
    .strips__strip:nth-child(2) {
        left: 20vw;
    }
    .strips__strip:nth-child(3) {
        left: 40vw;
    }
    .strips__strip:nth-child(4) {
        left: 60vw;
    }
    .strips__strip:nth-child(5) {
        left: 80vw;
    }
    .strips__strip:nth-child(1) .strip__content {
        // background: #244F75;
        //background: #005f8d;
        //background: teal;
        background: black;
        
        -webkit-transform: translate3d(-100%, 0, 0);
        transform: translate3d(-100%, 0, 0);
        -webkit-animation-name: strip1;
        animation-name: strip1;
        -webkit-animation-delay: 0.1s;
        animation-delay: 0.1s;
    }
    .strips__strip:nth-child(2) .strip__content {
        //background: #60BFBF;
        //background: lightseagreen;
        background: #454545;

        /*        background: #6da2c8;*/
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
        -webkit-animation-name: strip2;
        animation-name: strip2;
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;
    }
    .strips__strip:nth-child(3) .strip__content {
        // background: #8C4B7E;
        //background: teal;
        //background:#66bc99 ;
        background: gray;

        -webkit-transform: translate3d(0, -100%, 0);
        transform: translate3d(0, -100%, 0);
        -webkit-animation-name: strip3;
        animation-name: strip3;
        -webkit-animation-delay: 0.3s;
        animation-delay: 0.3s;
    }
    .strips__strip:nth-child(4) .strip__content {
        // background: #F8BB44;
        //background: lightseagreen;
        background: #454545;

        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
        -webkit-animation-name: strip4;
        animation-name: strip4;
        -webkit-animation-delay: 0.4s;
        animation-delay: 0.4s;
    }
    .strips__strip:nth-child(5) .strip__content {
        // background: #F24B4B;
        background: black;

        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
        -webkit-animation-name: strip5;
        animation-name: strip5;
        -webkit-animation-delay: 0.5s;
        animation-delay: 0.5s;
    }
    @media screen and (max-width: 760px) {
        .strips__strip {
            min-height: 20vh;
        }
        .strips__strip:nth-child(1) {
            top: 0;
            left: 0;
            width: 100%;
        }
        .strips__strip:nth-child(2) {
            top: 20vh;
            left: 0;
            width: 100%;
        }
        .strips__strip:nth-child(3) {
            top: 40vh;
            left: 0;
            width: 100%;
        }
        .strips__strip:nth-child(4) {
            top: 60vh;
            left: 0;
            width: 100%;
        }
        .strips__strip:nth-child(5) {
            top: 80vh;
            left: 0;
            width: 100%;
        }
    }
    .strips .strip__content {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-timing-function: cubic-bezier(0.23, 1, 0.32, 1);
        animation-timing-function: cubic-bezier(0.23, 1, 0.32, 1);
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-decoration: none;
    }
    .strips .strip__content:hover:before {
        -webkit-transform: skew(-30deg) scale(3) translate(0, 0);
        -ms-transform: skew(-30deg) scale(3) translate(0, 0);
        transform: skew(-30deg) scale(3) translate(0, 0);
        opacity: 0.1;
    }
    .strips .strip__content:before {
        content: "";
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: white;
        opacity: 0.05;
        -webkit-transform-origin: center center;
        -ms-transform-origin: center center;
        transform-origin: center center;
        -webkit-transform: skew(-30deg) scaleY(1) translate(0, 0);
        -ms-transform: skew(-30deg) scaleY(1) translate(0, 0);
        transform: skew(-30deg) scaleY(1) translate(0, 0);
        -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .strips .strip__inner-text {
        will-change: transform, opacity;
        position: absolute;
        z-index: 5;
        top: 50%;
        left: 50%;
        width: 70%;
        -webkit-transform: translate(-50%, -50%) scale(0.5);
        -ms-transform: translate(-50%, -50%) scale(0.5);
        transform: translate(-50%, -50%) scale(0.5);
        opacity: 0;
        -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .strips__strip--expanded {
        width: 100%;
        top: 0 !important;
        left: 0 !important;
        z-index: 3;
        cursor: default;
    }
    @media screen and (max-width: 760px) {
        .strips__strip--expanded {
            min-height: 100vh;
        }
    }
    .strips__strip--expanded .strip__content:hover:before {
        -webkit-transform: skew(-30deg) scale(1) translate(0, 0);
        -ms-transform: skew(-30deg) scale(1) translate(0, 0);
        transform: skew(-30deg) scale(1) translate(0, 0);
        opacity: 0.05;
    }
    .strips__strip--expanded .strip__title {
        opacity: 0;
    }
    .strips__strip--expanded .strip__inner-text {
        opacity: 1;
        -webkit-transform: translate(-50%, -50%) scale(1);
        -ms-transform: translate(-50%, -50%) scale(1);
        transform: translate(-50%, -50%) scale(1);
    }

    .strip__title {
        display: block;
        margin: 0;
        position: relative;
        z-index: 2;
        width: 100%;
        font-size: 3.5vw;
        color: white;
        -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }
    @media screen and (max-width: 760px) {
        .strip__title {
            font-size: 28px;
        }
    }

    .strip__close {
        position: absolute;
        right: 3vw;
        top: 3vw;
        opacity: 0;
        z-index: 10;
        -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        cursor: pointer;
        -webkit-transition-delay: 0.5s;
        transition-delay: 0.5s;
    }
    .strip__close--show {
        opacity: 1;
    }

    @-webkit-keyframes strip1 {
        0% {
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes strip1 {
        0% {
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @-webkit-keyframes strip2 {
        0% {
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @keyframes strip2 {
        0% {
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @-webkit-keyframes strip3 {
        0% {
            -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @keyframes strip3 {
        0% {
            -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @-webkit-keyframes strip4 {
        0% {
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @keyframes strip4 {
        0% {
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @-webkit-keyframes strip5 {
        0% {
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @keyframes strip5 {
        0% {
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    /* Demo purposes */
    body {
        font-family: 'Open Sans';
        -webkit-font-smoothing: antialiased;
        text-rendering: geometricPrecision;
        line-height: 1.5;
    }

    h1, h2 {
        font-weight: 300;
    }

    .fa {
        font-size: 30px;
        color: white;
    }

    h2 {
        font-size: 36px;
        margin: 0 0 16px;
    }

    p {
        margin: 0 0 16px;
    }

</style>
<?php
include './includes/cssheaders.inc.php';
//include './includes/sup_navbar.inc.php';


if (array_key_exists('role_id', $_SESSION)) {
    if ($_SESSION['role_id'] == 2) {
        
    } else {
        $_SESSION['invalid_login'] = "You do not have permission to view that page or your Session has expired";
        @header("Location: login.php");
    }
} else {
    $_SESSION['invalid_login'] = "Kindly Log in to View that Page";
    header("Location: login.php");
    die;
}
?>


<section class="strips">
    <article class="strips__strip">
        <div class="strip__content">
            <h1 class="strip__title" data-name="Lorem"  ><span id="home_groups">Profile</span></h1>
            <div class="strip__inner-text">
                <div id="profile" class="col-lg-12 well" style="height:580px;overflow-y: auto;">
                    <div style="height:border-box;">
                            <div id="profileInfo" class="col-lg-12" >
                                
                            </div>
                            <div class="col-lg-12" id="profileGroups" >
                                
                            </div>
                    </div>

                </div>
                </article>
                <article class="strips__strip">
                    <div class="strip__content">
                        <h1 class="strip__title" data-name="Ipsum"><span id="home_exams">Exams</span></h1>
                        <div class="strip__inner-text">           
                            <div id="parent_exams" class="col-lg-12 container" style="height:580px;overflow-y: auto;">
                                <div class="row">
                                    <div id="groups_title" class="col-lg-5" >
                                        <h1><i class="fa fa-gears"></i>Groups</h1>
                                    </div>

                                    <div class="col-lg-2"></div>

                                    <div id="schedules_title" class="col-lg-5" >
                                        <h1><i class="fa fa-calendar-o"></i>Schedule</h1>
                                    </div>
                                </div>
                                <div class="row">

                                    <div id="groups" class="col-lg-4 well" style="color:black;height:480px;overflow-y: auto;">

                                    </div>

                                    <div class="col-lg-2"></div>
                                    <div id="schedules" class="col-lg-6 well" style="color:black;height:480px;overflow-y: auto;">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="strips__strip">
                    <div class="strip__content"  >


                        <h1 class="strip__title" data-name="Dolor" ><span id="home_schedule">Review</span></h1>
                        <div class="strip__inner-text">

                            <div id="overall-exams">
                                <div class="row">
                                    <div class="col-lg-2"><h2>Search</h2></div>
                                    <div class="col-lg-1"></div>
                                    <div align="center" class="col-lg-9"><h2>Exam Reviews</h2></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2" id="options_review">

                                    </div>
                                    <div class="col-lg-1">

                                    </div>
                                    <div class="col-lg-9" id="all_attempted_tests" style="height:500px;overflow-y: auto">

                                    </div>
                                </div>
                            </div>

                            <div id="attempted_test_review" hidden class="row">

                            </div>    
                        </div>
                    </div>
                </article>
                <article class="strips__strip">
                    <div class="strip__content">
                        <h1 class="strip__title" data-name="Sit">Help</h1>
                        <div class="strip__inner-text">
                             <div id='help' class='col-lg-12'>
                                
                            </div>
                            
                        </div>
                    </div>
                </article>
                <article class="strips__strip">
                    <div class="strip__content">
                        <h1 class="strip__title" data-name="Amet">Settings</h1>
                        <div class="strip__inner-text">
                            <div id="settings" class="col-lg-12">
                
                           </div> 
                      </div>
                    </div>
                </article>
                 <p onCLick="fixer()">
                <i class="mdi-content-clear strip__close"></i></p>
                </section>
                <?php
                include './includes/jsheaders.inc.php';
                ?>


                <script>


                    $(document).ready(function() {
                        $.material.init();
                        $.material.ripples();

                        $.ajax({
                            url: "functions/applicant/exams/get_user_groups.php",
                            type: "post",
                            success: function(data)
                            {
                                $('#groups').fadeOut(500);
                                $('#groups').html(data);
                                $('#groups').delay(500).fadeIn(500);
                            }
                        });

                        $.ajax({
                            url: "functions/applicant/exams/get_user_schedules.php",
                            type: "post",
                            data: {'gname': 'All Groups'},
                            success: function(data)
                            {
                                $('#schedules').fadeOut(500);
                                $('#schedules').html(data);
                                $('#schedules').delay(500).fadeIn(500);
                            }
                        });
                        loadReviewOptions();
                        loadReviewAttempts(1);
                        
                        loadProfileInfo();
                        loadProfileGroups();
                        loadSettings();
                        loadHelp();
                        refreshUserGroups();
                    });
                    function refreshUserGroups()
                    {
                         $.ajax({
                            url: "functions/applicant/exams/get_user_groups.php",
                            type: "post",
                            success: function(data)
                            {
                                //$('#groups').fadeOut(500);
                                $('#groups').html(data);
                                //$('#groups').delay(500).fadeIn(500);
                            }
                        });
                    }
                    function loadHelp()
                    {
                        $.ajax({
                            url: "functions/applicant/help/get_help_view.php",
                            type: "post",
                            data: {'gid': gid},
                            success: function(data)
                            {   
                                $('#help').html(data);
                            }
                        });
                    }
                    function loadSettings()
                    {
                        $.ajax({
                            url: "functions/applicant/settings/load_view.php",
                            type: "post",
                            data: {'gid': gid},
                            success: function(data)
                            {   
                                $('#settings').html(data);
                            }
                        });
                    }

                    function loadProfileInfo()
                    {
                        $.ajax({
                            url: "functions/applicant/profile/load_profileInfo.php",
                            type: "post",
                            success: function(data)
                            {
                                $('#profileInfo').html(data);
                            }
                        });
                    }
                    
                    function loadProfileGroups()
                    {
                            $.ajax({
                            url: "functions/applicant/profile/load_profile_groups.php",
                            type: "post",
                            success: function(data)
                            {
                                $('#profileGroups').html(data);

                            }
                        });
                    }
                    
                    function openReviewFor(qpid, sid)
                    {
                        $("#overall-exams").fadeOut(500);
                        $.ajax({
                            url: "functions/applicant/review/get_exam_for_review.php",
                            type: "post",
                            data: {'qpid': qpid, 'sid': sid},
                            success: function(data)
                            {
                                $('#attempted_test_review').html(data);
                            }
                        });
                        $("#attempted_test_review").delay(500).fadeIn(500);
                    }
                    function closeReview()
                    {
                        $("#attempted_test_review").fadeOut(500);
                        $("#overall-exams").delay(500).fadeIn(500);
                    }

                    function refresh_review()
                    {
                        //loadReviewOptions();
                        loadReviewAttempts(0);
                        loadReviewOptions();
                    }
                    function refresh_review_graph()
                    {

                    }

                    function loadReviewOptions()
                    {
                        $.ajax({
                            url: "functions/applicant/review/load_group_list.php",
                            type: "post",
                            success: function(data)
                            {
                                $('#options_review').html(data);
                            }
                        });
                    }
                    function loadReviewAttempts(x)
                    {
                        if (x == 0)
                        {
                            gid = $('#review_group_id').val();
                        }
                        else
                        {
                            gid = 0;
                        }
                        $.ajax({
                            url: "functions/applicant/review/get_all_attempted_exams.php",
                            type: "post",
                            data: {'gid': gid},
                            success: function(data)
                            {
                                $('#all_attempted_tests').html(data);

                            }
                        });
                    }
                    ///Exams and Starting Exams
                    function onClickGroupItem(gid, gname)
                    {
                        //alert(gname);
                        $.ajax({
                            url: "functions/applicant/exams/get_user_schedules.php",
                            type: "post",
                            data: {'gid': gid, 'gname': gname},
                            success: function(data)
                            {
                                $('#schedules').html(data);
                                startTestBasedOnTime();
                                //$('#schedules').;
                            }
                        });
                    }
                    function startTestBasedOnTime()
                    {
                        var date = new Date();
                        currentDate = date.getDate();
                        currentMonth = date.getMonth();
                        currentYear = date.getUTCFullYear();
                        currentHour = date.getHours();
                        currentMinute = date.getMinutes();
                        //alert(currentDate + "-" + currentMonth + "-" + currentYear + " " + currentHour + ":" + currentMinute + ":00");
                    }


                    var Expand = (function() {
                        var tile = $('.strips__strip');
                        var tileLink = $('.strips__strip > .strip__content');
                        var tileText = tileLink.find('.strip__inner-text');
                        var stripClose = $('.strip__close');

                        var expanded = false;

                        var open = function() {

                            var tile = $(this).parent();

                            if (!expanded) {
                                tile.addClass('strips__strip--expanded');
                                // add delay to inner text
                                tileText.css('transition', 'all .6s 1s cubic-bezier(0.23, 1, 0.32, 1)');
                                stripClose.addClass('strip__close--show');
                                stripClose.css('transition', 'all .6s 1s cubic-bezier(0.23, 1, 0.32, 1)');
                                expanded = true;
                            }
                        };

                        var close = function() {
                            if (expanded) {
                                tile.removeClass('strips__strip--expanded');
                                // remove delay from inner text
                                tileText.css('transition', 'all 0.15s 0 cubic-bezier(0.23, 1, 0.32, 1)');
                                stripClose.removeClass('strip__close--show');
                                stripClose.css('transition', 'all 0.2s 0s cubic-bezier(0.23, 1, 0.32, 1)')
                                expanded = false;
                            }
                        }

                        var bindActions = function() {
                            tileLink.on('click', open);
                            stripClose.on('click', close);
                        };

                        var init = function() {
                            bindActions();
                        };

                        return {
                            init: init
                        };

                    }());

                    Expand.init();
                </script>


