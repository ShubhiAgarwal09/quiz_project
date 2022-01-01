<?php
include("Classes/PHPExcel.php");
include("connection.php");

$test= $_POST['test'];
if(!empty($_FILES["excel_file"]))
{
	$file_array = explode(".", $_FILES["excel_file"]["name"]);
	if($file_array[1] == "xls" || $file_array[1] == "xlsx")
	{
		//upload
		$uploadFilePath = 'uploads/'.basename($_FILES['excel_file']['name']);
		move_uploaded_file($_FILES['excel_file']['tmp_name'], $uploadFilePath);
		$filename = $_FILES["excel_file"]["name"];
		echo $filename;
		$object = PHPExcel_IOFactory::load($uploadFilePath);
		foreach($object->getWorksheetIterator() as $worksheet){
			$rowcount = $worksheet->getHighestRow();
			for($row=2;$row<=$rowcount;$row++){
				$question = $worksheet->getCellByColumnAndRow(0,$row)->getValue();
				$option1 = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
				$option2 = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
				$option3 = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
                $option4 = $worksheet->getCellByColumnAndRow(4,$row)->getValue();
                $answer = $worksheet->getCellByColumnAndRow(5,$row)->getValue();
				$query = $db->prepare('INSERT INTO addquestion(test,question,option1,option2,option3,option4,answer) VALUES (?,?,?,?,?,?,?)');
				$data = array($test,$question,$option1,$option2,$option3,$option4,$answer);
				$execute=$query->execute($data);
				if($execute){
					echo 0;
				}
			}
		}
	}
	else
	{
		echo "Check the file extension(must be of .xls or .xlsx)";
	}
}

?>