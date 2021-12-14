<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("getclass",$_POST['token']))
{
        $id =$_POST['id'];

        $query=$db->prepare('SELECT * FROM addclass WHERE uid = ?');

        $data=array($id);

        $execute=$query->execute($data);
?>
<select name="class" id="class" class="form-control">
<option value="0">SELECT CLASS</option>
    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option value="<?php echo $datarow['id'];?>"><?php echo $datarow['class']?></option>
    <?php } ?>
</select>
<?php

    }
    

?>