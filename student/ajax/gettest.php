<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("gettest", $_POST['token']))
{
       
        $query=$db->prepare('SELECT * FROM addtest');

        $data=array();

        $execute=$query->execute($data);
?>
<select name="test" id="test" class="form-control">
    <option value="0">Select test from here :</option>
    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option value="<?php echo $datarow['testid'];?>"><?php echo $datarow['test']?></option>
    <?php } ?>
</select>
<?php

    }

?>
   