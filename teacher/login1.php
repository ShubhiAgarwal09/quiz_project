<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher login</title>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
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
        .button{
            border-radius:1.5rem;
            background-color: darkgrey;
            font-size: 1.5rem;
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
                    <br><br><br><br>
                    <i class="fas fa-chalkboard-teacher" style="font-size: 5rem;text-align: center; "></i>
                    <span style="font-weight: bolder; font-size: 1.5rem;"> TEACHER LOGIN</span>
                    <br><br>
                    <form style="border-style: double solid; text-align: center; padding: 3em;">
                        <div style="margin-bottom: 2em;">
                            <label for="text">USERNAME : </label>
                            <br>
                            <input type="email" placeholder="Enter Enamil ID" name="email" id="email">
                        </div>
                        <div>
                            <label for="password">PASSWORD : </label>
                            <br>
                            <input type="password" placeholder="Enter Password" name="password" id="password">
                        </div>
                        <div class="button" style="text-align: center;margin: 25px 0px;">
                            <button class="button" onclick="sendlogin();">SUBMIT</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-5"></div>
            </div>
        </div>
    </div>
    
</body>
<script type="text/javascript">
    function sendlogin()
    {
       var email = document.getElementById('email').value;
       var password = document.getElementById('password').value;
       var token = "<?php echo password_hash("logintoken", PASSWORD_DEFAULT);?>";
       if(email!="" && password!="")
       {
         $.ajax(
                   {
                       type: 'POST',
                       url:"ajax/login.php",
                       data:{email:email,password:password,token:token},
                       success:function(data)
            
                       {
                           alert (data);
                        if(data==0){
                            alert('login successfull');
                            window.location="dashboard.php";
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
});</script>
</html>