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
                    <li><a href="dashboard.php" id ="button1">ATTEMPT TEST</a></li>
                    <li><a href="result.php" id = "button2">RESULT</a></li>

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
            <form class="form1">
                        <div class="form-group">
                            <label for="uni">CHOOSE TEST</label><br>
                            <select name="list4" id="list4" class="form-control">
                                <option value="0">SELECT TEST NAME</option>
                            </select>
                            <!-- <div class="btn" style="text-align:center;">
                                <button class="btn btn-success" onclick="takeTest();" >SUBMIT</button>
                            </div> --><br>
                            <div class="" style="text-align: center;">
                                <input type="submit" name="submit" id="submit" class="button1" onclick="takeTest();">
                            </div>
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
    function takeTest() {
        var test = document.getElementById('list4').value;
        if (test !== "0") {
        $.ajax({
            type: 'POST',
            url: "ajax/activetest.php",
            data: {
                activeTest: test
            },
            success: function(data) {
                 alert(data);
                if (data == 0) {
                    alert("Starting Test");
                    window.location = "testPage.php";
                    preventBack();
                } else {
                    alert("No Exam Today");
                    window.location.reload();
                }
            }
        });
        }
        else{
            alert("Please Choose Subject");
        }
    }
    gettest();

    function gettest() {
        var token = "<?php echo password_hash("gettest", PASSWORD_DEFAULT); ?>";
        $.ajax({
            type: 'POST',
            url: "ajax/gettest.php",
            data: {
                token: token
            },
            success: function(data) {
                // alert(data)
                $('#list4').html(data);
            }
        });
    }
</script>
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script> 
<script type=text/javascript>
    $('form').submit(function(e) {
        e.preventDefault();
    });
</script>
</body>
</html>