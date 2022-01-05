<?php
    session_start();
    include ('connection.php');
    if(isset($_POST['token']) && password_verify('results', $_POST['token'])){
        $marks = $_POST['sum'];
        $query =$db->prepare('INSERT INTO result(stuid,testid,marks) VALUES (?,?,?)');
        $data = array($_SESSION['id'],$_SESSION['activeTest'],$marks);
        $execute = $query->execute($data);
        if($execute){
            echo 0;
        }else{
            echo 1;
        }
    }
?>