<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("classtoken",$_POST['token']))
{
    //$uname = $_POST['uname'];
    $class1=test_input($_POST['class1']);
    $id=$_POST['id'];

    
        $query=$db->prepare("INSERT INTO addclass(class,id) VALUES (?,?)");

        $data=array($class1,$id);

        $execute=$query->execute($data);
        if($execute)
        {
            echo 0;
        }
        else{
            echo"something went wrong";
        }
    

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>