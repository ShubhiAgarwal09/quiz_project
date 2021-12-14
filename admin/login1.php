<?php
include "connection.php";


if(isset($_POST['but_submit'])){

    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);


    if ($email != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from adminlogin where email='".$email."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['email'] = $email;
            header('Location: dashboard.php');
            $count--;
        }else{
            echo "Invalid username and password";
        }

    }
    else{
        echo "Shoew error";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        *{
            background-color: darkgrey;
        }
        input{
            border-radius: 2rem;
            font-size: 1.5em;
            border-width: 0.25rem;
        }
        label{
            font-weight: bolder;
            font-size: 1.5em;
            text-align: center;
        }
        form{
            border-width: thick;
            border-radius: 1.5rem;
            border-color: rgba(0, 26, 255, 0.801);
        }
    </style>
</head>
<body>
<div class="row ">
        <div class="col-sm-12 ">
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <br><br><br><br><br><br>
                    <i class="fas fa-user-shield" style="font-size: 5rem;text-align: center; "></i>
                    <span style="font-weight: bolder; font-size: 1.5rem;"> ADMIN LOGIN</span>
                    <br><br>
                    <form method="post" action="" style="border-style: double solid; text-align: center; padding: 3em;">
                        <div style="margin-bottom: 2em;">
                            <label for="name">USERNAME : </label>
                            <br>
                            <input type="email" placeholder="Enter Enamil ID" name="email" id="email">
                        </div>
                        <div>
                            <label for="name">PASSWORD : </label>
                            <br>
                            <input type="password" placeholder="Enter Password" name="password" id="password">
                        </div>
                        <div class="button" style="text-align: center;margin: 25px 0px;">
                            <!--<button type="submit" value="Submit" name="but_submit" id="but_submit">LOGIN NOW</button>-->
                            <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                        </div>
                    </form>
                </div>
                <div class="col-sm-5"></div>
            </div>
        </div>
    </div>
</body>
<!--<script type="text/javascript">
    function sendlogin()
    {
       var email = document.getElementById('email').value;
       var password = document.getElementById('password').value;
       var token = "";
       if(email!=="" && password!=="")
       {
         $.ajax(
                   {
                       type: 'POST',
                       url:"ajax/adminlogin.php",
                       data:{email:email,password:password,token:token},
                       success:function(data)
                       {
                        if(data==0){
                            alert('login successfull');
                            window.location.href ="dashboard.html";
                        }
                        else{
                            alert(data)
                        }      
                      }
                    }
                );
       } 
       else
       {
           alert('please fill all details');
       }
    }
</script>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>-->
</html>