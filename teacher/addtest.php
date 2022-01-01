<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEACHER | ADD TEST</title>
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
    <link rel="stylesheet" href="css/teacherdashboard.css">
</head>
<body>
<div class="row">
    <div class="col-sm-12" style="padding: 0%; ">
        <div class="row">
        <div class="col-sm-3" style="padding: 0%;">
            <div class="navbar">
                
                <ul>
                <div style="font-weight: bolder;color: black;font-size: 1.5rem;">&nbsp;WELCOME&nbsp; <?php echo $_SESSION['name']; ?></div>
                    <div class="icon">
                        <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                    </div>
                    <li style="color: black; font-weight: bold; ">
                        <div class="dash">DASHBOARD</div>
                    </li>
                    <li><a href="dashboard.php" id ="button1">ADD STUDENT</a></li>
                    <li><a href="addtest.php" id = "button2">ADD TEST</a></li>
                    <li><a href="addquestion.php" id = "button3">CREATE TEST</a></li>
                    
                    <li>
                        <button class="button5"><a href="logout.php">LOGOUT</a></button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9" style="padding: 0%;">
            <div class="admin">TEACHER DASHBOARD</div>
            
            <div class="col-sm-12">
                <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <form class="form1 show" >
            <div class="form-group">
                <label for="name">TEST NAME:</label><br>
                <input type="text" name="test" id="test" placeholder="Eg:DBMS SET-1" class="form-control">

            </div>
             <!-- <div class="form-group">
                <label for="tclass">TEST CLASS</label><br>
                    <select name="classs" id="classs" class="form-control">
                        <option value="0">SELECT CLASS</option>
                    </select>
            </div>  -->
            <div class="form-group">
                <label for="tdate">SCHEDULE DATE</label><br>
                <input type="date" name="date" id="date" class="form-control" placeholder="Schedule test date">
            </div>
            <div class="form-group">
                <label for="thour">TEST DURATION</label><br>
                <input type="number" name="thour" id="thour" placeholder="Test Duration(in hours)" class="form-control">
            </div>
            <div class="form-group">
                <label for="tques">TOTAL QUESTIONS</label><br>
                <input type="number" name="tques" id="tques" placeholder="Number of Questions" class="form-control">
            </div>
            <div class="form-group">
                <label for="tmarks">TOTAL MARKS</label><br>
                <input type="number" name="tmarks" id="tmarks" placeholder="Total test marks " class="form-control">
            </div>
            <div class="form-group">
                <label for="teach">EACH QUESTION MARKS</label><br>
                <input type="number" name="teach" id="teach" placeholder="Each Questions marks" class="form-control">
            </div>
            <br>
            <div style="text-align:center">
                <input type="submit" name="submit" id="submit" class="button1" onclick="addtest()">
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
</body>
<script>
    function getclass() {
    var classId = <?php echo $_SESSION['class']; ?>;
    var token = "<?php echo password_hash("getclass", PASSWORD_DEFAULT);?>";
    $.ajax({
        type: 'POST',
        url: "ajax/getclass.php",
        data: {
            cid: classId,
            token: token
        },
        success: function(data) {
            $('#classs').html(data);
        }
    });
}

function addtest() {
    var test = document.getElementById('test').value;
    // var class1 = document.getElementById('classs').value;
    var date1 = document.getElementById('date').value;
    var hour = document.getElementById('thour').value;
    var question = document.getElementById('tques').value;
    var marks = document.getElementById('tmarks').value;
    var each = document.getElementById('teach').value;
    var token = "<?php echo password_hash("testtoken", PASSWORD_DEFAULT);?>"
    if (test !== "" ) { //&& class1 != ""
        $.ajax({
            type: 'POST',
            url: "ajax/addtest.php",
            data: {
                test: test,
                // class1: class1,
                date1:date1,
                hour:hour,
                question:question,
                marks:marks,
                each:each,
                token: token
            },
            success: function(data) {
                alert(data);
                if (data == 0) {
                    alert('TEST ADDED');
                    window.location = "addtest.php";
                } else {
                    alert(data);
                }
            }
        });
    } else {
        alert('please fill all details');
    }
}
showtable();
function showtable() {
    var token = "<?php echo password_hash("gettest", PASSWORD_DEFAULT);?>";
    $.ajax({
        type: 'POST',
        url: "ajax/gettest.php",
        data: {
            token: token
        },
        success: function(data) {
            // alert (data);
            $('#listclass').html(data);
        }
    });
}
</script>
<script type=text/javascript>
    $('form').submit(function(e) {
        e.preventDefault();
    });
</script>
</html>