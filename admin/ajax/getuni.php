<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("getuni", $_POST['token']))
{
        $query=$db->prepare('SELECT * FROM adduniversity');

        $data=array();

        $execute=$query->execute($data);
?>
<select name="university" id="university" class="form-control">
    <option value="0">SELECT UNIVERSITY</option>
    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option value="<?php echo $datarow['id'];?>"><?php echo $datarow['uname']?></option>
    <?php } ?>
</select>
<?php

    }

?>