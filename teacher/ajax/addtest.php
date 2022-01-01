<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("testtoken",$_POST['token']))
{
    $test=test_input($_POST['test']);
    $class=$_SESSION['class'];
    $date=test_input($_POST['date1']);
    $hour=test_input($_POST['hour']);
    $question=test_input($_POST['question']);
    $mark=test_input($_POST['marks']);
    $each=test_input($_POST['each']);

    if($test!="")
    {

        $query=$db->prepare("INSERT INTO addtest(test,tdate,thour,tques,tmarks,teach,class) VALUES (?,?,?,?,?,?,?)");
        $data=array($test,$date,$hour,$question,$mark,$each,$class);
        $execute=$query->execute($data);
        if($execute)
        {
            echo 0;
        }
        else{
            echo"something went wrong";
        }
    }

}
else{
    echo "server error";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>