<?php
include('connection1.php');
if(isset($_POST['token']) && password_verify("unitoken",$_POST['token']))
{
    $uname=test_input($_POST['uname']);

    if($uname!="")
    {
        $query=$db->prepare("INSERT INTO adduniversity(uname) VALUES (?)");

        $data=array($uname);

        $execute=$query->execute($data);
        if($execute)
        {
            echo "University added in the database";
        }
        else{
            echo"something went wrong";
        }
    }

}
else{
    echo "Error";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>