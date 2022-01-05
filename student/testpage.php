<?php
session_start();
if(!isset($_SESSION['id'])){
    echo "Login with your username and password";
    header('location:../mainlogin.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/studentdashboard.css">
   
</head>
<body>
<div class="row">
    <div class="col-sm-12" style="padding: 0%; ">
        <div class="row">
        <div class="col-sm-3" style="padding: 0%;">
            <div class="navbar">
                
                <ul>
                <div style="font-weight: bolder;color: black;font-size: 1.5rem;">&nbsp;WELCOME&nbsp; <?php echo $_SESSION['id']; ?></div>
                    <div class="icon">
                        <i class="fas fa-user-circle" aria-hidden="true"></i>
                    </div>
                    <li style="color: black; font-weight: bold; ">
                        <div class="dash">DASHBOARD</div>
                    </li>
                    <li><a href="dashboard.php" id ="button1" disabled>ATTEMPT TEST</a></li>
                    <li><a href="result.php" id = "button2" disabled>RESULT</a></li>

                    <li>
                        <button class="button5"><a href="logout.php">LOGOUT</a></button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9" style="padding: 0%;">
            <div class="admin">STUDENT DASHBOARD</div>
            
            <div class="col-sm-12">
                <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <form id=questionprint style="margin-right: 5rem;" class="form1" >
                <div class="questionSet "></div>
                <br>
                <div style="text-align:center;" >
                    <button id="next"  onclick="nextQuestion();" style="border-radius:5px; color:black; font-weight:bolder; background-color:white; padding:10px " >Next</button>
                    &nbsp;&nbsp;&nbsp;
                    <button id="submit"  onclick="Submit();" style="border-radius:5px; color:black; font-weight:bolder; background-color:white; padding:10px">Submit</button>
                </div>
            </form>
        </div>
        <div class="box-footer">
            <div class="tabledesign">
                <div class="listclass" id="listclass"></div>
            </div>
        </div>
            </div>
        </div>
        </div>
        
    
</div>
    </div>
</body>
<script>
  getQuestion();

let questionNumber = 0;
let questions = {};
let answer = [];
var submit = document.getElementById('submit');
// submit.style.display = 'none';

function nextQuestion() {
    var selectanswer = document.getElementsByName('options');
    for (let i = 0; i < selectanswer.length; i++) {
        if (selectanswer[i].checked == true) {
            answer[questionNumber] = selectanswer[i].value;
            break;
        }
    }
    questionNumber++;
    if (questionNumber == questions.length - 1) {
        $('#next').prop('hidden', true);
        submit.style.display = 'inline';

    }
    createDivForQuestion(questions);
}

function Submit() {
    let sum = 0;
    var selectanswer = document.getElementsByName('options');
    for (let i = 0; i < selectanswer.length; i++) {
        if (selectanswer[i].checked == true) {
            answer[questionNumber] = selectanswer[i].value;

            break;
        }
    }
    console.log(answer);
    for (let i = 0; i < answer.length; i++) {
        if (answer[i] == questions[i].answer) {
            sum = sum + 2;
         } else {
             sum = sum - 10;
         }
    }
    console.log(sum);
    var token = "<?php echo password_hash("results", PASSWORD_DEFAULT); ?>";
    $.ajax({
        type: 'POST',
        url: "ajax/result.php",
        data: {
            token: token,
            sum: sum
        },
        success: function(data) {
            alert (data);
        }
    });
    let text = "Are you sure want to submit test?";
    if (confirm(text) == true) {
        window.location = "dashboard.php";
    }

}

function getQuestion() {

    var token = "<?php echo password_hash("getQuestions", PASSWORD_DEFAULT); ?>";
    var activeTest = "<?php echo $_SESSION['activeTest'] ?>";
    $.ajax({
        type: 'POST',
        url: "ajax/getQuestions.php",
        data: {
            token: token
        },
        success: function(data) {
            //alert (data);
            data = JSON.parse(data);
            createDivForQuestion(data);
            createDivForAnswer(data);
        }
    });
}

function createDivForAnswer(data) {
    questions = data;
}

function createDivForQuestion(data) {
    questions = data;
    $(".questionSet").html(`<div class="question" style="font-size:1.5rem; font-weight:bolder; color:rgb(0, 0, 153);">
        ${questions[questionNumber].question}
                </div>
        <div class="answers" style="font-weight:bolder; font-size:1.2rem;" >
            <input type="radio" id="option1" name="options" value="option1">
            <label for="option1">${data[questionNumber].option1}</label><br>
            <input type="radio" id="option2" name="options" value="option2">
            <label for="css">${data[questionNumber].option2}</label><br>
            <input type="radio" id="option3" name="options" value="option3">
            <label for="javascript">${data[questionNumber].option3}</label> <br>
            <input type="radio" id="option4" name="options" value="option4">
            <label for="javascript">${data[questionNumber].option4}</label>  
        </div>`);
}

</script>

<script type=text/javascript>
    $('form').submit(function(e) {
        e.preventDefault();
    });
</script>
</body>
</html>