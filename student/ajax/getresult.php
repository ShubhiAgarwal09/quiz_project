<?php
include('connection.php');
session_start();
if (isset($_POST['token']) && password_verify("getresult", $_POST['token'])) {

    $query = $db->prepare('SELECT * FROM result JOIN addstudent ON result.stuid=addstudent.stuid
         JOIN addtest ON result.testid=addtest.testid;');

    $data = array();

    $execute = $query->execute($data);
?>
    <table class="table table-hover table-bordered" style="border:solid; text-align: center; font-size:1.5rem;">
        <tr>
            <td style="font-family: Times New Roman; color:blue; font-weight:bold;"> SR. NO.</td>
            <td style="font-family: Times New Roman;">TEST NAME</td>
            <td style="font-family: Times New Roman;">STUDENT NAME</td>
            <td style="font-family: Times New Roman;">MARKS</td>
        </tr>
        <?php
        $srno = 1;
        while ($datarow = $query->fetch()) {
        ?>
            <tr>
                <td><?php echo $srno ?></td>
                <td><?php echo $datarow['test'] ?></td>
                <td><?php echo $datarow['fname'] ?></td>
                <td><?php echo $datarow['marks'] ?></td>
            </tr>
        <?php
            $srno++;
        }
        ?>
    </table>
<?php
}
?>