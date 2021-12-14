<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    
    <div class="row">
    <div class="col-sm-12" style="padding: 0%; ">
        <div class="row">
        <div class="col-sm-3" style="padding: 0%;">
            <div class="navbar">
                <ul>
                    <div class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <li style="color: black; font-weight: bold; ">
                        <div class="dash">DASHBOARD</div>
                    </li>
                    <li><a href="dashboard.php" id ="button1">ADD UNIVERSITY</a></li>
                    <li><a href="addclass.php" id = "button2">ADD CLASS</a></li>
                    <li><a href="addteacher.php" id = "button3">ADD TEACHER</a></li>
                    
                    <li>
                        <button class="button5"><a href="logout.php">LOGOUT</a></button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9" style="padding: 0%;">
            <div class="admin">ADMIN DASHBOARD</div>
            <div class="col-sm-12">
                <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <!--<form>
                <div class="form1 show" id="form1">
                    <label for="uname" style="font-weight: bold;">ADD UNIVERSITY</label><br>
                    <input type="text" placeholder="University Name" id="uname" class="form-control" name="uname">
                    <br>
                    <div style="text-align: center;">
                        
                         <button class="button1" onclick="adduni()">SUBMIT NOW</button> 
                    </div>
                </div>
            </form>
            <form>
                <div class="form2 show" id="form2" >
                    <label for="class">ADD CLASS</label><br>
                    <input type="text" placeholder="Class Name goes here" class="form-control" name="class1"
                        id="class1"><br>
                    <div class="form-group">
                        <label for="uni">CHOOSE UNIVERSITY</label><br>
                        <!-- <input type="text" class="form-control" placeholder="Enter Password" name="class"
                        id="class"><br> 
                        <div class="contain-input">
                            <div class="list3" id="list3" style="width: 100%; float: left;"></div>
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <button style="margin-top: 2rem;" class="btn1" onclick="addclass()">SUBMIT</button>
                    </div>
                </div>
            </form>-->
            <form>
                <div class="form3 show" id="form3">
                    <label for="tname">ADD TEACHER</label><br>
                    <input type="text" placeholder="Enter Teacher" class="form-control" name="tname"
                        id="tname"><br>
                    <div class="form-group">
                        <label for="uni">CHOOSE UNIVERSITY</label><br>
                        <!-- <input type="text" class="form-control" placeholder="Enter Password" name="class"
                        id="class"><br> -->
                        <div class="contain-input">
                            <div class="list2" id="list2" style="width: 100%; float: left;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tclass" style="margin-top: 2rem;">CHOOSE CLASS</label><br>
                        <!-- <input type="text" class="form-control" placeholder="Enter Password" name="class"
                        id="class"><br> -->
                        <div class="contain-input">
                            <div class="list1" id="list1" style="width: 100%; float: left;"></div>
                        </div>
                    </div>

                    <div style="text-align: center;">
                        <button class="btn1" onclick="addteacher();" style="margin-top: 2rem;">SUBMIT</button>
                    </div>
                </div>
            </form> 
        </div>
        <div class="col-sm-2" ></div>
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
<script type="text/javascript">
    function addteacher() {
    var tname = document.getElementById('tname').value;
    var email = document.getElementById('email').value;
    var class1 = document.getElementById('classs').value;
    var token = "<?php echo password_hash("teachertoken", PASSWORD_DEFAULT);?>"
    if (tname !== "" && email !== "" && class1 != "") {
        $.ajax({
            type: 'POST',
            url: "ajax/addteacher.php",
            data: {
                tname: tname,
                class1: class1,
                email: email,
                token: token
            },
            success: function(data) {
                if (data == 0) {
                    alert('teacher added successfully');
                    window.location = "dashboard.php";
                }
            }
        });
    } else {
        alert('please fill all details');
    }
}
getuni();

function getuni() {
    var token = "<?php echo password_hash("getuni", PASSWORD_DEFAULT);?>"

    $.ajax({
        type: 'POST',
        url: "ajax/cgetuni.php",
        data: {
            token: token
        },
        success: function(data) {
            // $('#list').html(data);
            $('#university1').html(data);
        }
    });
}

function getclass() {
    var uid = document.getElementById('university1').value;
    var token = "<?php echo password_hash("getclass", PASSWORD_DEFAULT);?>";
    $.ajax({
        type: 'POST',
        url: "ajax/getclass.php",
        data: {
            uid: uid,
            token: token
        },
        success: function(data) {
            $('#classs').html(data);
        }
    });
}

// getallteacher();
function showtable() {
    var token = "<?php echo password_hash("getteacher", PASSWORD_DEFAULT);?>";
    $.ajax({
        type: 'POST',
        url: "ajax/getallteacher.php",
        data: {
            token: token
        },
        success: function(data) {
            $('#listclass').html(data);
        }
    });
}

function deleted(i){
    // alert(i)
    var token='<?php echo password_hash("deletetoken", PASSWORD_DEFAULT);?>';
    $.ajax({
        type: 'POST',
        url: "ajax/delteacher.php",
        data: {
            token: token,
            id:i
        },
        success: function(data) {
            if (data == 0) {
                alert('teacher deleted successfully');
                window.location = "dashboard.php";
                }
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